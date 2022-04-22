<?php

namespace App\Http\Controllers\Backend\Setup;

use App\Http\Controllers\Controller;
use App\Http\Requests\SchoolSubjectRequest;
use App\Models\SchoolSubject;
use Illuminate\Http\Request;

class SchoolSubjectController extends Controller
{
    public function ViewSubject(){
        $data['allData'] = SchoolSubject::all();
        return view('backend.setup.school_subject.view_school_subject', $data);
    }

    
    public function SchoolSubjectAdd(){
        return view('backend.setup.school_subject.add_school_subject');
    }

    
    public function SchoolSubjectStore(SchoolSubjectRequest $request){
        $data = new SchoolSubject();
        $data->name = $request->name;
        $data->save();

        $notification = array(
            'message' => 'School Subject inserted successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('school.subject.view')->with($notification);

    }

    public function SchoolSubjectEdit($id){
        $editData = SchoolSubject::find($id);
        return view('backend.setup.school_subject.edit_school_subject', compact('editData'));
    }

    public function SchoolSubjectUpdate(Request $request, $id){
        $data = SchoolSubject::find($id);
        $validateData = $request->validate([
            'name' => 'required|unique:school_subjects,name,'.$data->id
        ]);
        $data->name = $request->name;
        $data->save();

        $notification = array(
            'message' => 'School Subject updated successfully',
            'alert-type' => 'info'
        );

        return redirect()->route('school.subject.view')->with($notification);
    }

    public function SchoolSubjectDelete($id){
        $user = SchoolSubject::find($id);
        $user->delete();

        $notification = array(
            'message' => 'School Subject deleted successfully',
            'alert-type' => 'info'
        );

        return redirect()->route('school.subject.view')->with($notification);
    }
}
