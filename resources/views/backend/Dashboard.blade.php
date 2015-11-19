@extends('backend.layouts.master')

@section('title', '管理首页 - 后台')

@section('styles')
    <link href="{{ asset('/css/react-datagrid.css') }}" rel="stylesheet">
    <link href="{{ asset('/css/dashboard.css') }}" rel="stylesheet">
@stop

@section('breadcrumb')

    <ol class="breadcrumb">
        <li>
            <a href="{{ url('admin/dashboard') }}">主页</a>
        </li>
        <li>
            <a>仪表盘</a>
        </li>
    </ol>
@endsection

@section('content')
    <div id="example"></div>
@endsection

@section('scripts')
    <script src="{{ asset('/js/holder.js') }}"></script>
    <script src="{{ asset('/js/build/userList.js') }}"></script>
    <script>

    </script>
@endsection

