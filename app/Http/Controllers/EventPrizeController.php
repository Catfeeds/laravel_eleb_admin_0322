<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\EventPrize;
use Illuminate\Http\Request;

class EventPrizeController extends Controller
{
    public function index()
    {
        $eventPrizes=EventPrize::all();
        return view('eventPrize/index',compact('eventPrizes'));
    }

    public function create()
    {
        $event=Event::all();
        return view('eventPrize/create',compact('event'));
    }

    public function store(Request $request)
    {
        $this->validate($request,
            [
                'name'=>'required',
                'description'=>'required',
                'events_id'=>'required',
                'shop_id'=>'required',
            ],
            [
                'name.required'=>'奖品名称不能为空',
                'description.required'=>'奖品详情不能为空',
                'events_id.required'=>'活动ID不能为空',
                'shop_id.required'=>'中奖商家账号id不能为空',
            ]);
        //活动未开奖才可以添加商品,已经开奖的活动不能添加商品
//        $is_prize=Event::where('id',$request->enevts_id)->first()->is_prize;
//        if ($is_prize!=0){
//            return back()->with('danger','该活动已开奖,不能添加奖品~!');
//        }

        EventPrize::create([
            'name'=>$request->name,
            'description'=>$request->description,
            'events_id'=>$request->events_id,
            'shop_id'=>$request->shop_id,
        ]);

        return redirect()->route('eventPrizes.index')->with('success','添加成功');
    }

    public function edit(EventPrize $eventPrize)
    {
        $event=Event::all();
       return view('eventPrize/edit',compact('eventPrize','event'));
    }

    public function update(Request $request,EventPrize $eventPrize)
    {

        $this->validate($request,
            [
                'name'=>'required',
                'description'=>'required',
                'events_id'=>'required',
                'shop_id'=>'required',
            ],
            [
                'name.required'=>'奖品名称不能为空',
                'description.required'=>'奖品详情不能为空',
                'events_id.required'=>'活动ID不能为空',
                'shop_id.required'=>'中奖商家账号id不能为空',
            ]);
//        //活动未开奖才可以添加商品,已经开奖的活动不能添加商品
//        $is_prize=Event::where('id',$request->enevts_id)->first()->is_prize;
//        if ($is_prize!=0){
//            return back()->with('danger','该活动已开奖,不能添加奖品~!');
//        }
        $eventPrize->update([
            'name'=>$request->name,
            'description'=>$request->description,
            'events_id'=>$request->events_id,
            'shop_id'=>$request->shop_id,
        ]);

        return redirect()->route('eventPrizes.index')->with('success','修改成功');
    }

    public function destroy(EventPrize $eventPrize)
    {
        $eventPrize->delete();
        return redirect()->route('eventPrizes.index')->with('success','删除成功');
    }
}
