@extends('default')
@section('contents')
@include('_errors')
    <a href="{{route('actions.create')}}"><h3>添加活动</h3></a>

<ul >
    <a href="{{route('actions.index',['status'=>'end'])}}"class="btn btn-danger">已结束活动</a>
    <a href="{{route('actions.index',['status'=>'ing'])}}"class="btn btn-success">进行中的活动</a>
    <a href="{{route('actions.index',['status'=>'not_start'])}}"class="btn btn-primary">未开始的活动</a>

</ul>
<table class="table table-bordered">
    <tr>
        <th>ID</th>
        <th>活动名称</th>
        <th>活动详情</th>
        <th>开始时间</th>
        <th>结束时间</th>
        <th>操作</th>
    </tr>
    @foreach($actions as $action)
        <tr>
            <td>{{$action->id}}</td>
            <td>{{$action->title}}</td>
            <td>{!!$action->content!!}</td>
            <td>{{$action->start_time}}</td>
            <td>{{$action->end_time}}</td>
            <td>
                <a href="{{route('actions.edit',[$action])}}" class="btn btn-primary">编辑</a>
                <span><form action="{{route('actions.destroy',[$action])}}" method="post" style="display:inline">
                        {{csrf_field()}}
                        {{method_field('DELETE')}}
                        <button title="删除" class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span></button>
                    </form></span>
            </td>
        </tr>
        @endforeach


</table>
@stop
