<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Counsellor;

class AdminController extends Controller
{
    public function addview()
    {
        return view('admin.add_counsellor');
    }

    public function upload(Request $request)
    {

        $counsellor=new counsellor;
        $photo=$request->file;

    $photoname=time().'.'.$photo->getClientoriginalExtension();

    $request->file->move('counsellorphoto',$photoname);

    $counsellor->photo=$photoname;

        $counsellor->name=$request->name;
        $counsellor->email=$request->email;
        $counsellor->phone=$request->number;
        $counsellor->room=$request->room;
        $counsellor->visitinghrs=$request->visitinghours;
       
        $counsellor->save();

        return redirect()->back()->with('message','Counsellor added successfully!!!!');
    }

    public function showappointments()
    {
        return view('admin.showappointment');
    }


}
