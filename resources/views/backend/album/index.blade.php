@extends('backend.layouts.master')

@section('title', '相册管理')

@section('breadcrumb')
        <li><i class="ace-icon fa fa-home home-icon"></i><a href="/admin/dashboard">主页</a></li>
        <li>相册管理</li>
        <li>列表</li>
@endsection

@section('content')
    <div class="well">
        {{--@include('backend.album.search')--}}
    </div>
    <div class="pull-left">
        <a class="btn btn-primary btn-xs" href="{{ route('admin.album.create') }}">添加相册</a>
    </div>
    <table id="example" class="table table-striped table-bordered table-hover" cellspacing="0" width="100%">
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
                <td><img src="{{ $album->cover_image }}" /></td>
                <td>{{ $album->name }}</td>
                <td>{{ $album->photo_count }}</td>
                <td>{{ $album->description }}</td>
                <td>{{ $album->created_at }}</td>
                <td>{{ $album->updated_at }}</td>
                <td>
                    <div class="hidden-sm hidden-xs action-buttons">
                        <a class="green" href="{{ route('admin.album.edit', [$album->id]) }}">
                            <i class="ace-icon fa fa-pencil bigger-130"></i>编辑
                        </a>
                        <a class="blue" href="{{ url('admin/album/'.$album->id.'/photos') }}">
                            <i class="ace-icon fa fa-upload bigger-130" aria-hidden="true"></i>上传图片
                        </a>
                    </div>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <div class="pull-left">
        {!! $albums->total() !!} {{ trans('crud.users.total') }}
    </div>

    <div class="pull-right">
        {!! $albums->render() !!}
    </div>

    <div class="clearfix"></div>
@endsection

