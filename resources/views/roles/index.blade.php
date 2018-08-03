@extends('default')
@section('contents')
    <h3>角色列表</h3>
    @include('_errors')
    <a href="{{route('roles.create')}}"><h4>添加角色</h4></a>
    <table class="table table-bordered">
        <tr>
            <td>ID</td>
            <td>角色名称</td>
            <td>操作</td>
        </tr>
        @foreach($roles as $role)
            <tr>
                <td>{{$role->id}}</td>
                <td>{{$role->name}}</td>
                <td>
                    <a href="{{route('roles.edit',[$role])}}" class="btn btn-info">修改</a>
                    <span><form action="{{route('roles.destroy',[$role])}}" method="post" style="display:inline">
                        {{csrf_field()}}
                            {{method_field('DELETE')}}
                            <button title="删除" class="btn btn-danger">删除</button>
                    </form></span>

                </td>
            </tr>
        @endforeach
    </table>
@stop
