@extends('default')
@section('contents')
<h1>添加分类</h1>
@include('_errors')
<form action="{{route('shop_categorys.update',[$shop_category])}}" method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label for="">分类名 ：</label>
        <input class="form-control" type="text" name="name" value="@if(old('name')){{old('name')}}@else{{$shop_category->name}}@endif">
    </div>

    <div class="form-group">
        <label for="">分类图片：</label>
        <input type="file"  name="img">
        <img src="{{\Illuminate\Support\Facades\Storage::url($shop_category->img)}}" alt="" width="50px" height="50px">
    </div>

    <div class="form-group">
        <label for="">状态 ：</label>
        显示：<input  type="radio" name="status" value="1" {{$shop_category->status==1?"checked":''}}>
        隐藏：<input  type="radio" name="status" value="0" {{$shop_category->status==0?"checked":''}}>
    </div>
    {{csrf_field()}}
    {{method_field('PATCH')}}
    <button class="btn btn-primary">提交</button>
</form>
@stop