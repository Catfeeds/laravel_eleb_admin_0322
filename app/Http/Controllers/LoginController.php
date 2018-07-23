<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function create()
    {
        return view('session/login');
    }
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'password' => 'required',
            'captcha' => 'required|captcha',
        ],[
            'name.required'=>'用户名不能为空',
            'password.required'=>'密码不能为空',
            'captcha.required'=>'验证码不能为空',
            'captcha.captcha'=>'验证码错误'
        ]);

        if(Auth::attempt([
            'name'=>$request->name,
            'password'=>$request->password
        ],$request->remember)){

            return redirect()->route('shops.index')->with("success","登录成功");
        }else{

            return redirect()->route('login')->with("danger","登录失败")->withInput();
        }
    }

    public function destroy()
    {
        Auth::logout();
        return redirect()->route('login')->with("success",'注销成功');
    }
}
