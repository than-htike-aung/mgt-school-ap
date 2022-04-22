<?php

namespace App\Http\Controllers\Backend\Setup;

use App\Http\Controllers\Controller;
use App\Http\Requests\DesignationRequest;
use App\Models\Designation;
use Illuminate\Http\Request;

class DesignationController extends Controller
{
    public function ViewDesignation(){
        $data['allData'] = Designation::all();
        return view('backend.setup.designation.view_designation', $data);
    }

    public function DesignationAdd(){
        return view('backend.setup.designation.add_designation');
    }

    public function DesignationStore(DesignationRequest $request){
        $data = new Designation();
        $data->name = $request->name;
        $data->save();

        $notification = array(
            'message' => 'Designation inserted successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('designation.view')->with($notification);

    }

    
    public function DesignationEdit($id){
        $editData = Designation::find($id);
        return view('backend.setup.designation.edit_designation', compact('editData'));
    }

    public function DesignationUpdate(Request $request, $id){
        $data = Designation::find($id);
        $validateData = $request->validate([
            'name' => 'required|unique:designations,name,'.$data->id
        ]);
        $data->name = $request->name;
        $data->save();

        $notification = array(
            'message' => 'Designation updated successfully',
            'alert-type' => 'info'
        );

        return redirect()->route('designation.view')->with($notification);
    }

    public function DesignationDelete($id){
        $user = Designation::find($id);
        $user->delete();

        $notification = array(
            'message' => 'Designation deleted successfully',
            'alert-type' => 'info'
        );

        return redirect()->route('designation.view')->with($notification);
    }


}