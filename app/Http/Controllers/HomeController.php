<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Counsellor;
use App\Models\Appointment;

class HomeController extends Controller
{
   public function redirect()
   {
        if(Auth::id())
            {
                if(Auth::user()->usertype=='0')
                    {
                        $counsellor = counsellor::all();
                        return view('user.home',compact('counsellor'));
                    }
        
                else
                    {
                        return view('admin.home');
                    }
            }
        else 
            {
                return redirect()->back();
            }
   } 

   public function index()
   {
        if(Auth::id())
            {
                return redirect('home');
            }

        else
            {
                $counsellor = counsellor::all();
                return view('user.home', compact('counsellor'));
            }  
   }

   public function appointment(Request $request)
   {
        $data = new appointment;
        $data->name=$request->name;
        $data->department=$request->department;
        $data->email=$request->email;
        $data->date=$request->date;
        $data->phone=$request->number;
        $data->message=$request->message;
        $data->counsellor=$request->counsellor;
        $data->status='In progress';

        if(Auth::id())
        {
            $data->user_id=Auth::user()->id;
        }

        $data->save();

        return redirect()->back()->with('message','Appointment was made successfully!! We will contact you shortly.');
   }
   
    public function myappointment()
    {
        if(Auth::id())
            {
                $userid=Auth::user()->id;
                $appoint=appointment::where('user_id',$userid)->get();
                return view('user.my_appointment',compact('appoint'));
            }
        else
            {
                return redirect()->back();
            }

    }


    public function cancel_appoint($id)
    {
        $data=appointment::find($id);

        $data->delete();
        
    }



   
}


