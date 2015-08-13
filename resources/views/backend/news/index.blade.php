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
    <table id="example" class="table table-striped table-bordered table-hover" cellspacing="0" width="100%">
        <thead>
            <tr>
                <th>ID</th>
                <th>标题</th>
                <th>所属分类</th>
                <th>浏览量</th>
                <th>创建时间</th>
                <th>更新时间</th>
                <th>状态</th>
                <th>发布人</th>
                <th>操作</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($news as $item)
            <tr>
                <th>{{ $item->id }}</th>
                <th>{{ $item->title }}</th>
                <th>{{ $item->category['name'] }}</th>
                <th>{{ $item->views }}</th>
                <th>{{ $item->created_at }}</th>
                <th>{{ $item->updated_at }}</th>
                <th>{{ $item->status }}</th>
                <th>{{ $item->user['username'] }}</th>
                <th>
                    <div class="hidden-sm hidden-xs action-buttons">
                        <a class="green" href="{{ url('admin/news/'.$item->id.'/edit') }}">
                            <i class="ace-icon fa fa-pencil bigger-130"></i>
                        </a>
                    </div>
                </th>
            </tr>
            @endforeach
        </tbody>
    </table>
    {!! $news->render() !!}
@endsection

