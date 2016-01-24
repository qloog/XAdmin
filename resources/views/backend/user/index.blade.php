@extends('backend.layouts.master')

@section('title', '用户管理')

@section('scripts')
    <script type="text/javascript">
        var _token = "{{ csrf_token() }}";
    </script>
    <script type="text/javascript" src="/static/bundle.js" charset="utf-8"></script>
    <!--<script src="{{ asset('js/backend/build/user.js') }}"></script>-->
@endsection
