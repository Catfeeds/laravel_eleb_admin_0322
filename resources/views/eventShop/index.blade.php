@extends('default')
@section('contents')
<h3>报名活动表</h3>
<table class="table table-bordered">
    <tr>
        <th>ID</th>
        <th>活动id</th>
        <th>商家账号id</th>
        <th>操作</th>
    </tr>
    @foreach($eventShops as $eventShop)
    <tr>
        <td>{{$eventShop->id}}</td>
        <td>{{$eventShop->event->title}}</td>
        <td>{{$eventShop->shop->shop_name}}</td>
        <td>
            <a href="">查看</a>
        </td>
    </tr>
        @endforeach
</table>
@stop
