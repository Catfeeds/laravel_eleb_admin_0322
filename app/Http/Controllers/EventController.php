<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;

class EventController extends Controller
{
    public function index()
    {

        $events=Event::all();
        //dd($events);
        return view('event/index',compact('events'));
    }

    public function create()
    {
       return view('event/create');
    }

    public function store(Request $request)
    {


        $this->validate($request,
            [
                'title'=>'required',
                'content'=>'required',
                'signup_start'=>'required',
                'signup_end'=>'required',
                'prize_date'=>'required',
                'signup_num'=>'required',
            ],
            [
                'title.required'=>'活动标题不能为空',
                'content.required'=>'活动详情不能为空',
                'signup_start.required'=>'报名开始时间不能为空',
                'signup_end.required'=>'报名结束时间不能为空',
                'prize_date.required'=>'开奖日期不能为空',
                'signup_num.required'=>'报名限制人数不能为空',
            ]);

        $start=strtotime($request->signup_start);
        $end=strtotime($request->signup_end);
        $time=time();
        if ($start>$end||$end<$time){
            return back()->with('danger','活动时间错误或活动过期');
        }

        Event::create([
           'title'=>$request->title,
           'content'=>$request->content,
           'signup_start'=>$start,
           'signup_end'=>$end,
           'prize_date'=>$request->prize_date,
           'signup_num'=>$request->signup_num,
           'is_prize'=>$request->is_prize,

        ]);

        return redirect()->route('events.index')->with('success','添加成功');
    }

    public function edit(Event $event)
    {
        return view('event/edit',compact('event'));
    }

    public function update(Request $request,Event $event)
    {
        $this->validate($request,
            [
                'title'=>'required',
                'content'=>'required',
                'signup_start'=>'required',
                'signup_end'=>'required',
                'prize_date'=>'required',
                'signup_num'=>'required',
            ],
            [
                'title.required'=>'活动标题不能为空',
                'content.required'=>'活动详情不能为空',
                'signup_start.required'=>'报名开始时间不能为空',
                'signup_end.required'=>'报名结束时间不能为空',
                'prize_date.required'=>'开奖日期不能为空',
                'signup_num.required'=>'报名限制人数不能为空',
            ]);

        $start=strtotime($request->signup_start);
        $end=strtotime($request->signup_end);
        $time=time();
        if ($start>$end||$end<$time){
            return back()->with('danger','活动时间错误或活动过期');
        }
        $event->update([
            'title'=>$request->title,
            'content'=>$request->content,
            'signup_start'=>$start,
            'signup_end'=>$end,
            'prize_date'=>$request->prize_date,
            'signup_num'=>$request->signup_num,
            'is_prize'=>$request->is_prize,

        ]);

        return redirect()->route('events.index')->with('success','修改成功');
    }

    public function destroy(Event $event)
    {


        $event->delete();
        return redirect()->route('events.index')->with('success','删除成功');
    }
}
