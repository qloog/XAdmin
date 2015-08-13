@extends('backend.layouts.master')

@section('title', '管理首页 - 后台')

@section('css')
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

@endsection

@section('js')
    <script src="{{ asset('/js/holder.js') }}"></script>
@endsection
