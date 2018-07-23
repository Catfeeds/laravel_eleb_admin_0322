@extends('default')
@section('contents')
<h1>添加分类</h1>
@include('_errors')
<form action="{{route('shop_categorys.store')}}" method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label for="">分类名 ：</label>
        <input class="form-control" type="text" name="name" value="{{old('name')}}">
    </div>

    <div class="form-group">
        <label for="">分类图片：</label>
        <input type="file"  name="img">
    </div>

    <div class="form-group">
        <label for="">状态 ：</label>
        显示：<input  type="radio" name="status" value="1">
        隐藏：<input  type="radio" name="status" value="0">
    </div>
    {{csrf_field()}}
    <button class="btn btn-primary">提交</button>
</form>
@stop