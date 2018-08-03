@extends('default')
@section('contents')
<h1>修改活动</h1>
@include('_errors')
<form action="{{route('eventPrizes.update',[$eventPrize])}}" method="post" >
    <div class="form-group">
        <label for="">活动 ：</label>
        <select name="events_id" id="">
            <option value="0">--请选择活动</option>
            @foreach($event as $v)
                <option value="{{$v->id}}" {{$eventPrize->events_id==$v->id?'selected':''}} >{{$v->title}}</option>
                @endforeach
        </select>
    </div>

    <div class="form-group">
        <label for="">中奖商家账号id ：</label>
        <input class="form-control" type="text" name="shop_id" value="1" placeholder="请输入活动名称">
    </div>
    <div class="form-group">
        <label for="">奖品名称 ：</label>
        <input class="form-control" type="text" name="name" value="{{$eventPrize->name}}" placeholder="请输入活动名称">
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
        <script id="container" name="description" type="text/plain">{!! $eventPrize->description !!}</script>
    </div>

{{method_field('PATCH')}}
    {{csrf_field()}}
    <button class="btn btn-primary">提交</button>
</form>
@stop