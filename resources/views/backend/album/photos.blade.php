@extends('backend.layouts.master')

@section('title', '相册管理')

@section('breadcrumb')
    <li><i class="ace-icon fa fa-home home-icon"></i><a href="/admin/dashboard">主页</a></li>
    <li>相册管理</li>
    <li>上传图片</li>
@endsection

@section('content')
    <div class="well">
        {{--@include('backend.album.search')--}}
    </div>
    <div class="pull-left">
        <div class="row">
            <div class="col-xs-12">
                {!! Form::open(['route' => 'admin.album.upload', 'class' => 'form-horizontal', 'role' => 'form', 'method' => 'post', 'files' => true]) !!}
                {!! Form::hidden('id', $album->id) !!}

                <div class="form-group">
                    {!! Form::label('file', '图片', ['class' => 'col-sm-2 control-label no-padding-right']) !!}
                    <div class="col-sm-10">
                        <div class="clearfix">
                            {!! Form::file('file', ['class' => 'col-xs-10 col-sm-5']) !!}
                        </div>
                    </div>
                </div>

                <div class="clearfix form-actions">
                    <div class="col-md-offset-3 col-md-10">
                        <button class="btn btn-info" type="submit">
                            <i class="ace-icon fa fa-check bigger-110"></i>
                            上传
                        </button>

                        <button class="btn" type="reset">
                            <i class="ace-icon fa fa-undo bigger-110"></i>
                            重置
                        </button>
                    </div>
                </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>

    <div class="clearfix"></div>

    <div class="row">
        <div class="col-xs-12">
            <!-- PAGE CONTENT BEGINS -->
            <div>
                <ul class="ace-thumbnails clearfix">

                    @foreach($photos as $photo)
                    <li>
                        <a href="{{ $photo->path }}" data-rel="colorbox">
                            <img width="200" height="200" alt="{{ $photo->origin_name }}" src="{{ $photo->path }}" />
                        </a>

                        <div class="tools tools-top in">
                            <a href="#">
                                <i class="ace-icon fa fa-link"></i>
                            </a>
                            <a href="#">
                                <i class="ace-icon fa fa-times red"></i>
                            </a>
                        </div>
                    </li>
                    @endforeach
                </ul>
            </div><!-- PAGE CONTENT ENDS -->
        </div><!-- /.col -->
    </div><!-- /.row -->

    <div class="pull-left">
        {!! $photos->total() !!} {{ trans('crud.users.total') }}
    </div>

    <div class="pull-right">
        {!! $photos->render() !!}
    </div>

    <div class="clearfix"></div>
@endsection

