@extends('default')
@section('contents')
<table class="table table-bordered">
    <tr>
        <th>ID</th>
        <th>商家账号</th>
        <th>邮箱</th>
        <th>状态</th>
        <th>所属商家</th>
        <th>创建时间</th>
        <th>修改时间</th>
        <th>操作</th>
    </tr>
    @foreach($shop_user as $v)
        <tr>
            <th>{{$v->id}}</th>
            <th>{{$v->name}}</th>
            <th>{{$v->email}}</th>
            <th>{{$v->status==0?"禁用":"启用"}}</th>
            <th>{{$v->shop?$v->shop->shop_name:'无'}}</th>
            <th>{{$v->created_at}}</th>
            <th>{{$v->updated_at}}</th>
            <th>
                <a href="{{route('shop_users.show',['shop_user'=>$v])}}" title="查看"  class="btn btn-success"><span class="glyphicon glyphicon-eye-open"></span></a>
                <a href="{{route('shop_users.create')}}" title="添加" class="btn btn-primary"><span class="glyphicon glyphicon-plus" ></span></a>
                <a href="{{route('shop_users.edit',[$v])}}" title="编辑"  class="btn btn-info"><span class="glyphicon glyphicon-pencil"></span></a>
                <span><form action="{{route('shop_users.destroy',[$v])}}" method="post" style="display:inline">
                        {{csrf_field()}}
                        {{method_field('DELETE')}}
                        <button title="删除" class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span></button>
                    </form></span>
                {{--@if($v->status==1)--}}
                    {{--<a href="{{route('mail',['id'=>$v->id])}}" class="btn btn-primary">审核通过通知</a>--}}
                    {{--@endif--}}
            </th>
        </tr>
        @endforeach
</table>
@stop