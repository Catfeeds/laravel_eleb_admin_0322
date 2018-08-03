<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Shop;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    public function index(Request $request)
    {
        $where=[];
        $keyword=[];
        $shop_id=$request->id;
        $start_time=strtotime($request->start_time);
        $end_time=strtotime($request->end_time);
        if ($shop_id){
            $where[]=['shop_id',$shop_id];
            $keyword['shop_id']=$shop_id;
        }
        if ($start_time){
            $where[]=['create_at','>',$start_time];
            $keyword['start_time']=$start_time;
        }
        if ($end_time){
            $where[]=['create_at','<',$end_time];
            $keyword['end_time']=$end_time;
        }

        $count=Order::where($where)->count();


        $shops=Shop::paginate(4);

        foreach($shops as $shop){
           $shop_id=$shop->id;
           $order_id=DB::select("select count(orders.id) as amount from orders where shop_id=$shop_id");

           $shop->amount=$order_id[0]->amount;
        }
        return view('order/index',compact('shops','count','start_time','end_time','keyword'));
    }
}
