<?php

namespace App\Http\Controllers\Backend\Setup;

use App\Http\Controllers\Controller;
use App\Http\Requests\ExamTypeRequest;
use App\Models\ExamType;
use Illuminate\Http\Request;

class ExamTypeController extends Controller
{
    public function ViewExamType(){
        $data['allData'] = ExamType::all();
        return view('backend.setup.exam_type.view_exam_type', $data);
    }

    public function ExamTypeAdd(){
        return view('backend.setup.exam_type.add_exam_type');
    }

    
    public function ExamTypeStore(ExamTypeRequest $request){
        $data = new ExamType();
        $data->name = $request->name;
        $data->save();

        $notification = array(
            'message' => 'Exam type inserted successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('exam.type.view')->with($notification);

    }

    public function ExamtypeEdit($id){
        $editData = ExamType::find($id);
        return view('backend.setup.exam_type.edit_exam_type', compact('editData'));
    }

    public function ExamTypeUpdate(Request $request, $id){
        $data = ExamType::find($id);
        $validateData = $request->validate([
            'name' => 'required|unique:exam_types,name,'.$data->id
        ]);
        $data->name = $request->name;
        $data->save();

        $notification = array(
            'message' => 'Exam Type updated successfully',
            'alert-type' => 'info'
        );

        return redirect()->route('exam.type.view')->with($notification);
    }

    public function ExamTypeDelete($id){
        $user = ExamType::find($id);
        $user->delete();

        $notification = array(
            'message' => 'Exam Type deleted successfully',
            'alert-type' => 'info'
        );

        return redirect()->route('exam.type.view')->with($notification);
    }
}
