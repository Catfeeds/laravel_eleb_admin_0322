<?php

namespace App\Http\Controllers;

use App\Models\Rbac;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RbacController extends Controller
{
    public function index()
    {
        $permissions=Permission::all();

        return view('rbac/index',compact('permissions'));
    }

    public function create()
    {
        return view('rbac/create');
    }

    public function store(Request $request)
    {
        Permission::create(['name'=>$request->name]);

        return redirect()->route('rbacs.index')->with('success',"添加权限成功");
    }

    public function edit(Permission $rbac)
    {

        return view('rbac/edit',compact('rbac'));
    }

    public function update(Request $request,Permission $permission)
    {
        $id=$request->id;
        $permission->update(['name'=>$request->name],['id'=>$id]);

        return redirect()->route('rbacs.index')->with('success',"修改成功");
    }

    public function destroy(Permission $rbac)
    {
        $rbac->delete();
        return redirect()->route('rbacs.index')->with('success',"删除成功");
    }
}
