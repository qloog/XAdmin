@extends('backend.layouts.master')

@section('title', '编辑活动')
@section('styles')
<link rel="stylesheet" href="{{ asset('css/date-time/datepicker.min.css') }}" />
{!! UEditor::css() !!}
@endsection

@section('breadcrumb')
        <li>
            <i class="ace-icon fa fa-home home-icon"></i>
            <a href="/admin/dashboard">主页</a>
        </li>
        <li>
            <a>活动管理</a>
        </li>
        <li>
            添加活动
        </li>
@endsection

@section('content')
   <div class="row">
        <div class="col-xs-12">
            <!-- PAGE CONTENT BEGINS -->
            <form class="form-horizontal" id="news_form" role="form" method="POST" action="{{ URL::to('admin/event') }}" enctype="multipart/form-data">
                <input name="_method" type="hidden" value="POST">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">

                @include('backend.event._form')

                <div class="clearfix form-actions">
                    <div class="col-md-offset-3 col-md-10">
                        <button class="btn btn-info" type="submit">
                            <i class="ace-icon fa fa-check bigger-110"></i>
                            保存
                        </button>
                        <button class="btn" type="button" onclick="javascript:history.go(-1);">
                            <i class="ace-icon fa fa-undo bigger-110"></i>
                            返回
                        </button>
                        <button type="button" class="btn btn-danger btn-md"
                                data-toggle="modal" data-target="#modal-delete">
                          <i class="fa fa-times-circle"></i>
                          删除
                        </button>
                    </div>
                </div>
            </form>
    </div>

   </div>
@endsection

@section('scripts')
{!! UEditor::js() !!}
<script src="{{ asset('js/jquery-file-upload/vendor/jquery.ui.widget.js') }}"></script>
<script src="{{ asset('js/jquery-file-upload/jquery.iframe-transport.js') }}"></script>
<script src="{{ asset('js/jquery-file-upload/jquery.fileupload.js') }}"></script>
<script src="{{ asset('js/date-time/bootstrap-datepicker.min.js') }}"></script>
<script src="{{ asset('js/date-time/datepicker.zh-CN.js') }}"></script>
<script type="text/javascript">
    $(function () {
        $('#file').fileupload({
            url: '/admin/upload/image',
            type: 'POST',
            dataType: 'json',
            done: function (e, data) {
                $('#upload_image_preview').attr('src', data.result.image_url);
                $('#page_image').val(data.result.image);
            }
        });

        $('.input-daterange').datepicker({
            autoclose:true,
            format: 'yyyy-mm-dd',
            language: 'zh-CN'
        });

    });

    var ue = UE.getEditor('ueditor'); //用辅助方法生成的话默认id是ueditor
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

