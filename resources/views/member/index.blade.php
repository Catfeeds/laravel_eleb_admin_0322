@extends('default')
@section('contents')
    <h3>会员列表</h3>
    <form action="{{route('members.index')}}" method="get">
        姓名：<input type="text" name="username">
        电话：<input type="text" name="tel">
        {{csrf_field()}}
        <input type="submit" value="搜索"></p>
    </form>

    <table class="table table-bordered">
        <tr>
            <th>ID</th>
            <th>用户名</th>
            <th>密码</th>
            <th>电话</th>
            <th>状态</th>
            <th>创建时间</th>
            <th>修改时间</th>
            <th>操作</th>
        </tr>
        @foreach($members as $member)
            <tr>
                <th>{{$member->id}}</th>
                <th>{{$member->username}}</th>
                <th>{{$member->password}}</th>
                <th>{{$member->tel}}</th>
                <th>
                    @if($member->status==0)
                    正常
                        @elseif($member->status==1)-
                      禁用
                        @endif
                </th>
                <th>{{$member->created_at}}</th>
                <th>{{$member->updated_at}}</th>
                <th>
                    <a href="{{route('members.show',[$member])}}" title="查看"  class="btn btn-info">查看</a>
                    <a href="{{route('stop',['status'=>'end','id'=>$member->id])}}" title="禁用"  class="btn btn-danger">禁用</a>
                    <a href="{{route('stop',['status'=>'ing','id'=>$member->id])}}" title="启用"  class="btn btn-success">启用</a>
                </th>
            </tr>
        @endforeach
    </table>
@stop