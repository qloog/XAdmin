@extends('backend.layouts.master')

@section('title', '角色管理')


@section('scripts')
    <script type="text/javascript">
        var _token = "{{ csrf_token() }}";
    </script>
    <script src="{{ asset('js/backend/build/role.js') }}"></script>
@endsection

