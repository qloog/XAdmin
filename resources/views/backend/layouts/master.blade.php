<!DOCTYPE html>
<html lang="en">
    <head>
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
        <title>管理后台 - @yield('title')</title>
        <meta name="keywords" content="@yield('keywords')">
        <meta name="description" content="@yield('description')">

        <!-- bootstrap & fontawesome -->
        <link href="{{ asset('css/bootstrap.min.css?v=3.4.0') }}" rel="stylesheet">
        <link href="{{ asset('font-awesome/css/font-awesome.css?v=4.3.0') }}" rel="stylesheet">

        <!-- page specific plugin styles -->
        <link rel="stylesheet" href="{{ asset('css/jquery-ui.custom.min.css') }}" />
        @yield('style')

        <!-- text fonts -->
        {{--<link rel="stylesheet" href="//fonts.googleapis.com/css?family=Open+Sans:400,300" />--}}

        <!-- ace styles -->
        <link rel="stylesheet" href="{{ asset('css/ace.min.css') }}" class="ace-main-stylesheet" id="main-ace-style" />

        <!--[if lte IE 9]>
            <link rel="stylesheet" href="{{ asset('css/ace-part2.min.css') }}" class="ace-main-stylesheet" />
        <![endif]-->

        <!--[if lte IE 9]>
          <link href="{{ asset('css/ace-ie.min.css') }}" rel="stylesheet">
        <![endif]-->

        <!-- inline styles related to this page -->

        <!-- ace settings handler -->
        <script src="{{ asset('js/ace-extra.min.js') }}"></script>

        <!-- HTML5shiv and Respond.js for IE8 to support HTML5 elements and media queries -->

        <!--[if lte IE 8]>
        <script src="{{ asset('js/html5shiv.min.js') }}"></script>
        <script src="{{ asset('js/respond.min.js') }}"></script>
        <![endif]-->
</head>

<body class="no-skin">
        @include('backend.includes.nav')

        <div class="main-container" id="main-container">
            <script type="text/javascript">
                try{ace.settings.check('main-container' , 'fixed')}catch(e){}
            </script>

            @include('backend.includes.sidebar')

            <div class="main-content">
                <div class="main-content-inner">
                    <div class="breadcrumbs" id="breadcrumbs">
                        <script type="text/javascript">
                            try{ace.settings.check('breadcrumbs' , 'fixed')}catch(e){}
                        </script>

                        <ul class="breadcrumb">
                            @yield('breadcrumb')
                        </ul><!-- /.breadcrumb -->

                        {{--<div class="nav-search" id="nav-search">--}}
                            {{--<form class="form-search">--}}
                                {{--<span class="input-icon">--}}
                                    {{--<input type="text" placeholder="Search ..." class="nav-search-input" id="nav-search-input" autocomplete="off">--}}
                                    {{--<i class="ace-icon fa fa-search nav-search-icon"></i>--}}
                                {{--</span>--}}
                            {{--</form>--}}
                        {{--</div><!-- /.nav-search -->--}}
                    </div>

                    <div class="page-content">
                        {{--@include('backend.includes.setting_box')--}}

                        {{--<div class="page-header">--}}
                            {{--<h1>--}}
                                {{--UI Elements--}}
                                {{--<small>--}}
                                    {{--<i class="ace-icon fa fa-angle-double-right"></i>--}}
                                    {{--Common UI Features &amp; Elements--}}
                                {{--</small>--}}
                            {{--</h1>--}}
                        {{--</div><!-- /.page-header -->--}}

                        <!-- example:  row begin -->
                        @yield('content')
                    </div><!-- /.page-content -->
                </div>
            </div><!-- /.main-content -->

            @include('backend.includes.footer')

            <a href="#" id="btn-scroll-up" class="btn-scroll-up btn btn-sm btn-inverse">
                <i class="ace-icon fa fa-angle-double-up icon-only bigger-110"></i>
            </a>
        </div><!-- /.main-container -->

    <!-- basic scripts -->
    <script src="{{ asset('js/jquery-2.1.1.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js?v=3.4.0') }}"></script>
    <!--[if IE]>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <![endif]-->

    <!-- page specific plugin scripts -->
    <script src="{{ asset('js/jquery-ui.custom.min.js') }}"></script>

    <!-- ace scripts -->
    <script src="{{ asset('js/ace-elements.min.js') }}"></script>
    <script src="{{ asset('js/ace.min.js') }}"></script>

    <!-- inline scripts related to this page -->
    @yield('script')
</body>
</html>
