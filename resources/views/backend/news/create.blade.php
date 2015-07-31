@extends('backend.layouts.master')

@section('title', '添加新闻')
@section('styles')
{!! UEditor::css() !!}
@endsection

@section('breadcrumb')
        <li>
            <i class="ace-icon fa fa-home home-icon"></i>
            <a href="/admin/dashboard">主页</a>
        </li>
        <li>
            <a>新闻管理</a>
        </li>
        <li>
            创建新闻
        </li>
@endsection

@section('content')
   <div class="row">
        <div class="col-xs-12">
            <!-- PAGE CONTENT BEGINS -->
            <form class="form-horizontal" id="news_form" role="form" method="POST" action="{{ URL::to('admin/news') }}">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="form-group">
                    <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> 新闻标题 </label>

                    <div class="col-sm-9">
                        <input type="text" name="title" id="form-field-1" placeholder="title" class="col-xs-10 col-sm-5">
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-3 control-label no-padding-right" for="form-field-1-1"> 摘要 </label>

                    <div class="col-sm-9">
                        <textarea name="meta_description" id="form-field-1-1" placeholder="Text Field" class="form-control"></textarea>
                    </div>
                </div>

                <div class="space-4"></div>

                <div class="form-group">
                    <label class="col-sm-3 control-label no-padding-right" for="form-field-tags">正文</label>
                    <input name="content" type="hidden" id="content">
                    <div class="col-sm-9">
                        {!! UEditor::content() !!}
                    </div>
                </div>

                <div class="clearfix form-actions">
                    <div class="col-md-offset-3 col-md-9">
                        <button class="btn btn-info" type="button" onClick="uptext();">
                            <i class="ace-icon fa fa-check bigger-110"></i>
                            Submit
                        </button>

                        &nbsp; &nbsp; &nbsp;
                        <button class="btn" type="reset">
                            <i class="ace-icon fa fa-undo bigger-110"></i>
                            Reset
                        </button>
                    </div>
                </div>
            </form>
    </div>
@endsection

@section('scripts')
{!! UEditor::js() !!}
<script type="text/javascript">

    var ue = UE.getEditor('ueditor'); //用辅助方法生成的话默认id是ueditor

    /* 自定义路由 */
    /*
    var serverUrl=UE.getOrigin()+'/ueditor/test'; //你的自定义上传路由
    var ue = UE.getEditor('ueditor',{'serverUrl':serverUrl}); //如果不使用默认路由，就需要在初始化就设定这个值
    */

    ue.ready(function() {
        ue.execCommand('serverparam', '_token', '{{ csrf_token() }}');
    });

     //这段要放在文本编辑器的实例化之后
     function uptext(){
         if (!ue.hasContents()){
            alert('请先填写内容!');
         }else{
            $('#content').val(ue.getContent());
            $('#news_form').submit();
         }
     }
</script>
@endsection

