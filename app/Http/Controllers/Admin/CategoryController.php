<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Support\Facades\Session;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Section;
use Illuminate\Http\Request;
//use Session;

class CategoryController extends Controller
{
    //
    public function categories() {
        Session::put('page', 'categories');
        $categories = Category::with(['section', 'parentcategory'])->get()->toArray();
        //dd($categories); 
        return view('admin.categories.categories')->with(compact('categories'));
    }

    public function updateCategoryStatus(Request $request) 
    {
        if ($request->ajax()) {
            $data = $request->all();
            //echo "<pre>"; print_r($data); die;
            if($data['status']=="Active") {
                $status = 0;
            } else {
                $status = 1;
            }
            Category::where('id', $data['category_id'])->update(['status'=>$status]);
            return response()->json(['status'=>$status, 'category_id'=>$data['category_id']]);
        }

    }

    public function addEditCategory($id=null){
        Session::put('page','categories');
        // dd($request);
         if ($id==""){
             $title = "Add Category";
             $category = new Category;
             $message = "Category added successfully";
         }else{
             $title = "Edit Category";
             $category = find($id);
             $message = "Category updated successfully!";
         }
         // Get all Sections
         $getSections = Section::get()->toArray();

         /*
 
         if ($request->isMethod('post')){
             $data = $request->all();
             //dd($data);
             $rules = [
                 "category_name" => 'required|regex:/^[\pL\s\-]+$/u',
             ];
             $customMessages = [
                 "category_name.required" => "Nome da Categoria é requerido",
                 "category_name.regex" => "Informe um nome de categoria válido",
             ];
 
             $this->validate($request,$rules,$customMessages);
 
             $category->name =$data['category_name'];
             $category->status = 1;
             $category->save();
             //echo "teste";
             return redirect('admin/categories')->with('success_message',$message);
         }
        */
         //dd($request);
         return view('admin.categories.add_edit_category')->with(compact('title','category','getSections'));
     }

}
