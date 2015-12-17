@extends('backend.layouts.master')

@section('title', '新建用户')

@section('breadcrumb')
    <li>
        <i class="ace-icon fa fa-home home-icon"></i>
        <a href="/admin/dashboard">主页</a>
    </li>
    <li>
        <a>用户管理</a>
    </li>
    <li>
        新建用户
    </li>
@endsection

@section('content')
    <div class="row">
        <div class="col-xs-12">
            <!-- PAGE CONTENT BEGINS -->
            {!! Form::open(['route' => ['admin.auth.user.update-password', $user->id], 'class' => 'form-horizontal', 'role' => 'form', 'method' => 'post']) !!}

            {{--<div class="form-group">--}}
                {{--{!! Form::label('old_password', '旧密码', ['class' => 'col-lg-2 control-label']) !!}--}}
                {{--<div class="col-lg-3">--}}
                    {{--{!! Form::text('old_password', null, ['class' => 'form-control', 'placeholder' => '']) !!}--}}
                {{--</div>--}}
            {{--</div><!--form control-->--}}

            <div class="form-group">
                {!! Form::label('password', '新密码', ['class' => 'col-lg-2 control-label']) !!}
                <div class="col-lg-3">
                    {!! Form::text('password', null, ['class' => 'form-control', 'placeholder' => '']) !!}
                </div>
            </div><!--form control-->

            {{--<div class="form-group">--}}
                {{--{!! Form::label('confirm_password', '确认密码', ['class' => 'col-lg-2 control-label']) !!}--}}
                {{--<div class="col-lg-3">--}}
                    {{--{!! Form::text('confirm_password', null, ['class' => 'form-control', 'placeholder' => '']) !!}--}}
                {{--</div>--}}
            {{--</div><!--form control-->--}}

            <div class="well">
                <div class="text-center">
                    <a href="{{route('admin.auth.user.index')}}" class="btn btn-danger btn-xs">{{ trans('strings.cancel_button') }}</a>
                    <input type="submit" class="btn btn-success btn-xs" value="{{ trans('strings.save_button') }}" />
                </div>
                <div class="clearfix"></div>
            </div><!--well-->
            {!! Form::close() !!}
        </div>
    </div>
@endsection

