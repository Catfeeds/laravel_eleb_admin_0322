@extends('default')
@section('contents')
    <title>修改角色</title>
    @include('_errors')
    <form action="{{route('roles.update',[$role])}}" method="post">
        <div class="form-group">
            <label>角色名称:</label>
            <input type="text" class="form-control" name="name" value="{{$role->name}}" placeholder="请输入权限名称" style="width: 400px">
        </div>
        <div class="">
            <label>权限:</label>
            @foreach($permissions as $val)
            <label> <input type="checkbox" name="permission_id[]" value="{{$val->id}}"
                {{$myPermission->contains($val)?"checked":''}}
                >{{$val->name}}</label>
                @endforeach
                </div>
        {{csrf_field()}}
        {{method_field('PATCH')}}
        <input type="submit" class="btn btn-primary" value="确认">
    </form>
@stop
