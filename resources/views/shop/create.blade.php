@extends('default')
@section('contents')
    {{--引入错误提示信息--}}
    @include('_errors')
    <form action="{{route('shops.store')}}" method="post" enctype="multipart/form-data" style="width: 400px">
        <div class="form-group">
            <label>商家名称:</label>
            <input type="text" class="form-control" name="shop_name" value="{{old('shop_name')}}" placeholder="请输入商家名称">
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
        </div>
        <div class="form-group">
            <label>店铺评分:</label>
            <input type="text" name="shop_rating" value="{{old('shop_rating')}}" class="form-control" placeholder="评分">
        </div>
        <div class="form-group">
            <label>是否是品牌:</label>
            <label><input type="radio" name="brand" value="1" checked>是</label>
            <label><input type="radio" name="brand" value="0">否</label>
        </div>

        <div class="form-group">
            <label>是否准时配送:</label>
            <label><input type="radio" name="on_time" value="1" checked>是</label>
            <label><input type="radio" name="on_time" value="0">否</label>
        </div>
        <div class="form-group">
            <label>是否蜂鸟配送:</label>
            <label><input type="radio" name="fengniao" value="1" checked>是</label>
            <label><input type="radio" name="fengniao" value="0">否</label>
        </div>
        <div class="form-group">
            <label>是否保:</label>
            <label><input type="radio" name="bao" value="1" checked>是</label>
            <label><input type="radio" name="bao" value="0">否</label>
        </div>
        <div class="form-group">
            <label>是否票:</label>
            <label><input type="radio" name="piao" value="1" checked>是</label>
            <label><input type="radio" name="piao" value="0">否</label>
        </div>
        <div class="form-group">
            <label>是否准:</label>
            <label><input type="radio" name="zhun" value="1" checked>是</label>
            <label><input type="radio" name="zhun" value="0">否</label>
        </div>
        <div class="form-group">
            <label>起送金额:</label>
            <input type="text" name="start_send" value="{{old('start_send')}}" class="form-control" placeholder="请填写起送金额">
        </div>
        <div class="form-group">
            <label>配送费:</label>
            <input type="text" name="send_cost" value="{{old('send_cost')}}" class="form-control" placeholder="请填写配送费">
        </div>
        <div class="form-group">
            <label>店铺公告:</label>
            <textarea class="form-control" rows="4" placeholder="店铺公告" name="notice"></textarea>
        </div>
        <div class="form-group">
            <label>优惠信息:</label>
            <textarea class="form-control" rows="3" placeholder="优惠信息" name="discount"></textarea>
        </div>
        <div class="form-group">
            <label>审核状态:</label>
            <label><input type="radio" name="status" value="1" checked>正常</label>
            <label><input type="radio" name="status" value="0">待审核</label>
            <label><input type="radio" name="status" value="-1">禁用</label>
        </div>
        {{csrf_field()}}
        <button type="submit" class="btn btn-primary"> 确认添加</button>
    </form>
@stop
