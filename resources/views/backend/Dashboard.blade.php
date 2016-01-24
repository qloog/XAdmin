@extends('backend.layouts.master')

@section('title', '管理首页 - 后台')

@section('styles')
    <link href="{{ asset('/css/react-datagrid.css') }}" rel="stylesheet">
    <link href="{{ asset('/css/dashboard.css') }}" rel="stylesheet">
@stop

@section('scripts')
    <script src="{{ asset('/js/backend/build/dashboard.js') }}"></script>

@endsection

