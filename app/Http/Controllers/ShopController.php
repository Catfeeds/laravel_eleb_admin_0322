<?php

namespace App\Http\Controllers;

use App\Models\Shop;
use App\Models\Shop_category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ShopController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');

    }
    public function index()
    {
        $shops=Shop::all();
        return view('shop/index',compact('shops'));
   }

    public function create()
    {
        $shop_category=Shop_category::all();
        return view('shop/create',compact('shop_category'));
   }

    public function store(Request $request)
    {
        //dd($request->all());
        $this->validate($request,[
            'shop_category_id'=>'required',
            'shop_name'=>'required',
            'shop_img'=>'required',
            'shop_rating'=>'required',
            'start_send'=>'required',
            'send_cost'=>'required',
            'notice'=>'required',
            'discount'=>'required',
            'status'=>'required'
        ],[
            'shop_category_id.require'=>'分类名不能为空',
            'shop_name.require'=>'商品名不能为空',
            'shop_img.require'=>'店铺图片不能为空',
            'shop_rating.require'=>'评分不能为空',
            'start_send.require'=>'起送金额不能为空',
            'send_cost.require'=>'配送费不能为空',
            'notice.require'=>'店公告不能为空',
            'discount.require'=>'优惠信息不能为空',
            'status.require'=>'状态不能为空',
        ]);
//        $storage=Storage::disk('oss');
//        $fileName=$storage->putFile('shop',$request->shop_img);
        Shop::create([
            'shop_name'=>$request->shop_name,
            'shop_img'=>$request->shop_img,
            'status'=>$request->status,
            'shop_category_id'=>$request->shop_category_id,
            'shop_rating'=>$request->shop_rating,
            'start_send'=>$request->start_send,
            'send_cost'=>$request->send_cost,
            'notice'=>$request->notice,
            'discount'=>$request->discount,
            'brand'=>$request->brand,
            'bao'=>$request->bao,
            'piao'=>$request->piao,
            'zhun'=>$request->zhun,
            'fengniao'=>$request->fengniao,
            'on_time'=>$request->on_time
        ]);

        session()->flash('success',"添加成功");
        return redirect()->route('shops.index');
   }

    public function edit(Shop $shop)
    {
        $shop_category=Shop_category::all();
       return view('shop/edit',compact('shop','shop_category'));
   }

    public function update(Request $request,Shop $shop)
    {
        $this->validate($request,[
            'shop_category_id'=>'required',
            'shop_name'=>'required',
            'shop_rating'=>'required',
            'start_send'=>'required',
            'send_cost'=>'required',
            'notice'=>'required',
            'discount'=>'required',
            'status'=>'required'
        ],[
            'shop_category_id.required'=>'分类名不能为空',
            'shop_name.required'=>'商品名不能为空',
            'shop_rating.required'=>'评分不能为空',
            'start_send.required'=>'起送金额不能为空',
            'send_cost.required'=>'配送费不能为空',
            'notice.required'=>'店公告不能为空',
            'discount.required'=>'优惠信息不能为空',
            'status.required'=>'状态不能为空',
        ]);


        if (!empty($request->shop_img)){
//            $storage=Storage::disk('oss');
//            $fileName=$storage->putFile('shop',$request->shop_img);

            $shop->update([
                'shop_name'=>$request->shop_name,
                'shop_img'=>$request->shop_img,
                'status'=>$request->status,
                'shop_category_id'=>$request->shop_category_id,
                'shop_rating'=>$request->shop_rating,
                'start_send'=>$request->start_send,
                'send_cost'=>$request->send_cost,
                'notice'=>$request->notice,
                'discount'=>$request->discount,
                'bland'=>$request->bland,
                'bao'=>$request->bao,
                'piao'=>$request->piao,
                'zhun'=>$request->zhun,
                'fengniao'=>$request->fengniao,
                'on_time'=>$request->on_time,
            ]);
        }else{

            $shop->update([
                'shop_name'=>$request->shop_name,
                'status'=>$request->status,
                'shop_id'=>$request->shop_id,
                'shop_rating'=>$request->shop_rating,
                'start_send'=>$request->start_send,
                'send_cost'=>$request->send_cost,
                'notice'=>$request->notice,
                'discount'=>$request->discount,
                'bland'=>$request->bland,
                'bao'=>$request->bao,
                'piao'=>$request->piao,
                'zhun'=>$request->zhun,
                'fengniao'=>$request->fengniao,
                'on_time'=>$request->on_time,
            ]);
        }
        session()->flash('success',"修改成功");
        return redirect()->route('shops.index');
   }

    public function destroy(Shop $shop)
    {
        $shop->delete();
        session()->flash('success',"删除成功");
        return redirect()->route('shops.index');
   }

    public function show(Shop $shop)
    {
        //dd($shop->id);
        return view('shop/show',compact('shop'));
        //return "123";
   }
}
