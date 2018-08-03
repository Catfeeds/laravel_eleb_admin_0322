@extends('default')
@section('contents')
    <h1>添加</h1>
    @include('_errors')
    <form action="{{route("navs.store")}}" method="post">
        <div class="form-group">
            <label for="">菜单名称 ：</label>
            <input class="form-control" type="text" name="name" value="{{old('name')}}">
        </div>
        <div class="form-group">
            <label for="">上级菜单 ：</label>
            <select name="pid" id="">
                <option value="0">--请选择上级分类</option>
                @foreach($navs as $nav)
                    <option value="{{$nav->id}}">{{$nav->name}}</option>
                    @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="">路由地址 ：</label>
            <input class="form-control" type="text" name="url" value="{{old('url')}}">
        </div>
        <div class="form-group">
            <label for="">权限 ：</label>
            <select name="permission_id" id="">
                <option value="">--请选择权限</option>
                @foreach($permissions as $v)
                    <option value="{{$v->id}}">{{$v->name}}</option>
                @endforeach
            </select>
        </div>
        {{csrf_field()}}
        <input type="submit" class="btn btn-info" value="提交">
        </form>

    @stop