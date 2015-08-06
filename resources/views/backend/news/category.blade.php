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
                    @inject('cate', 'App\Services\Category')
                    @foreach ($category as $item)
                    <tr>
                        <th>{{ $item->id }}</th>
                        <th>{{ $item->name }}</th>
                        <th>
                        @if ($item->pid === 0)
                            <span class="red">顶级分类</span>
                        @else
                            @foreach($cate::getParents($selectCategory, $item->pid) as $v)
                                {{ $v['name']  . " >" }}
                            @endforeach
                        @endif
                        </th>
                        <th>{{ $item->created_at }}</th>
                        <th>{{ $item->updated_at }}</th>
                        <th>
                            <div class="hidden-sm hidden-xs action-buttons">
                                <a class="green" href="{{ url('admin/news/1111/edit') }}">
                                    <i class="ace-icon fa fa-pencil bigger-130"></i>
                                </a>
                                <a class="red" href="{{ url('admin/news/111') }}">
                                    <i class="ace-icon fa fa-trash-o bigger-130"></i>
                                </a>
                            </div>
                        </th>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            {!! $category->render() !!}
        </div>
        <div class="col-md-4">
                    <form class="form-horizontal" id="news_form" role="form" method="POST" action="{{ URL::to('admin/news/category') }}">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <div class="form-group">
                            <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> 分类名称 </label>
                            <div class="col-sm-9">
                                <input type="text" name="name" id="form-field-1" placeholder="分类名称" class="col-xs-10 col-sm-5" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> 上级分类 </label>
                            <div class="col-sm-9">
                                <select name="pid">
                                    <option value="0">顶级分类</option>
                                    @foreach ($selectCategory as $item)
                                    <option value="{{ $item['id'] }}">{{ $item['html'] }}{{ $item['name'] }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="clearfix form-actions">
                            <div class="col-md-offset-3 col-md-10">
                                <button class="btn btn-info" type="submit">
                                    <i class="ace-icon fa fa-check bigger-110"></i>
                                    保存
                                </button>

                                &nbsp; &nbsp; &nbsp;
                                <button class="btn" type="reset">
                                    <i class="ace-icon fa fa-undo bigger-110"></i>
                                    重置
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
    </div>
@endsection

