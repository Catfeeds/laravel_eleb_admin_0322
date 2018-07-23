@extends('default')
@section('contents')
<h1>添加</h1>
@include('_errors')
<form action="{{route('admins.store')}}" method="post" >
    <div class="form-group">
        <label for="">名称 ：</label>
        <input class="form-control" type="text" name="name" value="{{old('name')}}">
    </div>
    <div class="form-group">
        <label for="">邮箱 ：</label>
        <input class="form-control" type="text" name="email" value="{{old('email')}}">
    </div>
    <div class="form-group">
        <label for="">密码 ：</label>
        <input class="form-control" type="text" name="password" value="{{old('password')}}">
    </div>

    {{csrf_field()}}
    <button class="btn btn-primary">提交</button>
</form>
@stop