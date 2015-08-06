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
            编辑新闻
        </li>
@endsection

@section('content')
   <div class="row">
        <div class="col-xs-12">
            <!-- PAGE CONTENT BEGINS -->
            <form class="form-horizontal" id="news_form" role="form" method="POST" action="{{ URL::to('admin/news/' . $news->id) }}" enctype="multipart/form-data">
                <input name="_method" type="hidden" value="PUT">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="form-group">
                    <label class="col-sm-2 control-label no-padding-right" for="form-field-1"> 新闻标题 </label>
                    <div class="col-sm-10">
                        <input type="text" name="title" id="form-field-1" placeholder="标题" class="col-xs-10 col-sm-5" value="{{ $news->title }}">
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-2 control-label no-padding-right" for="form-field-1"> 页面关键词 </label>
                    <div class="col-sm-10">
                        <input type="text" name="meta_keyword" id="form-field-1" placeholder="蜘蛛侠、煎饼侠" class="col-xs-10 col-sm-5" value="{{ $news->meta_keyword }}">
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-2 control-label no-padding-right" for="form-field-1"> 页面描述 </label>
                    <div class="col-sm-10">
                        <input type="text" name="meta_description" id="form-field-1" placeholder="蜘蛛侠大超人" class="col-xs-10 col-sm-5" value="{{ $news->meta_description }}">
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-2 control-label no-padding-right" for="form-field-1-1"> 封面图 </label>
                    <div class="col-sm-10">
                        <input type="file" name="page_image" id="form-field-1-1" placeholder="简单描述" class="form-control" />
                        <img src="{{ $news->page_image }}" width="200px" />
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-2 control-label no-padding-right" for="form-field-1-1"> 摘要 </label>
                    <div class="col-sm-10">
                        <textarea name="summary" id="form-field-1-1" placeholder="简单描述" class="form-control">{{ $news->summary }}</textarea>
                    </div>
                </div>

                <div class="space-4"></div>

                <div class="form-group">
                    <label class="col-sm-2 control-label no-padding-right" for="form-field-tags">正文</label>
                    <input name="content" type="hidden" id="content">
                    <div class="col-sm-10">
                        {!! UEditor::content($news->content) !!}
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
                            <input type="text" name="tags" id="form-field-tags" value="" placeholder="请输入标签名，回车即可" style="display: none;">
                    	</div>
                    </div>
                </div>

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

        {{-- Confirm Delete --}}
        <div class="modal fade" id="modal-delete" tabIndex="-1">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">
                  ×
                </button>
                <h4 class="modal-title">Please Confirm</h4>
              </div>
              <div class="modal-body">
                <p class="lead">
                  <i class="fa fa-question-circle fa-lg"></i>
                  Are you sure you want to delete this post?
                </p>
              </div>
              <div class="modal-footer">
                <form method="POST" action="{{ route('admin.news.destroy', $news->id) }}">
                  <input type="hidden" name="_token" value="{{ csrf_token() }}">
                  <input type="hidden" name="_method" value="DELETE">
                  <button type="button" class="btn btn-default"
                          data-dismiss="modal">Close</button>
                  <button type="submit" class="btn btn-danger">
                    <i class="fa fa-times-circle"></i> Yes
                  </button>
                </form>
              </div>
            </div>
          </div>
        </div>
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
            @foreach($news->tags as $tag)
            $tag_obj.add('{{ $tag->tag }}');
            @endforeach
        }
        catch(e) {
            //display a textarea for old IE, because it doesn't support this plugin or another one I tried!
            tag_input.after('<textarea id="'+tag_input.attr('id')+'" name="'+tag_input.attr('name')+'" rows="2">'+tag_input.val()+'</textarea>').remove();
            //$('#form-field-tags').autosize({append: "\n"});
        }

</script>
@endsection

