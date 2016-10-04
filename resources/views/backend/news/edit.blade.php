@extends('backend.layouts.master')

@section('title', '编辑新闻')

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
        <div class="row">
            <div class="col-md-12">
                <div class="box box-info">
                    <div class="box-header with-border">
                        <h3 class="box-title">编辑新闻</h3>
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                    {!! Form::model($news, ['route' => ['admin.news.update', $news->id], 'class' => 'form-horizontal', 'role' => 'form','files' => true]) !!}
                    {!! Form::hidden('_method', 'PUT') !!}
                    <div class="box-body">
                        @include('backend.news._form')
                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer">
                        <div class="clearfix form-actions">
                            <div class="col-md-offset-3 col-md-10">
                                <button class="btn btn-info" type="submit">
                                    <i class="fa fa-save"></i>
                                    保存
                                </button>
                                <button class="btn" type="button" onclick="javascript:history.go(-1);">
                                    <i class="ace-icon fa fa-undo bigger-110"></i>
                                    返回
                                </button>
                            </div>
                        </div>
                    </div>
                    <!-- /.box-footer -->
                    {!! Form::close() !!}
                </div>
            </div>
        </div>

        {{-- Confirm Delete --}}
        @include('backend.layouts.partials.delete_modal', array('action' => route('admin.news.destroy', $news->id)))
    </div>
@endsection