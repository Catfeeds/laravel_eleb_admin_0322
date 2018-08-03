@extends('default')
@section('contents')
    <title>添加角色</title>
    @include('_errors')
    <form action="{{route('roles.store')}}" method="post">
        <div class="form-group">
            <label>角色名称:</label>
            <input type="text" class="form-control" name="name" value="{{old('name')}}" placeholder="请输入权限名称" style="width: 400px">
        </div>
        <div class="">
            <label>权限:</label>
            @foreach($permissions as $val)
            <label> <input type="checkbox" name="permission_id[]" value="{{$val->id}}">{{$val->name}}</label>
                @endforeach
                </div>
        {{csrf_field()}}
        <input type="submit" class="btn btn-primary" value="确认">
    </form>
@stop
