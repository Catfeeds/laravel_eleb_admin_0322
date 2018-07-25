@extends('default')


@section('contents')
<table class="table table-bordered">
    <tr>
        <th>ID</th>
        <th>分类名</th>
        <th>分类图片</th>
        <th>状态</th>
        <th>创建时间</th>
        <th>修改时间</th>
        <th>操作</th>
    </tr>
    @foreach($shop_category as $v)
        <tr>
            <td>{{$v->id}}</td>
            <td>{{$v->name}}</td>
            <td><img src="{{$v->img}}" alt="" width="50px" height="50px"></td>
            <td>{{$v->status==0?"隐藏":"显示"}}</td>
            <td>{{$v->created_at}}</td>
            <td>{{$v->updated_at}}</td>
            <td>
                <a href="{{route('shop_categorys.show',['shop_category'=>$v])}}" title="查看"  class="btn btn-success"><span class="glyphicon glyphicon-eye-open"></span></a>
                <a href="{{route('shop_categorys.create')}}" title="添加" class="btn btn-primary"><span class="glyphicon glyphicon-plus" ></span></a>
                <a href="{{route('shop_categorys.edit',[$v])}}" title="编辑"  class="btn btn-info"><span class="glyphicon glyphicon-pencil"></span></a>
                <span><form action="{{route('shop_categorys.destroy',[$v])}}" method="post" style="display:inline">
                        {{csrf_field()}}
                        {{method_field('DELETE')}}
                        <button title="删除" class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span></button>
                    </form></span>
            </td>
        </tr>
        @endforeach
</table>
@stop