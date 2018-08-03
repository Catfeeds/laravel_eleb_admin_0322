<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\EventPrize;
use App\Models\EventShop;
use Illuminate\Http\Request;

class EventShopController extends Controller
{
    //报名列表
    public function index()
    {
       $eventShops=EventShop::all();
       return view('eventShop/index',compact('eventShops'));
    }

    //抽奖页面
    public function rand()
    {
        $events=Event::where('is_prize',0)->get();
       return view('eventShop/rand',compact('events')) ;
    }

    public function randcj(Request $request)
    {
        $events_id=$request->events_id;
        //获取所有报名商家id
        $Shop_ids=EventShop::where('events_id',$events_id)->get(['shop_id'])->toArray();

        //获得该活动奖品
        $eventPrizes=EventPrize::where('events_id',$events_id)->get()->toArray();
        //dd($eventPrizes);

        //打乱顺序
        shuffle($Shop_ids);
        shuffle($eventPrizes);

        foreach ($eventPrizes as $eventPrize) {
            $shop_id = array_pop($Shop_ids);
            $shop_id = $shop_id??['shop_id' => 0];
            //修改活动状态
            //dd($event);
            Event::find($events_id)->update(['is_prize' => 1]);
            //将中奖商家写入到奖品表
            EventPrize::find($eventPrize['id'])->update($shop_id);
        }

        return redirect()->route('eventPrizes.index')->with('success','抽奖成功');
    }

}
