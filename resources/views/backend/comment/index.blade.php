@extends('backend.layouts.master')

@section('title', '评论管理')

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

    <table id="example" class="table table-striped table-bordered table-hover" cellspacing="0" width="100%">
        <thead>
            <tr>
                <th>ID</th>
                <th>类型</th>
                <th>关联内容标题</th>
                <th>评论内容</th>
                <th>评论人</th>
                <th>IP</th>
                <th>创建时间</th>
                <th>更新时间</th>
                <th>操作</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $item)
            <tr>
                <th>{{ $item->id }}</th>
                <th>{{ $item->type }}</th>
                <th>{{ get_relation_title($item->type, $item->relation_id) }}</th>
                <th>{{ $item->content }}</th>
                <th>{{ $item->user['username'] }}</th>
                <th>{{ $item->ip }}</th>
                <th>{{ $item->created_at }}</th>
                <th>{{ $item->updated_at }}</th>
                <th>
                    <div class="hidden-sm hidden-xs action-buttons">
                        <a class="orange" href="{{ url('admin/comment/'.$item->id.'/edit') }}">
                            <i class="ace-icon fa fa-ban bigger"></i>屏蔽
                        </a>
                        <a class="info" href="{{ url('admin/comment/'.$item->id.'/edit') }}">
                            <i class="ace-icon fa fa-reply bigger"></i>回复
                        </a>
                        <a class="red" href="{{ url('admin/comment/'.$item->id.'/edit') }}">
                            <i class="ace-icon fa fa-trash-o bigger"></i>删除
                        </a>
                    </div>
                </th>
            </tr>
            @endforeach
        </tbody>
    </table>
    {!! $data->render() !!}

@endsection
