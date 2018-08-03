<?php

namespace App\Http\Controllers;

use App\Models\Shop;
use App\Models\Shop_user;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
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

//    public function mail(Request $request)
//    {
//        $id=$request->id;
//        $shop_users=Shop_user::where('id',$id)->first();
//        //dd($shop_users);
//        Mail::raw("可爱的老哥:您的商家账号已经审核通过，请前往邮箱查看",function ($message){
//        $message->subject("商家审核通过");
//        $message->to('cgj245zijizou@163.com');
//        $message->from('cgj245zijizou@163.com','cgj245zijizou');
//    });

//        $tel = request()->tel;
//        $params = [];
//
//        // *** 需用户填写部分 ***
//
//        // fixme 必填: 请参阅 https://ak-console.aliyun.com/ 取得您的AK信息
//        $accessKeyId = "LTAIouqSpVF2lGsj";
//        $accessKeySecret = "B7V2T8g1akU7ciJqLeTzE2l20EiiQJ";
//
//        // fixme 必填: 短信接收号码
//        $params["PhoneNumbers"] = $tel;
//
//        // fixme 必填: 短信签名，应严格按"签名名称"填写，请参考: https://dysms.console.aliyun.com/dysms.htm#/develop/sign
//        $params["SignName"] = "褚国均";
//
//        // fixme 必填: 短信模板Code，应严格按"模板CODE"填写, 请参考: https://dysms.console.aliyun.com/dysms.htm#/develop/template
//        $params["TemplateCode"] = "SMS_141260036";
//
//        // fixme 可选: 设置模板参数, 假如模板中存在变量需要替换则为必填项
//
//        $params['TemplateParam'] = Array(
//            "code" => "123"
//            //"product" => "阿里通信"
//        );
////        Redis::set('sms' . $tel, $code);
////        Redis::expire('sms' . $tel, 300);
//        // fixme 可选: 设置发送短信流水号
//        $params['OutId'] = "12345";
//
//        // fixme 可选: 上行短信扩展码, 扩展码字段控制在7位或以下，无特殊需求用户请忽略此字段
//        $params['SmsUpExtendCode'] = "1234567";
//
//
//        // *** 需用户填写部分结束, 以下代码若无必要无需更改 ***
//        if (!empty($params["TemplateParam"]) && is_array($params["TemplateParam"])) {
//            $params["TemplateParam"] = json_encode($params["TemplateParam"], JSON_UNESCAPED_UNICODE);
//        }
//
//        // 初始化SignatureHelper实例用于设置参数，签名以及发送请求
//        $helper = new SignatureHelper();
//
//        // 此处可能会抛出异常，注意catch
//        $content = $helper->request(
//            $accessKeyId,
//            $accessKeySecret,
//            "dysmsapi.aliyuncs.com",
//            array_merge($params, array(
//                "RegionId" => "cn-hangzhou",
//                "Action" => "SendSms",
//                "Version" => "2017-05-25",
//            ))
//        // fixme 选填: 启用https
//        // ,true
//        );

//        return json_encode($content);




//        session()->flash('success',"发送成功");
//        return redirect()->route('shop_users.index');
//    }
}
