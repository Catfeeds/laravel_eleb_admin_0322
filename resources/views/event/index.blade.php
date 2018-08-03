@extends('default')
@section('contents')
<h3>抽奖活动列表</h3>
<a href=""><h4>添加活动</h4></a>
    <table class="table table-bordered">
        <tr>
            <th>ID</th>
            <th>标题</th>
            <th>详情</th>
            <th>报名开始时间</th>
            <th>报名结束时间</th>
            <th>开奖日期</th>
            <th>报名人数限制</th>
            <th>是否已开奖</th>
            <th>操作</th>
        </tr>
        @foreach($events as $event)
            <tr>
                <td>{{$event->id}}</td>
                <td>{{$event->title}}</td>
                <td>{!! $event->content !!}</td>
                <td>{{date('Y-m-d H:i',$event->signup_start)}}</td>
                <td>{{date('Y-m-d H:i',$event->signup_end)}}</td>
                <td>{{$event->prize_date}}</td>
                <td>{{$event->signup_num}}</td>
                <td>{{$event->is_prize==0?'未开奖':'已开奖'}}</td>
                <td>
                    <a href="{{route('events.edit',[$event])}}" class="btn btn-primary">修改</a>
                    <span><form action="{{route('events.destroy',[$event])}}" method="post" style="display:inline">
                        {{csrf_field()}}
                            {{method_field('DELETE')}}
                            <button title="删除" class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span></button>
                    </form></span>
                </td>
            </tr>
            @endforeach
    </table>
@stop
