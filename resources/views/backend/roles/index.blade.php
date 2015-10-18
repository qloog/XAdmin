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
        列表
    </li>
@endsection

@section('content')
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
                <th>{{ $item->role_title }}</th>
                <th>{{ $item->role_slug }}</th>
                <th>
                    @foreach($item->permissions as $permission)
                        {{ $permission->permission_title }}({{ $permission->permission_slug }})
                    @endforeach
                </th>
                <th>{{ $item->created_at }}</th>
                <th>{{ $item->updated_at }}</th>
                <th>
                    <div class="hidden-sm hidden-xs action-buttons">
                        <a class="blue" href="#">
                            <i class="ace-icon fa fa-search-plus bigger-130"></i>分配权限
                        </a>
                        <a class="green" href="#">
                            <i class="ace-icon fa fa-pencil bigger-130"></i>
                        </a>
                        <a class="red" href="#">
                            <i class="ace-icon fa fa-trash-o bigger-130"></i>
                        </a>
                    </div>
                </th>
            </tr>
        @endforeach
        </tbody>
    </table>
    {!! $roles->render() !!}
@endsection

