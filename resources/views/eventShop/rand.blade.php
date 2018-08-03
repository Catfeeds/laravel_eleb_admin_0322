@extends('default')
@section('contents')
<h3>抽奖表</h3>
<form action="{{route('randcj')}}" method="post">
    <select name="events_id" id="">
        <option value="0">--请选择抽奖活动</option>
        @foreach($events as $event)
        <option value="{{$event->id}}">{{$event->title}}</option>
            @endforeach
    </select>
    {{csrf_field()}}
    <input type="submit" value="抽奖">
</form>

@stop
