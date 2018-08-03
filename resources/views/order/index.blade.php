@extends('default')
@section('contents')
@include('_errors')
    <h3>订单列表</h3>
    <form action="{{route('orders.index')}}" method="get">


    商家：
    <select name="id" id="">
        @foreach($shops as $shop)
            <option value="{{$shop->id}}">{{$shop->shop_name}}</option>
        @endforeach
    </select>
    开始时间：<input type="datetime-local" name="start_time">
    结束时间：<input type="datetime-local" name="end_time">
    {{csrf_field()}}
    <input type="submit" value="查询订单"></p>
</form>
    <table class="table table-bordered">
        <tr>
            <th>ID</th>
            <th>分类</th>
            <th>商家名称</th>
            <th>店铺图片</th>
            <th>订单量</th>

        </tr>
        @foreach($shops as $shop)
            <tr>
                <th>{{$shop->id}}</th>
                <th>{{$shop->shop_category?$shop->shop_category->name:'无'}}</th>
                <th>{{$shop->shop_name}}</th>
                <th><img src="{{$shop->shop_img}}" width="50px" height="50px" alt=""></th>
                <th>{{$shop->amount}}</th>
            @endforeach
    </table>
<h3>订单总量：{{$count}}</h3>
    {{$shops->links()}}
@stop
