<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Hash;
use Auth;
use Image;
use App\Models\Admin;
use App\Models\Vendor;
use App\Models\Country;
use App\Models\VendorsBusinessDetail;
use App\Models\VendorsBankDetail;
use Session;

class AdminController extends Controller
{
    public function dashboard()
    {
        Session::put('page','dashboard');
        return view("admin.dashboard");
    }

    public function updateAdminPassword(Request $request)
    {
        Session::put('page','update_admin_password');
        if ($request->isMethod("post")) {
            $data = $request->all();
            //checar mais uma vez a senha
            if (
                Hash::check(
                    $data["current_password"],
                    Auth::guard("admin")->user()->password
                )
            ) {
                //senha confirmada realiza o update no Banco
                if ($data["confirm_password"] == $data["new_password"]) {
                    // echo "<pre>"; print_r($data); die;
                    Admin::where(
                        "id",
                        Auth::guard("admin")->user()->id
                    )->update(["password" => bcrypt($data["new_password"])]);
                    return redirect()
                        ->back()
                        ->with(
                            "success_message",
                            "Senha alterada com sucesso!"
                        );
                } else {
                    return redirect()
                        ->back()
                        ->with("error_message", "Nova senha não confirmada");
                }
            } else {
                return redirect()
                    ->back()
                    ->with("error_message", "Sua senha atual está incorreta");
            }
        }
        $adminDetails = Admin::where(
            "email",
            Auth::guard("admin")->user()->email
        )
            ->first()
            ->toArray();
        return view("admin.settings.update_admin_password")->with(
            compact("adminDetails")
        );
    }

    //Esta função confere em tempo real se a senha digitada está correta via ajax admin/js/custom.js
    public function checkAdminPassword(Request $request)
    {
        $data = $request->all();
        //echo "<pre>"; print_r($data); die;
        if (
            Hash::check(
                $data["current_password"],
                Auth::guard("admin")->user()->password
            )
        ) {
            return "true";
        } else {
            return "false";
        }
    }

    public function updateAdminDetails(Request $request)
    {
        Session::put('page','update_admin_details');
        if ($request->isMethod("post")) {
            $data = $request->all();
            // echo "<pre>"; print_r($data); die;
            //regras de validação
            $rules = [
                "admin_name" => 'required|regex:/^[\pL\s\-]+$/u',
                "admin_mobile" => "required|numeric",
            ];
            $customMessages = [
                "admin_name.required" => "Nome é requerido",
                "admin_name.regex" => "Informe um nome válido",
                "admin_mobile.required" => "Telefone com ddd é requerido",
                "admin_mobile.numeric" => "Telefone somente os numeros com ddd",
            ];
            //executa a validação passa os dados request, regras e a menssagem.
            $this->validate($request, $rules, $customMessages);

            //upload Admin photo
            if ($request->hasFile("admin_image")) {
                $image_tmp = $request->file("admin_image");
                if ($image_tmp->isValid()) {
                    // Get Image Extesion
                    $extesion = $image_tmp->getClientOriginalExtension();
                    // Generate New Image name
                    $imageName = rand(111, 99999) . "." . $extesion;
                    $imagePath = "admin/images/photo/" . $imageName;
                    // Upload the image
                    Image::make($image_tmp)->save($imagePath);
                }
            } elseif (!empty($data["current_admin_image"])) {
                $imageName = $data["current_admin_image"];
            } else {
                $imageName = "";
            }

            //Atualiza os dados no banco de dados
            Admin::where("id", Auth::guard("admin")->user()->id)->update([
                "name" => $data["admin_name"],
                "mobile" => $data["admin_mobile"],
                "image" => $imageName,
            ]);
            //se der tudo certo
            return redirect()
                ->back()
                ->with("success_message", "Admin details updated successfuly!");
        }
        return view("admin.settings.update_admin_details");
    }

