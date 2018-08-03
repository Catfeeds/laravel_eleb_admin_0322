@extends('default')
@section('contents')
<h3>导航菜单表</h3>
<a href="{{route('navs.create')}}"><h4>添加菜单名</h4></a>
    <table class="table table-bordered">
        <tr>
            <th>ID</th>
            <th>name</th>
            <th>url</th>
            <th>permission_id</th>
            <th>pid</th>
            <th>操作</th>
        </tr>
        @foreach($navs as $nav)
            <tr>
                <td>{{$nav->id}}</td>
                <td>{{$nav->name}}</td>
                <td>{{$nav->url}}</td>
                <td>{{$nav->permission_id}}</td>
                <td>{{$nav->pid}}</td>
                <td>
                    <a href="{{route('navs.edit',[$nav])}}" title="编辑"  class="btn btn-info"><span class="glyphicon glyphicon-pencil"></span></a>
                    <span><form action="{{route('navs.destroy',[$nav])}}" method="post" style="display:inline">
                        {{csrf_field()}}
                            {{method_field('DELETE')}}
                            <button title="删除" class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span></button>
                    </form></span>

                </td>
            </tr>
            @endforeach
    </table>
@stop
