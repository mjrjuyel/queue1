<?php

namespace App\Http\Controllers\Spatie;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;

class RoleController extends Controller
{

    public function add(){
        return view('role.add');
    }
    public function insert(Request $request){
        $insert = Role::create([
            'name'=>$request->name,
            'create_at'=>Carbon::now('UTC'),
        ]);
    }
}
