<?php

namespace App\Http\Controllers\Backend\Setup;

use App\Models\StudentYear;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\StudentClassRequest;

class StudentYearController extends Controller
{
    public function ViewYear(){
        $data['allData'] = StudentYear::all();
        return view('backend.setup.year.view_year', $data);
    }

    public function StudentYearAdd(){
        return view('backend.setup.year.add_year');
    }
    public function StudentYearStore(StudentClassRequest $request){
        $data = new StudentYear();
        $data->name = $request->name;
        $data->save();

        $notification = array(
            'message' => 'Student Year inserted successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('student.year.view')->with($notification);

    }
    public function StudentYearEdit($id){
        $editData = StudentYear::find($id);
        return view('backend.setup.year.edit_year', compact('editData'));
    }
    public function StudentYearUpdate(Request $request, $id){
        $data = StudentYear::find($id);
        $validateData = $request->validate([
            'name' => 'required|unique:student_classes,name,'.$data->id
        ]);
        $data->name = $request->name;
        $data->save();

        $notification = array(
            'message' => 'Student Year updated successfully',
            'alert-type' => 'info'
        );

        return redirect()->route('student.year.view')->with($notification);
    }

    public function StudentYearDelete($id){
        $user = StudentYear::find($id);
        $user->delete();

        $notification = array(
            'message' => 'Student Year deleted successfully',
            'alert-type' => 'info'
        );

        return redirect()->route('student.year.view')->with($notification);
    }
}
