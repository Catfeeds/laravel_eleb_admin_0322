<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    public function index()
    {
      $roles=Role::all();
      return view('roles/index',compact('roles'));
    }

    public function create()
    {
        $permissions=Permission::all();
        //dd($permissions);
        return view('roles/create',compact('permissions'));
    }

    public function store(Request $request)
    {
        //dd($request->permission_id);
        $role=Role::create(['name'=>$request->name]);
        $role->givePermissionTo($request->permission_id);
        return redirect()->route('roles.index')->with('success',"添加成功");
    }

    public function destroy(Role $role)
    {
       $role->delete();
        return redirect()->route('roles.index')->with('success',"删除成功");
    }

    public function edit(Role $role)
    {
        $permissions=Permission::all();
        $myPermission=$role->permissions;
        //dd($myPermission);
        return view('roles/edit',compact('role','permissions','myPermission'));
    }

    public function update(Request $request,Role $role)
    {
        $role->update(['name'=>$request->name]);
        $role->syncPermissions($request->permission_id);
        return redirect()->route('roles.index')->with('success',"修改成功");
    }
}