    public function updateVendorDetails($slug, Request $request)
    {
        if ($slug == "personal") {
            Session::put('page','update_personal_details');
            if ($request->isMethod("post")) {
                $data = $request->all();
                //regras de validação
                $rules = [
                    "vendor_name" => 'required|regex:/^[\pL\s\-]+$/u',
                    "vendor_city" => 'required|regex:/^[\pL\s\-]+$/u',
                    "vendor_mobile" => "required|numeric",
                ];
                $customMessages = [
                    "vendor_name.required" => "Nome é requerido",
                    "vendor_city.required" => "Cidade é requerida",
                    "vendor_name.regex" => "Informe um nome válido",
                    "vendor_city.regex" => "Informe um nome de cidade válido",
                    "vendor_mobile.required" => "Telefone com ddd é requerido",
                    "vendor_mobile.numeric" =>
                        "Telefone somente os numeros com ddd",
                ];
                //executa a validação passa os dados request, regras e a menssagem.
                $this->validate($request, $rules, $customMessages);
                //upload Admin photo
                if ($request->hasFile("vendor_image")) {
                    $image_tmp = $request->file("vendor_image");
                    if ($image_tmp->isValid()) {
                        // Get Image Extesion
                        $extesion = $image_tmp->getClientOriginalExtension();
                        // Generate New Image name
                        $imageName = rand(111, 99999) . "." . $extesion;
                        $imagePath = "admin/images/photo/" . $imageName;
                        // Upload the image
                        Image::make($image_tmp)->save($imagePath);
                    }
                } elseif (!empty($data["current_vendor_image"])) {
                    $imageName = $data["current_vendor_image"];
                } else {
                    $imageName = "";
                }
                //Atualiza os dados na tabela Admin
                Admin::where("id", Auth::guard("admin")->user()->id)->update([
                    "name" => $data["vendor_name"],
                    "mobile" => $data["vendor_mobile"],
                    "image" => $imageName,
                ]);
                // Atualiza os dados na tabela Vendors
                Vendor::where(
                    "id",
                    Auth::guard("admin")->user()->vendor_id
                )->update([
                    "name" => $data["vendor_name"],
                    "mobile" => $data["vendor_mobile"],
                    "address" => $data["vendor_address"],
                    "city" => $data["vendor_city"],
                    "state" => $data["vendor_state"],
                    "country" => $data["vendor_country"],
                    "pincode" => $data["vendor_pincode"],
                ]);
                //se der tudo certo
                return redirect()
                    ->back()
                    ->with(
                        "success_message",
                        "Vendor details updated successfuly!"
                    );
            }

            $vendorDetails = Vendor::where('id', Auth::guard('admin')->user()->vendor_id)->first(
                )->toArray();
        } else if ($slug == "business") {
            Session::put('page','update_business_details');
            if ($request->isMethod("post")) {
                $data = $request->all();
                //regras de validação
                $rules = [
                    'shop_name' => 'required|regex:/^[\pL\s\-]+$/u',
                    'shop_city' => 'required|regex:/^[\pL\s\-]+$/u',
                    'shop_mobile' => 'required|numeric',
                    'address_proof' => 'required',
                ];
                $customMessages = [
                    'shop_name.required' => 'Nome é requerido',
                    'shop_city.required' => 'Cidade é requerida',
                    'shop_name.regex' => 'Informe um nome válido',
                    'shop_city.regex' => 'Informe um nome de cidade válido',
                    'shop_mobile.required' => 'Telefone com ddd é requerido',
                    'shop_mobile.numeric' => 'Telefone somente os numeros com ddd',                   
                ];
                //executa a validação passa os dados request, regras e a menssagem.
                $this->validate($request, $rules, $customMessages);
                //upload Admin photo
                if ($request->hasFile("address_proof_image")) {
                    $image_tmp = $request->file("address_proof_image");
                    if ($image_tmp->isValid()) {
                        // Get Image Extesion
                        $extesion = $image_tmp->getClientOriginalExtension();
                        // Generate New Image name
                        $imageName = rand(111, 99999) . "." . $extesion;
                        $imagePath = "admin/images/proofs/" . $imageName;
                        // Upload the image
                        Image::make($image_tmp)->save($imagePath);
                    }
                } elseif (!empty($data["current_address_proof"])) {
                    $imageName = $data["current_address_proof"];
                } else {
                    $imageName = "";
                }
                // Atualiza os dados na tabela vendors_business_details table
                VendorsBusinessDetail::where(
                    "vendor_id",
                    Auth::guard("admin")->user()->vendor_id
                )->update([
                    "shop_name" => $data["shop_name"],
                    "shop_mobile" => $data["shop_mobile"],
                    "shop_address" => $data["shop_address"],
                    "shop_city" => $data["shop_city"],
                    "shop_state" => $data["shop_state"],
                    "shop_country" => $data["shop_country"],
                    "business_license_number" => $data["business_license_number"],
                    "gst_number" => $data["gst_number"],
                    "pan_number" => $data["pan_number"],
                    "shop_pincode" => $data["shop_pincode"],
                    "address_proof" => $data["address_proof"],
                    "address_proof_image" => $imageName
                ]);
                //se der tudo certo
                return redirect()
                    ->back()
                    ->with(
                        "success_message",
                        "Vendor details updated successfuly!"
                    );
            }
            $vendorDetails = VendorsBusinessDetail::where(
                "vendor_id",
                Auth::guard("admin")->user()->vendor_id
            )
                ->first()
                ->toArray();
            //dd($vendorDetails);
        } else if ($slug == "bank") {
            Session::put('page','update_bank_details');
            if ($request->isMethod("post")) {
                $data = $request->all();
                //dd($vendorDetails);
                //regras de validação
                $rules = [
                    'account_holder_name' => 'required|regex:/^[\pL\s\-]+$/u',
                    'bank_name' => 'required',
                    'account_number' => 'required|numeric',
                    'bank_ifsc_code' => 'required',
                ];
                $customMessages = [
                    'account_holder_name.required' => 'Nome é requerido',                    
                    'account_holder_name.regex' => 'Informe um nome válido',
                    'bank_name.required' => 'Informe um nome de banco válido',
                    'account_number.required' => 'numero é requerido',
                    'account_number.numeric' => 'somente os numeros da conta',
                    'bank_ifsc_code.required' => 'bank_ifsc_code is required',                                       
                ];
                //executa a validação passa os dados request, regras e a menssagem.
                $this->validate($request, $rules, $customMessages);
                
                // Atualiza os dados na tabela vendors_bank_details table
                VendorsBankDetail::where(
                    "vendor_id",
                    Auth::guard("admin")->user()->vendor_id
                )->update([
                    "account_holder_name" => $data["account_holder_name"],
                    "bank_name" => $data["bank_name"],
                    "account_number" => $data["account_number"],
                    "bank_ifsc_code" => $data["bank_ifsc_code"]
                ]);
                //se der tudo certo
                return redirect()
                    ->back()
                    ->with(
                        "success_message",
                        "Vendor Bank details updated successfuly!"
                    );
            }
            $vendorDetails = VendorsBankDetail::where(
                "vendor_id",
                Auth::guard("admin")->user()->vendor_id
            )
                ->first()
                ->toArray();
        }
        //$countries = Country::where('status', 1)->get()->toArray();
        $countries = Country::where('status', 1)->get();

       //dd($countries);
        return view("admin.settings.update_vendor_details")->with(
            compact('slug', 'vendorDetails', 'countries')
        );
    }

