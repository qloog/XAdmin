@extends('backend.layouts.master')

@section('title', '新闻管理')

@section('breadcrumb')
        <li>
            <i class="ace-icon fa fa-home home-icon"></i>
            <a href="/admin/dashboard">主页</a>
        </li>
        <li>
            <a>新闻管理</a>
        </li>
        <li>
            列表
        </li>
@endsection

@section('content')

    <div class="row">
        <div class="col-xs-12">

            <div class="box box-success">
                <div class="box-header">
                    <h3 class="box-title">
                        <a href="/admin/event/create" class="btn btn-sm btn-success"><i class="fa fa-plus"></i>添加活动</a>
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
                            <th>ID</th>
                            <th>标题</th>
                            <th>开始时间</th>
                            <th>结束时间</th>
                            <th>浏览量</th>
                            <th>创建时间</th>
                            <th>更新时间</th>
                            {{--<th>发布人</th>--}}
                            <th>操作</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($events as $item)
                            <tr>
                                <th>{{ $item->id }}</th>
                                <th>{{ $item->title }}</th>
                                <th>{{ $item->begin_time }}</th>
                                <th>{{ $item->end_time }}</th>
                                <th>{{ $item->user_count }}</th>
                                <th>{{ $item->created_at }}</th>
                                <th>{{ $item->updated_at }}</th>
                                {{--<th>{{ $item->user['username'] }}</th>--}}
                                <th>
                                    <div class="hidden-sm hidden-xs action-buttons">
                                        <a class="green" href="{{ url('admin/event/'.$item->id.'/edit') }}">
                                            <i class="fa fa-edit text-green"></i>
                                        </a>
                                    </div>
                                </th>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- /.box-body -->

                <div class="box-footer">
                    <div class="pull-right">
                        {!! $events->render() !!}
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

