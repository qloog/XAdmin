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
                <th>用户名</th>
                <th>拥有角色</th>
                <th>Email</th>
                <th>创建时间</th>
                <th>更新时间</th>
                <th>状态</th>
                <th>操作</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
            <tr>
                <th>{{ $user->id }}</th>
                <th>{{ $user->username }}</th>
                <th>
                    @foreach($user->roles as $role)
                        {{ $role->role_title }}({{ $role->role_slug }}) <br>
                    @endforeach
                </th>
                <th>{{ $user->email }}</th>
                <th>{{ $user->created_at }}</th>
                <th>{{ $user->updated_at }}</th>
                <th>{{ $user->status }}</th>
                <th>
                    <div class="hidden-sm hidden-xs action-buttons">
                        <a class="blue" href="#">
                            <i class="ace-icon fa fa-search-plus bigger-130"></i>
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
    {!! $users->render() !!}
@endsection

