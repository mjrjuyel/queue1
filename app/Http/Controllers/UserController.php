<?php

namespace App\Http\Controllers;


use Carbon\Carbon;
use App\Models\User;
use App\Jobs\sendOtpJob;
use App\Models\TestModel;
use App\Mail\SendEmailAdmin;
use Illuminate\Http\Request;
use App\Jobs\SendRegisterEmail;
use App\Mail\SendEmailRegister;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;
use Session;

class UserController extends Controller
{
    public function index(){
        $users = User::all();
        return view('role-permission.user.index',compact('users'));
    }   
    
    public function create(){
        $roles = Role::all();
        return view('role-permission.user.add',compact('roles'));
    }

    public function store(Request $request){
        $request->validate([
            'name'=>'required'
        ]);
        // return $request->all();
        $insert=User::create([
            'name'=>$request['name'],
            'email'=>$request->email,
            'password'=>Hash::make($request->password),
            'create_at'=>Carbon::now(),
        ]);

        $insert->syncRoles($request->role);

        return redirect()->back()->with('success','User Created Succesfully');
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
            session()->flash('success','Registration Succussfully completed');
            return redirect()->back();
        }
    }

    public function sendOTP(){
        // $otp = rand(1000,9999);
        \dispatch(new sendOtpJob())->onQueue('high');

        session()->flash('success','Otp Send Successfully');
        return redirect()->back();
    }
}
