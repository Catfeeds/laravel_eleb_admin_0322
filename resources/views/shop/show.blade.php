@extends('default')
@section('contents')
 <h4>商家名称:{{$shop->shop_name}}</h4>
 <h4>商家分类:{{$shop->shop_category->name}}</h4>
 <h4>店铺图片:<img src="{{$shop->shop_img}}" width="50px" height="50px" alt=""></h4>
 <h4>是否是品牌:{{$shop->brand}}</h4>
 <h4>是否准时配送:{{$shop->on_time}}</h4>
 <h4>是否蜂鸟配送:{{$shop->fengniao}}</h4>
 <h4>是否保:{{$shop->bao}}</h4>
 <h4>是否票:{{$shop->piao}}</h4>
 <h4>是否准:{{$shop->zhun}}</h4>
 <h4>起送金额:{{$shop->start_send}}</h4>
 <h4>配送费:{{$shop->send_cost}}</h4>
 <h4>店铺公告:{{$shop->notice}}</h4>
 <h4>优惠信息:{{$shop->discount}}</h4>
 <h4>状态:@if($shop->status==-1)
   禁用
  @elseif($shop->status==0)
   正常
  @else
   待审核
  @endif</h4>


@stop