@extends('backend.layouts.master')

@section('title', '编辑分类')

@section('breadcrumb')
    <li>
        <i class="ace-icon fa fa-home home-icon"></i>
        <a href="/admin/dashboard">主页</a>
    </li>
    <li>
        <a>新闻管理</a>
    </li>
    <li>
        编辑分类
    </li>
@endsection

@section('content')
    <div class="row">
        <div class="col-xs-12">
            <!-- PAGE CONTENT BEGINS -->
            {!! Form::model($category, ['route' => ['admin.news.category.update', $category->id], 'class' => 'form-horizontal', 'role' => 'form']) !!}
            {!! Form::hidden('_method', 'PUT') !!}

            @include('backend.news.category_form')

            <div class="clearfix form-actions">
                <div class="col-md-offset-3 col-md-10">
                    <button class="btn btn-info" type="submit">
                        <i class="fa fa-save"></i>
                        保存
                    </button>

                    <button class="btn" type="reset">
                        <i class="fa fa-undo"></i>
                        重置
                    </button>
                </div>
            </div>
            {!! Form::close() !!}
        </div>
    </div>
@endsection

