@extends('backend.layouts.master')

@section('title', '添加新闻')

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
        <div class="col-md-12">
            <div class="box box-info">
                <div class="box-header with-border">
                    <h3 class="box-title">添加新闻</h3>
                </div>
                <!-- /.box-header -->
                <!-- form start -->
                {!! Form::open(['route' => 'admin.news.store', 'class' => 'form-horizontal', 'role' => 'form', 'method' => 'post', 'files' => true]) !!}
                <div class="box-body">
                    @include('backend.news._form')
                </div>
                <!-- /.box-body -->
                <div class="box-footer">
                    {{--<a href="{{route('admin.auth.permission.index')}}" class="btn btn-info pull-left "><i class="fa fa-arrow-left"></i> {{ trans('strings.return_button') }}</a>--}}
                    {{--<button type="submit" class="btn btn-success pull-right"><i class='fa fa-save'></i>&nbsp;&nbsp;{{ trans('strings.save_button') }}</button>--}}

                    <div class="clearfix form-actions">
                        <div class="col-md-offset-3 col-md-10">
                            <button class="btn btn-success" type="submit">
                                <i class="fa fa-save"></i>
                                保存
                            </button>
                            <button class="btn" type="reset">
                                <i class="fa fa-undo"></i>
                                重置
                            </button>
                        </div>
                    </div>
                </div>
                <!-- /.box-footer -->
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection