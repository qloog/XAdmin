@extends('backend.layouts.master')

@section('title', '新建用户')

@section('breadcrumb')
    <li>
        <i class="ace-icon fa fa-home home-icon"></i>
        <a href="/admin/dashboard">主页</a>
    </li>
    <li>
        <a>用户管理</a>
    </li>
    <li>
        新建用户
    </li>
@endsection

@section('content')
    <div class="row">
        <div class="col-xs-12">
            <!-- PAGE CONTENT BEGINS -->
            {!! Form::open(['route' => 'admin.auth.user.store', 'class' => 'form-horizontal', 'role' => 'form', 'method' => 'post']) !!}

            @include('backend.user._form')

            <div class="form-group">
                <label class="col-lg-2 control-label">是否启用</label>
                <div class="col-lg-1">
                    <input type="checkbox" value="1" name="status" />
                </div>
            </div><!--form control-->

            <div class="well">
                <div class="text-center">
                    <a href="{{route('admin.auth.user.index')}}" class="btn btn-danger btn-xs">{{ trans('strings.cancel_button') }}</a>
                    <input type="submit" class="btn btn-success btn-xs" value="{{ trans('strings.save_button') }}" />
                </div>
                <div class="clearfix"></div>
            </div><!--well-->
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

    </script>
@endsection

