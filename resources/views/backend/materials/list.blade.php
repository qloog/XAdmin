@extends('backend.layouts.master')

@section('title', '素材管理')

@section('breadcrumb')
        <li>
            <i class="ace-icon fa fa-home home-icon"></i>
            <a href="/admin/dashboard">主页</a>
        </li>
        <li>
            <a>素材管理</a>
        </li>
        <li>
            <a>单图文</a>
        </li>
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            <button class="btn btn-lg btn-default">
            <i class="ace-icon fa fa-pencil align-top bigger-125"></i>
            <a href="{{ url('/admin/materials/single/create') }}"> 单图文添加</a>
            </button>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">

        </div>
    </div>
@endsection

