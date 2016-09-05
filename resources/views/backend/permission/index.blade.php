@extends('backend.layouts.master')

@section('title', '用户管理')

@section('breadcrumb')
    <li><i class="ace-icon fa fa-home home-icon"></i><a href="/admin/dashboard">主页</a></li>
    <li><a>权限管理</a></li>
    <li>列表</li>
@endsection

@section('content')
    <div class="pull-left">
        <a class="btn btn-primary btn-xs" href="{{ route('admin.auth.permission.create') }}">添加权限</a>
    </div>
    <table id="example" class="table table-striped table-bordered table-hover" cellspacing="0" width="100%">
        <thead>
        <tr>
            <th>ID</th>
            <th>名称</th>
            <th>显示名</th>
            <th>描述</th>
            <th>创建时间</th>
            <th>更新时间</th>
            <th>操作</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($permissions as $item)
            <tr>
                <th>{{ $item->id }}</th>
                <th>{{ $item->name }}</th>
                <th>{{ $item->display_name }}</th>
                <th>{{ $item->description }}</th>
                <th>{{ $item->created_at }}</th>
                <th>{{ $item->updated_at }}</th>
                <th>
                    <div class="hidden-sm hidden-xs action-buttons">
                        <a class="green" href="{{ route('admin.auth.permission.edit', $item->id) }}">
                            <i class="ace-icon fa fa-pencil bigger-130"></i>编辑
                        </a>
                    </div>
                </th>
            </tr>
        @endforeach
        </tbody>
    </table>
    {!! $permissions->render() !!}
@endsection

