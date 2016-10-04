@extends('backend.layouts.master')

@section('page_title', '相册管理')

@section('breadcrumb')
        <li><i class="ace-icon fa fa-home home-icon"></i><a href="/admin/dashboard">主页</a></li>
        <li>相册管理</li>
        <li>列表</li>
@endsection

@section('content')

    <div class="row">
        <div class="col-xs-12">

            <div class="box box-success">
                <div class="box-header">
                    <h3 class="box-title">
                        <a href="{{ route('admin.album.create') }}" class="btn btn-sm btn-success"><i class="fa fa-plus"></i>添加相册</a>
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
                            <th>id</th>
                            <th>封面</th>
                            <th>名称</th>
                            <th>照片数量</th>
                            <th>描述</th>
                            <th>创建时间</th>
                            <th>更新时间</th>
                            <th>操作</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($albums as $album)
                            <tr>
                                <td>{{ $album->id }}</td>
                                <td><img src="{{ $album->cover_image }}" width="80px"/></td>
                                <td>{{ $album->name }}</td>
                                <td>{{ $album->photo_count }}</td>
                                <td>{{ $album->description }}</td>
                                <td>{{ $album->created_at }}</td>
                                <td>{{ $album->updated_at }}</td>
                                <td>
                                    <div class="hidden-sm hidden-xs action-buttons">
                                        <a class="green" href="{{ route('admin.album.edit', [$album->id]) }}">
                                            <i class="fa fa-edit text-green"></i>编辑
                                        </a>
                                        <a class="blue" href="{{ url('admin/album/'.$album->id.'/photos') }}">
                                            <i class="fa fa-upload text-yellow" aria-hidden="true"></i>上传照片
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
                    <div class="pull-right">
                        {!! $albums->render() !!}
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

