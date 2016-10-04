@extends('backend.layouts.master')

@section('title', '用户管理')

@section('styles')
    <!-- DataTables -->
    <link rel="stylesheet" href="{{ asset('plugins/datatables/dataTables.bootstrap.css') }}">
@endsection

@section('page_title')
    用户管理
@endsection

@section('page_description')
    用户列表
@endsection

@section('breadcrumb')
        <li><a href="/admin/dashboard"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">权限管理</a></li>
        <li class="active">用户管理</li>
@endsection

@section('content')

    <div class="row">
        <div class="col-xs-12">

            <div class="box box-success">
                <div class="box-header">
                    <h3 class="box-title">
                        <a href="/admin/auth/user/create" class="btn btn-sm btn-success"><i class="fa fa-plus"></i>添加用户</a>
                    </h3>
                    <div class="box-tools">
                        <!--
                        <div class="form-inline  pull-right">
                            <form action="" method="get">
                                <fieldset>
                                    <div class="input-group input-group-sm">
                                        <span class="input-group-addon"><strong>Id</strong></span>
                                        <input type="text" class="form-control" placeholder="Id" name="id" value="">
                                    </div>
                                    <div class="input-group input-group-sm">
                                        <span class="input-group-addon"><strong>用户名</strong></span>
                                        <input type="text" class="form-control" placeholder="用户名" name="name" value="">
                                    </div>
                                    <div class="input-group input-group-sm">
                                        <span class="input-group-addon"><strong>邮箱</strong></span>
                                        <input type="text" class="form-control" placeholder="邮箱" name="email" value="">
                                    </div>
                                    <div class="input-group input-group-sm">
                                        <div class="input-group-btn">
                                            <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i></button>
                                        </div>
                                    </div>
                                </fieldset>
                            </form>
                        </div>
                        -->

                    </div>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <table id="user-table" class="table table-striped table-hover">
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
                                            <span class="badge bg-yellow">{!! $role->name !!}</span>
                                        @endforeach
                                    @else
                                        --
                                    @endif
                                </td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->created_at }}</td>
                                <td>{{ $user->updated_at }}</td>
                                <td><small class="label label-success">{{ $user->status }}</small></td>
                                <td>
                                    <div class="hidden-sm hidden-xs action-buttons">
                                        <a href="{{ route('admin.auth.user.edit', [$user->id]) }}">
                                            <i class="fa fa-edit text-green fa-lg"></i>
                                        </a>
                                        <a href="javascript:;" data-id="{{ $user->id }}" class="_delete">
                                            <i class="fa fa-trash-o text-red fa-lg"></i>
                                        </a>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- /.box-body -->

                <div class="box-footer">
                    <div class="pull-left">
                        {!! $users->total() !!} {{ trans('crud.users.total') }}
                    </div>

                    <div class="pull-right">
                        {!! $users->render() !!}
                    </div>
                </div>
            </div>
            <!-- /.box -->
        </div>
        <!-- /.col -->
    </div>
    <!-- /.row -->

    <div class="clearfix"></div>
@endsection

@section('scripts')
    <!-- DataTables -->
    <script src="{{ asset('plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables/dataTables.bootstrap.min.js') }}"></script>
    <script>
        $(function () {
//            $('#user-table').DataTable({
//                "paging": true,
//                "lengthChange": false,
//                "searching": false,
//                "ordering": true,
//                "info": true,
//                "autoWidth": false
//            });

            $('._delete').click(function() {
                var id = $(this).data('id');
                if(confirm("确认删除?")) {
                    $.post('/admin/auth/user/' + id, {_method:'delete','_token': '{{ csrf_token() }}'}, function(data){
                        window.location.href = '{{ route('admin.auth.user.index') }}';
                    });
                }

            });
        });
    </script>
@endsection

