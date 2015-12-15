@extends('backend.layouts.master')

@section('title', '编辑权限')

@section('breadcrumb')
    <li><i class="ace-icon fa fa-home home-icon"></i><a href="/admin/dashboard">主页</a></li>
    <li><a>用户管理</a></li>
    <li>编辑角色</li>
@endsection

@section('content')
    <div class="row">
        <div class="col-xs-12">
            <!-- PAGE CONTENT BEGINS -->
            {!! Form::model($permission, ['route' => ['admin.auth.permission.update', $permission->id], 'class' => 'form-horizontal', 'role' => 'form']) !!}
            {!! Form::hidden('_method', 'PUT') !!}

            @include('backend.permission._form')

            <div class="well">
                <div class="text-center">
                    <a href="{{route('admin.auth.role.index')}}" class="btn btn-info btn-xs">{{ trans('strings.return_button') }}</a>
                    <input type="submit" class="btn btn-success btn-xs" value="{{ trans('strings.save_button') }}" />
                    <button type="button" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#modal-delete">删除</button>
                </div>
                <div class="clearfix"></div>
            </div><!--well-->
            {!! Form::close() !!}
        </div>

        {{-- Confirm Delete --}}
        @include('backend.partials.delete_modal', array('action' => route('admin.auth.permission.destroy', $permission->id)))
    </div>
@endsection

@section('scripts')

@endsection

