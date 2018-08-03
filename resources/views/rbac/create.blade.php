@extends('default')
@section('contents')
    <title>添加权限</title>
    @include('_errors')
    <form action="{{route('rbacs.store')}}" method="post">
        <div class="form-group">
            <label>权限名称:</label>
            <input type="text" class="form-control" name="name" value="{{old('name')}}" placeholder="请输入权限名称">
        </div>
        {{csrf_field()}}
        <input type="submit" class="btn btn-primary" value="确认">
    </form>
@stop
