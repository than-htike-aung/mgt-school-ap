<?php

namespace App\Http\Controllers\Backend\Setup;

use App\Models\StudentShift;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\StudentClassRequest;

class StudentShiftController extends Controller
{
    public function ViewShift(){
        $data['allData'] = StudentShift::all();
        return view('backend.setup.shift.view_shift', $data);
    }

    public function StudentShiftAdd(){
        return view('backend.setup.shift.add_shift');
    }

    public function StudentShiftStore(StudentClassRequest $request){
        $data = new StudentShift();
        $data->name = $request->name;
        $data->save();

        $notification = array(
            'message' => 'Student Shift inserted successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('student.shift.view')->with($notification);

    }

    public function StudentShiftEdit($id){
        $editData = StudentShift::find($id);
        return view('backend.setup.shift.edit_shift', compact('editData'));
    }

    public function StudentShiftUpdate(Request $request, $id){
        $data = StudentShift::find($id);
        $validateData = $request->validate([
            'name' => 'required|unique:student_shifts,name,'.$data->id
        ]);
        $data->name = $request->name;
        $data->save();

        $notification = array(
            'message' => 'Student Shift updated successfully',
            'alert-type' => 'info'
        );

        return redirect()->route('student.shift.view')->with($notification);
    }

    public function StudentGroupDelete($id){
        $user = StudentShift::find($id);
        $user->delete();

        $notification = array(
            'message' => 'Student Shift deleted successfully',
            'alert-type' => 'info'
        );

        return redirect()->route('student.shift.view')->with($notification);
    }
}
