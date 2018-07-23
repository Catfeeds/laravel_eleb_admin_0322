<?php

namespace App\Http\Controllers;

use App\Models\Shop;
use App\Models\Shop_user;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class Shop_userController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');

    }
    public function index()
    {
        $shop_user=Shop_user::all();
        return view('shop_user/index',compact('shop_user'));
    }

    public function create()
    {
        $shop=Shop::all();
        return view('shop_user/create',compact('shop'));
    }
    public function store(Request $request)
    {
        $this->validate($request,[
            'name'=>'required|unique:shop_users',
            'email'=>'required|unique:shop_users',
            'password'=>'required',
            'status'=>'required',
            'shop_id'=>'required',
        ],[
            'name.require'=>'名称不能为空',
            'email.require'=>'邮箱不能为空',
            'email.unique'=>'邮箱已存在',
            'name.unique'=>'名称已存在',
            'status.require'=>'状态不能为空',
            'password.require'=>'密码不能为空',
            'shop_id.require'=>'所属商家不能为空'
        ]);
        $password=bcrypt($request->password);
        Shop_user::create(['name'=>$request->name,'email'=>$request->email,'status'=>$request->status,'password'=>$password,'shop_id'=>$request->shop_id]);

        session()->flash('success',"添加成功");
        return redirect()->route('shop_users.index');
    }

    public function edit(Shop_user $shop_user)
    {
        return view('shop_user/edit',compact('shop_user'));
    }

    public function update(Request $request,Shop_user $shop_user)
    {
        $this->validate($request,[
            'name'=>Rule::unique('shop_users')->ignore($shop_user->id),
            'email' => Rule::unique('shop_users')->ignore($shop_user->email),
            'password'=>'required',

        ],[
            'name.require'=>'名称不能为空',
            'email.require'=>'邮箱不能为空',
            'email.unique'=>'邮箱已存在',
            'name.unique'=>'名称已存在',
            'password.require'=>'密码不能为空',

        ]);
        $password=bcrypt($request->password);

            $shop_user->update(['password'=>$password]);
        session()->flash('success',"修改成功");
        return redirect()->route('shop_users.index');


    }

    public function destroy(Shop_user $shop_user)
    {
        $shop_user->delete();
        session()->flash('success',"删除成功");
        return redirect()->route('shop_users.index');
    }
}
