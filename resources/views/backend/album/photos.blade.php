@extends('backend.layouts.master')

@section('title', '相册管理')

@section('page_title')
    相册管理
@endsection

@section('page_description')
    图片列表
@endsection

@section('breadcrumb')
    <li><i class="ace-icon fa fa-home home-icon"></i><a href="/admin/dashboard">主页</a></li>
    <li>相册管理</li>
    <li>上传图片</li>
@endsection

@section('content')
    <div class="row">
        <div class="col-xs-12">
            <div class="box box-success">
                <div class="box-header">
                    <h6 class="box-title">
                        <i class="fa fa-image margin"></i>相册名: {{ $album->name }}
                        <input type="file" id="file" name="file" multiple/>
                    </h6>
                </div>
                <!-- /.box -->
            </div>
            <!-- /.col -->
        </div>
    </div>
    <!-- /.row -->

    <div class="row">
        <div class="col-xs-12">

            <div class="box box-success">
                <div class="box-header">
                    <h6 class="box-title">
                        图片列表
                    </h6>
                    <!-- /.box-header -->
                <div class="box-body">
                    <div class="row margin-bottom">
                        <div class="col-sm-12">
                            <div class="row fluid" id="photo-list">
                                @foreach($photos as $photo)
                                <div class="col-sm-2 margin">
                                    <img width="200" src="{{ $photo->path }}" />
                                    <span>{{ $photo->origin_name }}</span>
                                </div>
                                <!-- /.col -->
                                @endforeach
                            </div>
                            <!-- /.row -->
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->
                </div>
                <!-- /.box-body -->

                <div class="box-footer">
                    <div class="pull-right">
                        {!! $photos->render() !!}
                    </div>
                </div>
            </div>
            <!-- /.box -->
        </div>
        <!-- /.col -->
    </div>
    <!-- /.row -->

    <div class="clearfix"></div>
@endsection

@section('styles')
    <link rel="stylesheet" href="{{ asset('plugins/bootstrap-fileinput/css/fileinput.min.css') }}">
@endsection

@section('scripts')
    <script src="{{ asset('plugins/bootstrap-fileinput/js/plugins/canvas-to-blob.min.js') }}"></script>
    <script src="{{ asset('plugins/bootstrap-fileinput/js/fileinput.min.js') }}"></script>
    <script src="{{ asset('plugins/bootstrap-fileinput/js/locales/zh.js') }}"></script>

    <script type="text/javascript">
        $(function () {

            var page_img = '';

            $('#file').fileinput({
                language: 'zh',
                uploadUrl: "/admin/album/upload",
                uploadExtraData: {_token: '{{ csrf_token() }}', id: '{{ $album->id }}'},
                initialCaption: "请选择要上传的照片",
                allowedFileExtensions: ["jpg", "jpeg", "png", "gif"],
                maxFilePreviewSize: 10240,
                @if(isset($photos->path))
                initialPreview: [
                    "<img src=" + page_img + " class='file-preview-image' />",
                ],
                @endif
            }).on('fileuploaded', function (event, data, previewId, index) {
                console.log(data);
                var response = data.response;
                var photo_div  = '<div class="col-sm-2 margin">';
                    photo_div += '<img width="200" height="200" src="' + response.image_path + '" />';
                    photo_div += '</div>';
                $(photo_div).insertBefore('#photo-list div:first');
                // or
                // $(photo_div).insertBefore($('#photo-list').children('div').eq(0));
            });
        });
    </script>
@endsection


