<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\Shop;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MenuController extends Controller
{
    public function menuCount(Request $request)
    {

        $where='';
        $start_time=strtotime($request->start_time);
        $end_time=strtotime($request->end_time);
        if ($start_time){
            $where=" and created_at > $start_time";
        }
        if($end_time){
            $where=" and created_at < $end_time";
        }


        $menus=Menu::all();
        $shops=Shop::all();
        $orders=DB::select("select id,shop_id from orders");//获取该商家所有订单

        foreach ($orders as $order){
            $order_ids[]=$order->id;//获取订单id;
            $shop_ids[]=$order->shop_id;
        }
        //dd($shop_ids);
        $str_id=implode(',',$order_ids);

        $goods=DB::select("select goods_id,sum(amount) as amount from order_goods where order_id in ($str_id) $where group by goods_id");

        foreach($menus as $menu){
            foreach ($goods as $good){
                if($menu->id==$good->goods_id){
                    $menu['amount']=$good->amount;

                }
            }

        }


        return view('menu/count',compact('menus','shops'));
    }

}
