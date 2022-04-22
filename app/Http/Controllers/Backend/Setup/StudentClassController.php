<?php

namespace App\Http\Controllers\Backend\Setup;

use App\Http\Controllers\Controller;
use App\Http\Requests\StudentClassRequest;
use App\Models\StudentClass;
use Illuminate\Http\Request;

class StudentClassController extends Controller
{
    public function ViewStudent(){
        $data['allData'] = StudentClass::all();
        return view('backend.setup.student_class.view_class', $data);
    }
    public function StudentClassAdd(){
        return view('backend.setup.student_class.add_class');
    }

    public function StudentClassStore(StudentClassRequest $request){
        $data = new StudentClass();
        $data->name = $request->name;
        $data->save();

        $notification = array(
            'message' => 'Student Class inserted successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('student.class.view')->with($notification);

    }
    public function StudentClassEdit($id){
        $editData = StudentClass::find($id);
        return view('backend.setup.student_class.edit_class', compact('editData'));
    }

    public function StudentClassUpdate(Request $request, $id){
        $data = StudentClass::find($id);
        $validateData = $request->validate([
            'name' => 'required|unique:student_classes,name,'.$data->id
        ]);
        $data->name = $request->name;
        $data->save();

        $notification = array(
            'message' => 'Student Class updated successfully',
            'alert-type' => 'info'
        );

        return redirect()->route('student.class.view')->with($notification);
    }
    public function StudentClassDelete($id){
        $user = StudentClass::find($id);
        $user->delete();

        $notification = array(
            'message' => 'Student Class deleted successfully',
            'alert-type' => 'info'
        );

        return redirect()->route('student.class.view')->with($notification);
    }
}