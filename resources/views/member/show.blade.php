@extends('default')
@section('contents')
<h3>会员信息</h3>
    <p>姓名：{{$member->username}}</p>
    <p>密码:{{$member->password}}：</p>
    <p>电话：{{$member->tel}}</p>
    <p>创建时间：{{$member->created_at}}</p>

<a href="{{route('members.index')}}" class="btn btn-primary">返回</a>
@stop
