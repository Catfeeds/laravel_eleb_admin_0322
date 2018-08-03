@extends('default')
@section('contents')
    <h3>权限列表</h3>
    @include('_errors')
    <a href="{{route('rbacs.create')}}"><h4>添加权限</h4></a>
<table class="table table-bordered">
    <tr>
        <td>ID</td>
        <td>权限名称</td>
        <td>操作</td>
    </tr>
    @foreach($permissions as $permission)
        <tr>
            <td>{{$permission->id}}</td>
            <td>{{$permission->name}}</td>
            <td>
                <a href="{{route('rbacs.edit',[$permission])}}" class="btn btn-info">修改</a>
                <span><form action="{{route('rbacs.destroy',[$permission])}}" method="post" style="display:inline">
                        {{csrf_field()}}
                        {{method_field('DELETE')}}
                        <button title="删除" class="btn btn-danger">删除</button>
                    </form></span>

            </td>
        </tr>
        @endforeach
</table>
@stop

