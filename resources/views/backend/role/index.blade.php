@extends('backend.layouts.master')

@section('title', '用户管理')

@section('breadcrumb')
    <li>
        <i class="ace-icon fa fa-home home-icon"></i>
        <a href="/admin/dashboard">主页</a>
    </li>
    <li>
        <a>用户管理</a>
    </li>
    <li>
        角色列表
    </li>
@endsection

@section('content')
    <div class="pull-left">
        <a class="btn btn-primary btn-xs" href="{{ route('admin.auth.role.create') }}">添加角色</a>
    </div>
    <table id="example" class="table table-striped table-bordered table-hover" cellspacing="0" width="100%">
        <thead>
        <tr>
            <th>ID</th>
            <th>角色名</th>
            <th>角色slug</th>
            <th>拥有的权限</th>
            <th>创建时间</th>
            <th>更新时间</th>
            <th>操作</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($roles as $item)
            <tr>
                <th>{{ $item->id }}</th>
                <th>{{ $item->name }}</th>
                <th>{{ $item->display_name }}</th>
                <th>
                    @foreach($item->perms as $permission)
                        {{ $permission->display_name }}<br>
                    @endforeach
                </th>
                <th>{{ $item->created_at }}</th>
                <th>{{ $item->updated_at }}</th>
                <th>
                    <div class="hidden-sm hidden-xs action-buttons">
                        <a class="green" href="{{ route('admin.auth.role.edit', [$item->id]) }}">
                            <i class="ace-icon fa fa-pencil bigger-130"></i>编辑
                        </a>
                    </div>
                </th>
            </tr>
        @endforeach
        </tbody>
    </table>
    {!! $roles->render() !!}
@endsection

