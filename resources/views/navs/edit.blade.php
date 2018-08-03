@extends('default')
@section('contents')
    <h1>修改</h1>
    @include('_errors')
    <form action="{{route("navs.update",[$nav])}}" method="post">
        <div class="form-group">
            <label for="">菜单名称 ：</label>
            <input class="form-control" type="text" name="name" value="{{$nav->name}}">
        </div>
        <div class="form-group">
            <label for="">上级菜单 ：</label>
            <select name="pid" id="">
                <option value="0">--请选择上级分类</option>
                @foreach($navs as $v)
                    <option value="{{$v->id}}" {{$v->id==$nav->pid?"selected":''}}>{{$v->name}}</option>
                    @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="">路由地址 ：</label>
            <input class="form-control" type="text" name="url" value="{{$nav->url}}">
        </div>
        <div class="form-group">
            <label for="">权限 ：</label>
            <select name="permission_id" id="">
                <option value="">--请选择权限</option>
                @foreach($permissions as $v)
                    <option value="{{$v->id}}" {{$v->id==$nav->permission_id?'selected':''}}>{{$v->name}}</option>
                @endforeach
            </select>
        </div>
        {{csrf_field()}}
        {{method_field('PATCH')}}
        <input type="submit" class="btn btn-info" value="提交">
        </form>

    @stop