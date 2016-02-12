@extends('backend.layouts.master')

@section('title', '权限管理')

@section('scripts')
    <script type="text/javascript">
        var _token = "{{ csrf_token() }}";
    </script>
    <script src="{{ asset('js/backend/build/permission.js') }}"></script>
@endsection

