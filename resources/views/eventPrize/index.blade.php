@extends('default')
@section('contents')
<h3>奖品列表</h3>
<a href="{{route('eventPrizes.create')}}"><h4>添加奖品</h4></a>
    <table class="table table-bordered">
        <tr>
            <th>ID</th>
            <th>活动ID</th>
            <th>奖品名称</th>
            <th>奖品详情</th>
            <th>中奖商家账号id</th>
            <th>操作</th>
        </tr>
        @foreach($eventPrizes as $eventPrize)
            <tr>
                <td>{{$eventPrize->id}}</td>
                <td>{{$eventPrize->event->title}}</td>
                <td>{{$eventPrize->name}}</td>
                <td>{!! $eventPrize->description !!}</td>
                <td>{{$eventPrize->shop_id}}</td>
                <td>
                    <a href="{{route('eventPrizes.edit',[$eventPrize])}}" class="btn btn-primary">修改</a>
                    <span><form action="{{route('eventPrizes.destroy',[$eventPrize])}}" method="post" style="display:inline">
                        {{csrf_field()}}
                            {{method_field('DELETE')}}
                            <button title="删除" class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span></button>
                    </form></span>
                </td>
            </tr>
            @endforeach
    </table>
@stop
