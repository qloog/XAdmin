@extends('backend.layouts.master')

@section('title', '新闻分类管理')

@section('breadcrumb')
        <li>
            <i class="ace-icon fa fa-home home-icon"></i>
            <a href="/admin/dashboard">主页</a>
        </li>
        <li>
            <a>新闻分类管理</a>
        </li>
        <li>
            列表
        </li>
@endsection

@section('content')
    <div class="rows">
        <div class="col-md-8">
            <div class="pull-left">
                <a class="btn btn-primary btn-xs" href="{{ route('admin.news.category.create') }}">添加分类</a>
            </div>
            <table id="example" class="table table-striped table-bordered table-hover" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>分类名称</th>
                        <th>上级分类</th>
                        <th>创建时间</th>
                        <th>更新时间</th>
                        <th>操作</th>
                    </tr>
                </thead>
                <tbody>
                    @inject('cate', 'App\Services\CategoryService')
                    @foreach ($categories as $item)
                    <tr>
                        <th>{{ $item->id }}</th>
                        <th>{{ $item->name }}</th>
                        <th>
                        @if ($item->pid === 0)
                            <span class="red">顶级分类</span>
                        @else
                            @foreach($cate::getParents($selectCategory, $item->pid) as $key => $v)
                                {{ $v['name']  . " >" }}
                            @endforeach
                        @endif
                        </th>
                        <th>{{ $item->created_at }}</th>
                        <th>{{ $item->updated_at }}</th>
                        <th>
                            <div class="hidden-sm hidden-xs action-buttons">
                                <a class="green" href="{{ url('admin/news/category/'.$item->id.'/edit') }}">
                                    <i class="ace-icon fa fa-pencil bigger-130"></i>
                                </a>
                            </div>
                        </th>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            {!! $categories->render() !!}
        </div>
    </div>
@endsection

