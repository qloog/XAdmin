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
            <form class="form-horizontal" id="news_form" role="form" method="POST" action="{{ URL::to('admin/news/' . $id) }}" enctype="multipart/form-data">
                <input name="_method" type="hidden" value="PUT">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">

                @include('backend.news._form')

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
            <form method="POST" action="{{ route('admin.news.destroy', $id) }}">
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
<script src="{{ asset('js/jquery-file-upload/vendor/jquery.ui.widget.js') }}"></script>
<script src="{{ asset('js/jquery-file-upload/jquery.iframe-transport.js') }}"></script>
<script src="{{ asset('js/jquery-file-upload/jquery.fileupload.js') }}"></script>
<script src="{{ asset('js/bootstrap-tag.min.js') }}"></script>
<script type="text/javascript">
    $(function () {
        $('#file').fileupload({
            url: '/admin/upload/image',
            type: 'POST',
            dataType: 'json',
            done: function (e, data) {
                $('#upload_image_preview').attr('src', data.result.image);
                $('#page_image').val(data.result.image);
            }
        });
    });

    var ue = UE.getEditor('ueditor'); //用辅助方法生成的话默认id是ueditor
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
              }
            )

            //programmatically add a new
            var $tag_obj = $('#form-field-tags').data('tag');
            @foreach($tags as $item)
            $tag_obj.add('{{ $item }}');
            @endforeach
        }
        catch(e) {
            //display a textarea for old IE, because it doesn't support this plugin or another one I tried!
            tag_input.after('<textarea id="'+tag_input.attr('id')+'" name="'+tag_input.attr('name')+'" rows="2">'+tag_input.val()+'</textarea>').remove();
            //$('#form-field-tags').autosize({append: "\n"});
        }

</script>
@endsection

