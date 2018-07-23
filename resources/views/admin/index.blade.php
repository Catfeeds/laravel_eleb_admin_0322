@extends('default')
@section('contents')
    <a href="{{route('admins.create')}}"><h3>添加管理员</h3></a>
<table class="table table-bordered">
    <tr>
        <th>ID</th>
        <th>管理员</th>
        <th>邮箱</th>
        <th>创建时间</th>
        <th>修改时间</th>
        <th>操作</th>
    </tr>
    @foreach($admins as $admin)
        <tr>
            <th>{{$admin->id}}</th>
            <th>{{$admin->name}}</th>
            <th>{{$admin->email}}</th>
            <th>{{$admin->created_at}}</th>
            <th>{{$admin->updated_at}}</th>
            <th>
                <a href="{{route('admins.edit',[$admin])}}" title="编辑"  class="btn btn-info"><span class="glyphicon glyphicon-pencil"></span></a>
                <span><form action="{{route('admins.destroy',[$admin])}}" method="post" style="display:inline">
                        {{csrf_field()}}
                        {{method_field('DELETE')}}
                        <button title="删除" class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span></button>
                    </form></span>

            </th>
        </tr>
        @endforeach
</table>
@stop