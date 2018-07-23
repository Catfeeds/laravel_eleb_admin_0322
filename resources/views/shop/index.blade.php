@extends('default')
@section('contents')
<table class="table table-bordered">
    <tr>
        <th>ID</th>
        <th>分类</th>
        <th>商家名称</th>
        <th>店铺图片</th>
        <th>评分</th>
        <th>是否准时送达</th>
        <th>起送金额</th>
        <th>配送金额</th>
        <th>状态</th>
        <th>操作</th>
    </tr>
    @foreach($shops as $shop)
        <tr>
            <th>{{$shop->id}}</th>
            <th>{{$shop->shop_category?$shop->shop_category->name:'无'}}</th>
            <th>{{$shop->shop_name}}</th>
            <th><img src="{{$shop->shop_img}}" width="50px" height="50px" alt=""></th>
            <th>{{$shop->shop_rating}}</th>
            <th>{{$shop->on_time==0?"否":"是"}}</th>
            <th>{{$shop->start_send}}</th>
            <th>{{$shop->send_cost}}</th>
            <th>@if($shop->status==-1)
                禁用
                    @elseif($shop->status==0)
                 待审核
                    @else
                    正常
                    @endif
            </th>
            <th>
                <a href="{{route('shops.show',[$shop])}}" title="查看"  class="btn btn-success"><span class="glyphicon glyphicon-eye-open"></span></a>
                <a href="{{route('shops.create')}}" title="添加" class="btn btn-primary"><span class="glyphicon glyphicon-plus" ></span></a>
                <a href="{{route('shops.edit',[$shop])}}" title="编辑"  class="btn btn-info"><span class="glyphicon glyphicon-pencil"></span></a>
                <span><form action="{{route('shops.destroy',[$shop])}}" method="post" style="display:inline">
                        {{csrf_field()}}
                        {{method_field('DELETE')}}
                        <button title="删除" class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span></button>
                    </form></span>

            </th>
        </tr>
        @endforeach
</table>
@stop