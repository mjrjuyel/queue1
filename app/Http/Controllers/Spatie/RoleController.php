<?php

namespace App\Http\Controllers\Spatie;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Permission;

class RoleController extends Controller
{
    public function index(){
        $role = Role::all();
        return view('role-permission.role.index',compact('role'));
    }
    public function create(){
        return view('role-permission.role.add');
    }
    public function insert(Request $request){
        $request->validate([
            'name'=>'required',
        ]);
        // return $request->all();
        $insert=Role::create([
            'name'=>$request->name,
            'created_at'=>Carbon::now(),
        ]);

        if($insert){
            return redirect()->back()->with('success','Add New Role');
        }
    }
    public function edit($id){
        $edit = Role::find($id);
        return view('role-permission.role.edit',compact('edit'));
    }
    public function update(Request $request,$id){
        $request->validate([
            'name'=>'required',
        ]);
        // return $request->all();
        $update=Role::where('id',$id)->update([
            'name'=>$request->name,
            'updated_at'=>Carbon::now(),
        ]);

        if($update){
            return redirect()->back()->with('success','Update Exists Role Data');
        }
    }

    public function delete($id){
        // return $id;
        $data = Role::find($id);
        $data->delete();
        if($data){
            $role = Role::all();

            foreach($role as $index => $value){
                $value->id = $index + 1;
                $value->save();
            }
        }
        return redirect()->back()->with('success','Have Deleted A Role Data');
    }

    // Add Permission to Role

    public function addPermission($id){
        $role = Role::find($id);
        $permissions = Permission::all();

        $rolePermission = DB::table('role_has_permissions')->where('role_id',$role->id)->pluck('permission_id')->all();
        // return $rolePermission;
        return view('role-permission.addPermission.add',compact(['role','permissions','rolePermission']));
    } 

    public function insertPermission(Request $request){
        $request->validate([
            'permission'=>'required',
        ]);
        $roleId = $request->id;
        $role =Role::findOrFail($roleId);

        $role->syncPermissions($request->permission);
        return redirect()->back()->with('success','Permission Assign To Role');
    }
}
