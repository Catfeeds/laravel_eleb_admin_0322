<?php

namespace App\Http\Controllers;

use App\Models\Action;
use Illuminate\Http\Request;

class ActionController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');

    }
    public function index(Request $request)
    {
        $actions=Action::all();
//        dd($request->status);
        $time=date('Y-m-d H:i:s',time());
        if($request->status=='end'){
            $actions=Action::where('end_time','<',$time)->get();
        }elseif($request->status=='ing'){
            $actions=Action::where('start_time','<',$time)
                ->where('end_time','>',$time)->get();
        }elseif($request->status=='not_start'){
            $actions=Action::where('start_time','>',$time)->get();
        }
        return view('action/index',compact('actions'));
    }

    public function create()
    {
        return view('action/create');
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'title'=>'required',
            'content'=>'required',
            'start_time'=>'required',
            'end_time'=>'required',
        ],[
            'title.required'=>"请填写活动名",
            'content.required'=>"请填写活动详情",
            'start_time.required'=>"请填写活动开始时间",
            'end_time.required'=>"请填写活动结束时间",
        ]);
        $start=strtotime($request->start_time);
        $end=strtotime($request->end_time);
        $time=time();
        if ($start>$end||$end<$time){
            return back()->with('danger','活动时间错误或活动过期');
        }
        Action::create([
            'title'=>$request->title,
            'content'=>$request->content,
            'start_time'=>$request->start_time,
            'end_time'=>$request->end_time,
        ]);

        return redirect()->route('actions.index')->with('success','添加成功');
    }

    public function edit(Action $action)
    {
        return view('action/edit',compact('action'));
    }

    public function update(Request $request,Action $action)
    {

        $this->validate($request,[
            'title'=>'required',
            'content'=>'required',
            'start_time'=>'required',
            'end_time'=>'required',
        ],[
            'title.required'=>"请填写活动名",
            'content.required'=>"请填写活动详情",
            'start_time.required'=>"请填写活动开始时间",
            'end_time.required'=>"请填写活动结束时间",
        ]);

        $start=strtotime($request->start_time);
        $end=strtotime($request->end_time);
        $time=time();
        if ($start>$end||$end<$time){
            return back()->with('danger','活动时间错误时间过期');
        }
        $action->update([
            'title'=>$request->title,
            'content'=>$request->content,
            'start_time'=>$request->start_time,
            'end_time'=>$request->end_time,
        ]);
        return redirect()->route('actions.index')->with('success','修改成功');
    }

    public function destroy(Action $action)
    {
        $action->delete();
        return redirect()->route('actions.index')->with('success','删除成功');
    }

}
