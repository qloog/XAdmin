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
    <div class="well">
        @include('backend.user.search')
    </div>
    <div class="pull-left">
        <a class="btn btn-primary btn-xs" href="{{ route('admin.auth.user.create') }}">添加用户</a>
    </div>
    <table id="example" class="table table-striped table-bordered table-hover" cellspacing="0" width="100%">
        <thead>
            <tr>
                <th>{{ trans('crud.users.id') }}</th>
                <th>{{ trans('crud.users.username') }}</th>
                <th>{{ trans('crud.users.roles') }}</th>
                <th>{{ trans('crud.users.email') }}</th>
                <th>{{ trans('crud.users.created') }}</th>
                <th>{{ trans('crud.users.updated') }}</th>
                <th>状态</th>
                <th>{{ trans('crud.actions') }}</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
            <tr>
                <td>{{ $user->id }}</td>
                <td>{{ $user->username }}</td>
                <td>
                    @if ($user->roles()->count() > 0)
                        @foreach ($user->roles as $role)
                            {!! $role->role_name !!}【{!! $role->role_slug !!}】<br/>
                        @endforeach
                    @else
                        None
                    @endif
                </td>
                <td>{{ $user->email }}</td>
                <td>{{ $user->created_at }}</td>
                <td>{{ $user->updated_at }}</td>
                <td>{{ $user->status }}</td>
                <td>
                    <div class="hidden-sm hidden-xs action-buttons">
                        <a class="green" href="{{ route('admin.auth.user.edit', [$user->id]) }}">
                            <i class="ace-icon fa fa-pencil bigger-130"></i>编辑
                        </a>
                        <!--<a class="red" href="#">
                            <i class="ace-icon fa fa-trash-o bigger-130"></i>
                        </a>-->
                    </div>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <div class="pull-left">
        {!! $users->total() !!} {{ trans('crud.users.total') }}
    </div>

    <div class="pull-right">
        {!! $users->render() !!}
    </div>

    <div class="clearfix"></div>
@endsection

