@extends('backend.layouts.master')

@section('title', '编辑相册')

@section('breadcrumb')
        <li>
            <i class="ace-icon fa fa-home home-icon"></i>
            <a href="/admin/dashboard">主页</a>
        </li>
        <li>
            <a>相册管理</a>
        </li>
        <li>
            编辑相册
        </li>
@endsection

@section('content')
   <div class="row">
        <div class="col-xs-12">
            <!-- PAGE CONTENT BEGINS -->
            {!! Form::model($album, ['route' => ['admin.album.update', $album->id], 'class' => 'form-horizontal', 'role' => 'form','files' => true]) !!}
            {!! Form::hidden('_method', 'PUT') !!}

                @include('backend.album._form')

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
            {!! Form::close() !!}
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
            <form method="POST" action="{{ route('admin.album.destroy', $album->id) }}">
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
</script>
@endsection

