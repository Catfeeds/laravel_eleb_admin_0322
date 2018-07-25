@extends('default')
@section('contents')
<h1>添加分类</h1>
@include('_errors')
<form action="{{route('shop_categorys.update',[$shop_category])}}" method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label for="">分类名 ：</label>
        <input class="form-control" type="text" name="name" value="@if(old('name')){{old('name')}}@else{{$shop_category->name}}@endif">
    </div>

    <div class="form-group">
        <label for="">分类图片：</label>
        <input type="hidden" id="img"  name="img">
        <div id="uploader-demo">
            <!--用来存放item-->
            <div id="fileList" class="uploader-list"></div>
            <div id="filePicker">选择图片</div>
        </div>
        <img src="{{$shop_category->img}}" alt="" width="50px" height="50px">
    </div>
    <img src="" id="img2" alt="">
    <div class="form-group">
        <label for="">状态 ：</label>
        显示：<input  type="radio" name="status" value="1" {{$shop_category->status==1?"checked":''}}>
        隐藏：<input  type="radio" name="status" value="0" {{$shop_category->status==0?"checked":''}}>
    </div>
    {{csrf_field()}}
    {{method_field('PATCH')}}
    <button class="btn btn-primary">提交</button>
</form>
@stop
@section('js')
    <script>
        // 初始化Web Uploader
        var uploader = WebUploader.create({

            // 选完文件后，是否自动上传。
            auto: true,

            // swf文件路径
            //swf: BASE_URL + '/js/Uploader.swf',

            // 文件接收服务端。
            server: "{{route('upload')}}",

            // 选择文件的按钮。可选。
            // 内部根据当前运行是创建，可能是input元素，也可能是flash.
            pick: '#filePicker',

            // 只允许选择图片文件。
            accept: {
                title: 'Images',
                extensions: 'gif,jpg,jpeg,bmp,png',
                mimeTypes: 'image/*'
            },
            formData:{
                _token:'{{csrf_token()}}'
            }
        });

        uploader.on( 'uploadSuccess', function( file,response) {
            // //给src赋值,赋的值就是图片的绝对地址
            $('#img2').attr('src',response.fileName);
            //写一个input(hidden)id设为img_url,图片上传成功后,就把图片的地址传到数据库保存
            $('#img').val(response.fileName);
        });


    </script>
@stop