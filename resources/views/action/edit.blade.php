@extends('default')
@section('contents')
<h1>修改活动</h1>
@include('_errors')
<form action="{{route('actions.update',[$action])}}" method="post" >
    <div class="form-group">
        <label for="">活动名称 ：</label>
        <input class="form-control" type="text" name="title" value="@if(old('title')){{old('title')}}@else{{$action->title}}@endif" placeholder="请输入活动名称">
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
        <script id="container" name="content" type="text/plain">{!! $action->content !!}</script>
    </div>
    <div class="form-group">
        <label for="">活动开始时间 ：</label>
        <input class="form-control" type="datetime-local" name="start_time" value="{{date('Y-m-d\TH:i:s',strtotime($action->start_time))}}" >
    </div>
    <div class="form-group">
        <label for="">活动结束时间 ：</label>
        <input class="form-control" type="datetime-local" name="end_time" value="{{date('Y-m-d\TH:i:s',strtotime($action->end_time))}}" >
    </div>
{{method_field('PATCH')}}
    {{csrf_field()}}
    <button class="btn btn-primary">提交</button>
</form>
@stop