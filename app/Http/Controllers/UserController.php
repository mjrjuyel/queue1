<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\SendEmailRegister;
use App\Mail\SendEmailAdmin;
use App\Jobs\SendRegisterEmail;
use App\Models\User;
use App\Models\TestModel;

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
        \dispatch(new SendRegisterEmail($insert));
        
        if($insert){
            // session()->flash('success');
            return redirect()->back();
        }
    }
}
