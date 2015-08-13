@extends('backend.layouts.master')

@section('title', '单页管理 - 内容 ')
@section('styles')
{!! UEditor::css() !!}
@endsection

@section('breadcrumb')
        <li>
            <i class="ace-icon fa fa-home home-icon"></i>
            <a href="/admin/dashboard">主页</a>
        </li>
        <li>
            <a>单页管理</a>
        </li>
        <li>
            内容页面
        </li>
@endsection

@section('content')
   <div class="row">
        <div class="col-md-12">
            <div class="tabbable">
                <ul class="nav nav-tabs" id="myTab">
                    <li class="active">
                        <a data-toggle="tab" href="#home" aria-expanded="true">
                            <i class="green ace-icon fa fa-home bigger-120"></i>
                            景区介绍
                        </a>
                    </li>

                    <li class="">
                        <a data-toggle="tab" href="#messages" aria-expanded="false">
                            精美图片
                        </a>
                    </li>
                </ul>

                <div class="tab-content">
                    <div id="home" class="tab-pane fade active in">
                        <!-- PAGE CONTENT BEGINS -->
                            <form class="form-horizontal" id="overview_form" role="form" method="POST" action="{{ URL::to('admin/page/1') }}" enctype="multipart/form-data">
                                <input name="_method" type="hidden" value="PUT">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">

                                <div class="form-group">
                                    <label class="col-sm-1 control-label no-padding-right" for="form-field-tags">正文</label>
                                    {{--<input name="content" type="hidden" id="content">--}}
                                    <div class="col-sm-9">
                                        {!! UEditor::content(isset($page->content) ? $page->content : '') !!}
                                    </div>
                                </div>
                                <div class="space"></div>
                                <div class="clearfix form-actions">
                                    <div class="col-md-offset-1 col-md-10">
                                        <button class="btn btn-info" type="submit">
                                            <i class="ace-icon fa fa-check bigger-110"></i>
                                            保存
                                        </button>
                                    </div>
                                </div>
                            </form>
                    </div>

                    <div id="messages" class="tab-pane fade">
                        <div class="row">
                            <div class="col-xs-8">
                            <!-- PAGE CONTENT BEGINS -->
                            @if (count($images) > 0)
                                <ul class="ace-thumbnails clearfix">
                                @foreach($images as $image)
                                <li>
                                    <a href="{{ $image }}" title="Photo Title" data-rel="colorbox" class="cboxElement">
                                        <img width="300" height="" src="{{ $image }}">
                                    </a>
                                </li>
                                @endforeach
                                </ul>
                            @endif
                            </div>
                            <div class="col-xs-4">
                            <!-- PAGE CONTENT BEGINS -->
                                <form class="form-horizontal" id="gallery_form" role="form" method="POST" action="{{ URL::to('admin/page/2') }}" enctype="multipart/form-data">
                                    <input name="_method" type="hidden" value="PUT">
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">

                                    <div class="form-group">
                                        <label class="col-sm-1 control-label no-padding-right" for="form-field-tags">图片</label>
                                        <div class="col-sm-9">
                                            <input type="file" name="file" id="file"  class="form-control" multiple/>
                                            <input type="hidden" name="ueditor" id="content" value="{{ isset($gallery->content) ? $gallery->content : '' }}" class="form-control" />
                                        </div>
                                    </div>
                                    <div class="space"></div>
                                    <div class="clearfix form-actions">
                                        <div class="col-md-offset-1 col-md-10">
                                            <button class="btn btn-info" type="submit">
                                                <i class="ace-icon fa fa-check bigger-110"></i>
                                                保存
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
   </div>
@endsection

@section('scripts')
{!! UEditor::js() !!}
<script src="{{ asset('js/jquery-file-upload/vendor/jquery.ui.widget.js') }}"></script>
<script src="{{ asset('js/jquery-file-upload/jquery.iframe-transport.js') }}"></script>
<script src="{{ asset('js/jquery-file-upload/jquery.fileupload.js') }}"></script>
<script type="text/javascript">
    $(function () {
        $('#file').fileupload({
            url: '/admin/upload/image',
            dataType: 'json',
            done: function (e, data) {
                var html = '<li>\
                            <a href="'+ data.result.image+ '" title="Photo Title" data-rel="colorbox" class="cboxElement">\
                                <img width="300" height="" src="'+ data.result.image+ '">\
                            </a>\
                        </li>';
                $('.ace-thumbnails').append(html);
                var content = $('#content').val();
                $('#content').val(content ? (content + ',' + data.result.image) : data.result.image);
            }
        });
    });
    var ue = UE.getEditor('ueditor',{initialFrameWidth : 1000}); //用辅助方法生成的话默认id是ueditor
    /* 自定义路由 */
    /*
    var serverUrl=UE.getOrigin()+'/ueditor/test'; //你的自定义上传路由
    var ue = UE.getEditor('ueditor',{'serverUrl':serverUrl}); //如果不使用默认路由，就需要在初始化就设定这个值
    */
    ue.ready(function() {
        ue.execCommand('serverparam', '_token', '{{ csrf_token() }}');
    });
</script>
@endsection

