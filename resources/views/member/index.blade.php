@extends('default')
@section('contents')
    <table class="table table-bordered">
        <tr>
            <th>ID</th>
            <th>用户名</th>
            <th>密码</th>
            <th>电话</th>
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
                <th>{{$member->created_at}}</th>
                <th>{{$member->updated_at}}</th>
                <th>
                    <a href="" title="编辑"  class="btn btn-info"><span class="glyphicon glyphicon-pencil"></span></a>
                    <span><form action="" method="post" style="display:inline">
                        {{csrf_field()}}
                            {{method_field('DELETE')}}
                            <button title="删除" class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span></button>
                    </form></span>

                </th>
            </tr>
        @endforeach
    </table>
@stop