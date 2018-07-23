@extends('default')
@section('contents')
<h1>添加</h1>
@include('_errors')
<form action="{{route('shop_users.store')}}" method="post" enctype="multipart/form-data">
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



    <div class="form-group">
        <label for="">状态 ：</label>
        启用：<input  type="radio" name="status" value="1" checked>
        禁用：<input  type="radio" name="status" value="0">
    </div>

    <div class="form-group">
        <label for="">所属商家 ：</label>
        <select name="shop_id" id="" class="form-control">
            @foreach($shop as $v)
                <option value="{{$v->id}}" >{{$v->name}}</option>
            @endforeach
        </select>
    </div>

    {{csrf_field()}}
    <button class="btn btn-primary">提交</button>
</form>
@stop