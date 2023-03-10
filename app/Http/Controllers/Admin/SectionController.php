<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Section;
use Illuminate\Support\Facades\Session;

class SectionController extends Controller
{
    public function sections() {
        Session::put('page','sections');
        $sections = Section::get()->toArray();
        //dd($sections);
        return view('admin.sections.sections')->with(compact('sections'));
    }

     //table admins
    public function updateSectionStatus(Request $request) 
    {
        if ($request->ajax()) {
            $data = $request->all();
            //echo "<pre>"; print_r($data); die;
            if($data['status']=="Active") {
                $status = 0;
            } else {
                $status = 1;
            }
            Section::where('id', $data['section_id'])->update(['status'=>$status]);
            return response()->json(['status'=>$status, 'section_id'=>$data['section_id']]);
        }

    }

    public function deleteSections($id) {
        //delete sections
        Section::where('id', $id)->delete();
        $message = "Section has been deleted successfuly!";
        return redirect()->back()->with('success_message', $message);
    }

    public function addEditSection(Request $request, $id=null){
       Session::put('page','sections');
       // dd($request);
        if ($id==""){
            $title = "Add Section";
            $section = new Section;
            $message = "Section added successfully";
        }else{
            $title = "Edit Section";
            $section = Section::find($id);
            $message = "Section updated successfully!";
        }

        if ($request->isMethod('post')){
            $data = $request->all();
            //dd($data);
            $rules = [
                "section_name" => 'required|regex:/^[\pL\s\-]+$/u',
            ];
            $customMessages = [
                "section_name.required" => "Nome de seçao é requerido",
                "section_name.regex" => "Informe um nome de seção válido",
            ];

            $this->validate($request,$rules,$customMessages);

            $section->name =$data['section_name'];
            $section->status = 1;
            $section->save();
            //echo "teste";
            return redirect('admin/sections')->with('success_message',$message);
        }
       
        //dd($request);
        return view('admin.sections.add_edit_section')->with(compact('title','section'));
    }
}
