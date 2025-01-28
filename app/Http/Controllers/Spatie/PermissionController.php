<?php

namespace App\Http\Controllers\Spatie;


use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Permission;

class PermissionController extends Controller
{
    public function index(){
        $permission = Permission::all();
        return view('role-permission.permission.index',compact('permission'));
    }
    public function create(){
        return view('role-permission.permission.add');
    }
    public function insert(Request $request){
        $request->validate([
            'name'=>'required',
        ]);
        // return $request->all();
        $insert=Permission::create([
            'name'=>$request->name,
            'created_at'=>Carbon::now(),
        ]);

        if($insert){
            return redirect()->back()->with('success','Add New Permission');
        }
    }
    public function edit($id){
        $edit = Permission::find($id);
        return view('role-permission.permission.edit',compact('edit'));
    }
    public function update(Request $request,$id){
        $request->validate([
            'name'=>'required',
        ]);
        // return $request->all();
        $update=Permission::where('id',$id)->update([
            'name'=>$request->name,
            'updated_at'=>Carbon::now(),
        ]);

        if($update){
            return redirect()->back()->with('success','Update Exists Permission Data');
        }
    }

    public function delete($id){
        // return $id;
        $data = Permission::find($id);
        $data->delete();

        if($data){
            $permission = Permission::all();

            foreach($permission as $index => $value){
                $value->id = $index + 1;
                $value->save();
            }
        }
        return redirect()->back()->with('success','Have Deleted A Permisison Data');
    }
}
