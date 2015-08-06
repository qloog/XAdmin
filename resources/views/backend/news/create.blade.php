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
            <form class="form-horizontal" id="news_form" role="form" method="POST" action="{{ URL::to('admin/news') }}" enctype="multipart/form-data">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="form-group">
                    <label class="col-sm-2 control-label no-padding-right" for="form-field-1"> 新闻标题 </label>
                    <div class="col-sm-10">
                        <input type="text" name="title" id="form-field-1" placeholder="标题" class="col-xs-10 col-sm-5">
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-2 control-label no-padding-right" for="form-field-1"> 所属分类 </label>
                    <div class="col-sm-10">
                        <select name="category_id">
                            @foreach ($selectCategory as $item)
                            <option value="{{ $item['id'] }}">{{ $item['html'] }}{{ $item['name'] }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-2 control-label no-padding-right" for="form-field-1"> 页面关键词 </label>
                    <div class="col-sm-10">
                        <input type="text" name="meta_keyword" id="form-field-1" placeholder="蜘蛛侠、煎饼侠" class="col-xs-10 col-sm-5">
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-2 control-label no-padding-right" for="form-field-1"> 页面描述 </label>
                    <div class="col-sm-10">
                        <input type="text" name="meta_description" id="form-field-1" placeholder="蜘蛛侠大超人" class="col-xs-10 col-sm-5">
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-2 control-label no-padding-right" for="form-field-1-1"> 封面图 </label>
                    <div class="col-sm-10">
                        <input type="file" name="page_image" id="form-field-1-1" placeholder="简单描述" class="form-control"></textarea>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-2 control-label no-padding-right" for="form-field-1-1"> 摘要 </label>
                    <div class="col-sm-10">
                        <textarea name="summary" id="form-field-1-1" placeholder="简单描述" class="form-control"></textarea>
                    </div>
                </div>

                <div class="space-4"></div>

                <div class="form-group">
                    <label class="col-sm-2 control-label no-padding-right" for="form-field-tags">正文</label>
                    <input name="content" type="hidden" id="content">
                    <div class="col-sm-10">
                        {!! UEditor::content() !!}
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-2 control-label no-padding-right" for="form-field-1"> 浏览量 </label>
                    <div class="col-sm-10">
                        <input type="text" name="views" id="form-field-1" placeholder="100" class="col-xs-10 col-sm-5">
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-2 control-label no-padding-right" for="form-field-1"> 标签 </label>
                    <div class="col-sm-10">
                        <div class="inline">
                            <input type="text" name="tags" id="form-field-tags" value="" placeholder="Enter tags ..." style="display: none;">
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-2 control-label no-padding-right" for="form-field-1"> 发布状态 </label>
                    <div class="col-sm-10">
                        <select name="status">
                            @foreach ($status as $key => $item)
                            <option value="{{ $key }}">{{ $item }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="clearfix form-actions">
                    <div class="col-md-offset-3 col-md-10">
                        <button class="btn btn-info" type="submit">
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
<script src="{{ asset('js/bootstrap-tag.min.js') }}"></script>
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

     var tag_input = $('#form-field-tags');
             try{
                 tag_input.tag(
                   {
                     placeholder:tag_input.attr('placeholder'),
                     //enable typeahead by specifying the source array
                     source: {}//defined in ace.js >> ace.enable_search_ahead
                     /**
                     //or fetch data from database, fetch those that match "query"
                     source: function(query, process) {
                       $.ajax({url: 'remote_source.php?q='+encodeURIComponent(query)})
                       .done(function(result_items){
                         process(result_items);
                       });
                     }
                     */
                   }
                 )

                 //programmatically add a new
                 var $tag_obj = $('#form-field-tags').data('tag');
                 $tag_obj.add('这里写标签');
             }
             catch(e) {
                 //display a textarea for old IE, because it doesn't support this plugin or another one I tried!
                 tag_input.after('<textarea id="'+tag_input.attr('id')+'" name="'+tag_input.attr('name')+'" rows="3">'+tag_input.val()+'</textarea>').remove();
                 //$('#form-field-tags').autosize({append: "\n"});
             }
</script>
@endsection

