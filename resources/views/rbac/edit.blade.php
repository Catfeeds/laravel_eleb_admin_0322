@extends('default')
@section('contents')
    <title>修改权限</title>
    @include('_errors')
    <form action="{{route('rbacs.update',[$rbac])}}" method="post">
        <div class="form-group">
            <label>权限名称:</label>
            <input type="text" class="form-control" name="name" value="{{$rbac->name}}" placeholder="请输入权限名称">
        </div>
        {{csrf_field()}}
        {{method_field('PATCH')}}
        <input type="submit" class="btn btn-primary" value="确认">
    </form>
@stop
