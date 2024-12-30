<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\SendEmailRegister;
use App\Mail\SendEmailAdmin;
use App\Jobs\SendRegisterEmail;
use App\Jobs\sendOtpJob;
use App\Models\User;
use App\Models\TestModel;
use Session;

class UserController extends Controller
{
    public function add(){
        return view('user.add');
    }

    public function insert(Request $request){

        // return $request->all();
        $request->validate([
            'name'=>'required',
            'email'=>'required | email | unique:users,email',
        ]);
        $insert = TestModel::create([
            'name'=>$request['name'],
            'email'=>$request['email'],
        ]);
        
        for($i= 1 ; $i <10 ; $i++){
            \dispatch(new SendRegisterEmail($insert));
        }
        
        if($insert){
            // session()->flash('success');
            Session::flash('success','Registration Succussfully completed');
            return redirect()->back();
        }
    }

    public function sendOTP(){
        // $otp = rand(1000,9999);
        \dispatch(new sendOtpJob())->onQueue('high');

        Session::flash('success','Otp Send Successfully');
        return redirect()->back();
    }
}
