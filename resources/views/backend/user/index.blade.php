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
    <table id="example" class="table table-striped table-hover" cellspacing="0" width="100%">
        <thead>
            <tr>
                <th>ID</th>
                <th>用户名</th>
                <th>姓名</th>
                <th>Email</th>
                <th>创建时间</th>
                <th>更新时间</th>
                <th>状态</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
            <tr>
                <th>{{ $user->id }}</th>
                <th>{{ $user->username }}</th>
                <th>{{ $user->realname }}</th>
                <th>{{ $user->email }}</th>
                <th>{{ $user->created_at }}</th>
                <th>{{ $user->updated_at }}</th>
                <th>{{ $user->status }}</th>
            </tr>
            @endforeach
        </tbody>
    </table>
    {!! $users->render() !!}
@endsection