    public function login(Request $request)
    {
        //echo $password = Hash::make('123456'); die;
        if ($request->isMethod("post")) {
            $data = $request->all();
            //echo "<pre>"; print_r($data); die;

            //validação com regras e memssagem

            $rules = [
                "email" => "required|email|max:255",
                "password" => "required",
            ];

            $customMessages = [
                "email.required" => "Informe um email",
                "email.email" => "Iforme um email válido",
                "password.required" => "Informe uma Senha",
            ];

            $this->validate($request, $rules, $customMessages);

            if (
                Auth::guard("admin")->attempt([
                    "email" => $data["email"],
                    "password" => $data["password"],
                    "status" => 1,
                ])
            ) {
                return redirect("admin/dashboard");
            } else {
                return redirect()
                    ->back()
                    ->with("error_message", "Invalid Email or Password");
            }
        }
        return view("admin.login");
    }
    //função que controla o tipo de admin 
    public function admins($type=null) {
        $admins = Admin::query();
        if (!empty($type)) {
            $admins = $admins->where('type', $type);
            $title = ucfirst($type).'s';
            Session::put('page','view_'.strtolower($title));
        }else {
            $title= "Alls Admins/Subadmins/Vendors";
            Session::put('page','view_all');
        }
        $admins = $admins->get()->toArray();
        //dd($admins)
        return view('admin.admins.admins')->with(compact('admins','title'));
    }

    // função view vendor details edit
    public function viewVendorDetails($id) 
    {
        $vendorDetails = Admin::with('vendorPersonal','vendorBusiness','vendorBank')->where('id',$id)->first();
        $vendorDetails = json_decode(json_encode($vendorDetails),true);
        ($vendorDetails);
       // dd($vendorDetails);
        return view('admin.admins.views_vendor_details')->with(compact('vendorDetails'));
    }
    //table admins
    public function updateAdminStatus(Request $request) 
    {
        if ($request->ajax()) {
            $data = $request->all();
            //echo "<pre>"; print_r($data); die;
            if($data['status']=="Active") {
                $status = 0;
            } else {
                $status = 1;
            }
            Admin::where('id', $data['admin_id'])->update(['status'=>$status]);
            return response()->json(['status'=>$status, 'admin_id'=>$data['admin_id']]);
        }

    }


    public function logout()
    {
        Auth::guard("admin")->logout();
        return redirect("admin/login");
    }
}
