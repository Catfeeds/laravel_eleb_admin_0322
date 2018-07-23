@extends('default')
@section('contents')
    {{--引入错误提示信息--}}
    @include('_errors')
    <form action="{{route('shops.update',[$shop])}}" method="post" enctype="multipart/form-data" style="width: 400px">
        <div class="form-group">
            <label>商家名称:</label>
            <input type="text" class="form-control" name="shop_name" value="@if(old('shop_name')){{old('shop_name')}}@else{{$shop->shop_name}}@endif" placeholder="请输入商家名称">
        </div>
        <div class="form-group">
            <label>分类ID:</label>
            <select name="shop_category_id" id="" class="form-control">
                @foreach($shop_category as $category)
                    <option value="{{$category->id}}" >{{$category->name}}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label>店铺图片:</label>
            <input type="file" name="shop_img" value="">
            <img src="{{$shop->shop_img}}" width="50px" height="50px" alt="">
        </div>
        <div class="form-group">
            <label>店铺评分:</label>
            <input type="text" name="shop_rating" value="@if(old('shop_rating')){{old('shop_rating')}}@else{{$shop->shop_rating}}@endif" class="form-control" placeholder="评分">
        </div>
        <div class="form-group">
            <label>是否是品牌:</label>
            <label><input type="radio" name="brand" value="1" {{$shop->brand==1?"checked":''}}>是</label>
            <label><input type="radio" name="brand" value="0" {{$shop->brand==0?"checked":''}}>否</label>
        </div>

        <div class="form-group">
            <label>是否准时配送:</label>
            <label><input type="radio" name="on_time" value="1" {{$shop->on_time==1?"checked":''}}>是</label>
            <label><input type="radio" name="on_time" value="0" {{$shop->on_time==0?"checked":''}}>否</label>
        </div>
        <div class="form-group">
            <label>是否蜂鸟配送:</label>
            <label><input type="radio" name="fengniao" value="1" {{$shop->fengniao==1?"checked":''}}>是</label>
            <label><input type="radio" name="fengniao" value="0" {{$shop->fengniao==0?"checked":''}}>否</label>
        </div>
        <div class="form-group">
            <label>是否保:</label>
            <label><input type="radio" name="bao" value="1" {{$shop->bao==1?"checked":''}}>是</label>
            <label><input type="radio" name="bao" value="0" {{$shop->bao==0?"checked":''}}>否</label>
        </div>
        <div class="form-group">
            <label>是否票:</label>
            <label><input type="radio" name="piao" value="1" {{$shop->piao==1?"checked":''}}>是</label>
            <label><input type="radio" name="piao" value="0" {{$shop->piao==0?"checked":''}}>否</label>
        </div>
        <div class="form-group">
            <label>是否准:</label>
            <label><input type="radio" name="zhun" value="1" {{$shop->zhun==1?"checked":''}}>是</label>
            <label><input type="radio" name="zhun" value="0" {{$shop->zhun==0?"checked":''}}>否</label>
        </div>
        <div class="form-group">
            <label>起送金额:</label>
            <input type="text" name="start_send" value="@if(old('start_send')){{old('start_send')}}@else{{$shop->start_send}}@endif" class="form-control" placeholder="请填写起送金额">
        </div>
        <div class="form-group">
            <label>配送费:</label>
            <input type="text" name="send_cost" value="@if(old('send_cost')){{old('send_cost')}}@else{{$shop->send_cost}}@endif" class="form-control" placeholder="请填写配送费">
        </div>
        <div class="form-group">
            <label>店铺公告:</label>
            <textarea class="form-control" rows="4" placeholder="店铺公告" name="notice">@if(old('notice')){{old('notice')}}@else{{$shop->notice}}@endif</textarea>
        </div>
        <div class="form-group">
            <label>优惠信息:</label>
            <textarea class="form-control" rows="3" placeholder="优惠信息" name="discount">@if(old('discount')){{old('discount')}}@else{{$shop->discount}}@endif</textarea>
        </div>
        <div class="form-group">
            <label>审核状态:</label>
            <label><input type="radio" name="status" value="1" {{$shop->status==1?"checked":''}}>正常</label>
            <label><input type="radio" name="status" value="0" {{$shop->status==0?"checked":''}}>待审核</label>
            <label><input type="radio" name="status" value="-1" {{$shop->status==-1?"checked":''}}>禁用</label>
        </div>
        {{method_field('PATCH')}}
        {{csrf_field()}}
        <button type="submit" class="btn btn-primary"> 确认</button>
    </form>
@stop
