@extends('default')
@section('contents')
<h1>修改</h1>
@include('_errors')
<form action="{{route('admins.update',[$admin])}}" method="post">
    <div class="form-group">
        <label for="">密码 ：</label>
        <input class="form-control" type="text" name="oldpassword">
    </div>
    <div class="form-group">
        <label for="">新密码 ：</label>
        <input class="form-control" type="text" name="password" >
    </div>
    <div class="form-group">
        <label for="">确认密码 ：</label>
        <input class="form-control" type="text" name="password_confirmation" >
    </div>
    <div >
        <label for="">角色 ：</label>
        @foreach($roles as $v)
            <label for=""><input type="checkbox" name="role_id[]" value="{{$v->id}}"
                {{$myRole->contains($v)?'checked':''}}>{{$v->name}}</label>
        @endforeach
    </div>
{{method_field('PATCH')}}
    {{csrf_field()}}
    <button type="submit" class="btn btn-primary">提交</button>
</form>
@stop