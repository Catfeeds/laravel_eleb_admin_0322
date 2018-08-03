@extends('default')
@section('contents')
<h1>添加活动</h1>
@include('_errors')
<form action="{{route('events.store')}}" method="post" >
    <div class="form-group">
        <label for="">活动名称 ：</label>
        <input class="form-control" type="text" name="title" value="{{old('title')}}" placeholder="请输入活动名称">
    </div>
    <div class="form-group">
        <label for="">活动详情 ：</label>
    @include('vendor.ueditor.assets')
        <!-- 实例化编辑器 -->
        <script type="text/javascript">
            var ue = UE.getEditor('container');
            ue.ready(function() {
                ue.execCommand('serverparam', '_token', '{{ csrf_token() }}'); // 设置 CSRF token.
            });
        </script>

        <!-- 编辑器容器 -->
        <script id="container" name="content" type="text/plain"></script>
    </div>
    <div class="form-group">
        <label for="">报名开始时间 ：</label>
        <input class="form-control" type="datetime-local" name="signup_start" >
    </div>
    <div class="form-group">
        <label for="">报名结束时间 ：</label>
        <input class="form-control" type="datetime-local" name="signup_end" >
    </div>
    <div class="form-group">
        <label for="">开奖时间 ：</label>
        <input class="form-control" type="date" name="prize_date" >
    </div>

    <div class="form-group">
        <label for="">报名限制人数 ：</label>
        <input class="form-control" type="text" name="signup_num" >
    </div>

    <div class="">
        <label for="">是否已开奖 ：</label>
        未开奖：<input class="" type="radio" name="is_prize" value="0" checked>
        已开奖：<input class="" type="radio" name="is_prize"  value="1">
    </div>

    {{csrf_field()}}
    <button class="btn btn-primary">提交</button>
</form>
@stop