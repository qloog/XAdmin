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

<body class="login-layout">
        <div class="main-container">
        			<div class="main-content">
        				<div class="row">
        					<div class="col-sm-10 col-sm-offset-1">
        						<div class="login-container">
        							<div class="center">
        								<h1>
        									<i class="ace-icon fa fa-leaf green"></i>
        									<span class="red">Ace</span>
        									<span class="white" id="id-text2">Application</span>
        								</h1>
        								<h4 class="blue" id="id-company-text">&copy; Company Name</h4>
        							</div>

        							<div class="space-6"></div>

        							<div class="position-relative">
        								<div id="login-box" class="login-box visible widget-box no-border">
        									<div class="widget-body">
        										<div class="widget-main">
        											<h4 class="header blue lighter bigger">
        												<i class="ace-icon fa fa-coffee green"></i>
        												Please Enter Your Information
        											</h4>

        											<div class="space-6"></div>
													@if (count($errors) > 0)
														<div class="alert alert-danger">
															<strong>哎哟!</strong> 你输入的貌似有些问题.<br><br>
															<ul>
																@foreach ($errors->all() as $error)
																	<li>{{ $error }}</li>
																@endforeach
															</ul>
														</div>
													@endif
        											<form method="POST" action="{{ url('/admin/login') }}">
        											<input type="hidden" name="_token" value="{{ csrf_token() }}">
        												<fieldset>
        													<label class="block clearfix">
        														<span class="block input-icon input-icon-right">
        															<input type="email" class="form-control" name="email" placeholder="邮箱" />
        															<i class="ace-icon fa fa-user"></i>
        														</span>
        													</label>
        													<label class="block clearfix">
        														<span class="block input-icon input-icon-right">
        															<input type="password" class="form-control" name="password" placeholder="密码" />
        															<i class="ace-icon fa fa-lock"></i>
        														</span>
        													</label>
															<label class="block clearfix">
        														<span class="block input-icon input-icon-right">
        															<input type="text" class="" name="captcha" style="width: 100px;"/> &nbsp;&nbsp; {!! captcha_img() !!}
        														</span>
															</label>
        													<div class="space"></div>
        													<div class="clearfix">
        														<label class="inline">
        															<input type="checkbox" class="ace" name="remember"/>
        															<span class="lbl"> 记住我</span>
        														</label>
        														<button type="submit" class="width-35 pull-right btn btn-sm btn-primary">
        															<i class="ace-icon fa fa-key"></i>
        															<span class="bigger-110">登录</span>
        														</button>
        													</div>
        													<div class="space-4"></div>
        												</fieldset>
        											</form>

        											{{--<div class="social-or-login center">--}}
        												{{--<span class="bigger-110">Or Login Using</span>--}}
        											{{--</div>--}}

        											{{--<div class="space-6"></div>--}}

        											{{--<div class="social-login center">--}}
        												{{--<a class="btn btn-primary">--}}
        													{{--<i class="ace-icon fa fa-facebook"></i>--}}
        												{{--</a>--}}

        												{{--<a class="btn btn-info">--}}
        													{{--<i class="ace-icon fa fa-twitter"></i>--}}
        												{{--</a>--}}

        												{{--<a class="btn btn-danger">--}}
        													{{--<i class="ace-icon fa fa-google-plus"></i>--}}
        												{{--</a>--}}
        											{{--</div>--}}
        										</div><!-- /.widget-main -->

        										{{--<div class="toolbar clearfix">--}}
        											{{--<div>--}}
        												{{--<a href="#" data-target="#forgot-box" class="forgot-password-link">--}}
        													{{--<i class="ace-icon fa fa-arrow-left"></i>--}}
        													{{--I forgot my password--}}
        												{{--</a>--}}
        											{{--</div>--}}

        											{{--<div>--}}
        												{{--<a href="#" data-target="#signup-box" class="user-signup-link">--}}
        													{{--I want to register--}}
        													{{--<i class="ace-icon fa fa-arrow-right"></i>--}}
        												{{--</a>--}}
        											{{--</div>--}}
        										{{--</div>--}}
        									</div><!-- /.widget-body -->
        								</div><!-- /.login-box -->

        								<div id="forgot-box" class="forgot-box widget-box no-border">
        									<div class="widget-body">
        										<div class="widget-main">
        											<h4 class="header red lighter bigger">
        												<i class="ace-icon fa fa-key"></i>
        												Retrieve Password
        											</h4>

        											<div class="space-6"></div>
        											<p>
        												Enter your email and to receive instructions
        											</p>

        											<form>
        												<fieldset>
        													<label class="block clearfix">
        														<span class="block input-icon input-icon-right">
        															<input type="email" class="form-control" placeholder="Email" />
        															<i class="ace-icon fa fa-envelope"></i>
        														</span>
        													</label>

        													<div class="clearfix">
        														<button type="button" class="width-35 pull-right btn btn-sm btn-danger">
        															<i class="ace-icon fa fa-lightbulb-o"></i>
        															<span class="bigger-110">Send Me!</span>
        														</button>
        													</div>
        												</fieldset>
        											</form>
        										</div><!-- /.widget-main -->

        										<div class="toolbar center">
        											<a href="#" data-target="#login-box" class="back-to-login-link">
        												Back to login
        												<i class="ace-icon fa fa-arrow-right"></i>
        											</a>
        										</div>
        									</div><!-- /.widget-body -->
        								</div><!-- /.forgot-box -->

        								<div id="signup-box" class="signup-box widget-box no-border">
        									<div class="widget-body">
        										<div class="widget-main">
        											<h4 class="header green lighter bigger">
        												<i class="ace-icon fa fa-users blue"></i>
        												New User Registration
        											</h4>

        											<div class="space-6"></div>
        											<p> Enter your details to begin: </p>

        											<form>
        												<fieldset>
        													<label class="block clearfix">
        														<span class="block input-icon input-icon-right">
        															<input type="email" class="form-control" placeholder="Email" />
        															<i class="ace-icon fa fa-envelope"></i>
        														</span>
        													</label>

        													<label class="block clearfix">
        														<span class="block input-icon input-icon-right">
        															<input type="text" class="form-control" placeholder="Username" />
        															<i class="ace-icon fa fa-user"></i>
        														</span>
        													</label>

        													<label class="block clearfix">
        														<span class="block input-icon input-icon-right">
        															<input type="password" class="form-control" placeholder="Password" />
        															<i class="ace-icon fa fa-lock"></i>
        														</span>
        													</label>

        													<label class="block clearfix">
        														<span class="block input-icon input-icon-right">
        															<input type="password" class="form-control" placeholder="Repeat password" />
        															<i class="ace-icon fa fa-retweet"></i>
        														</span>
        													</label>

        													<label class="block">
        														<input type="checkbox" class="ace" />
        														<span class="lbl">
        															I accept the
        															<a href="#">User Agreement</a>
        														</span>
        													</label>

        													<div class="space-24"></div>

        													<div class="clearfix">
        														<button type="reset" class="width-30 pull-left btn btn-sm">
        															<i class="ace-icon fa fa-refresh"></i>
        															<span class="bigger-110">Reset</span>
        														</button>

        														<button type="button" class="width-65 pull-right btn btn-sm btn-success">
        															<span class="bigger-110">Register</span>

        															<i class="ace-icon fa fa-arrow-right icon-on-right"></i>
        														</button>
        													</div>
        												</fieldset>
        											</form>
        										</div>

        										<div class="toolbar center">
        											<a href="#" data-target="#login-box" class="back-to-login-link">
        												<i class="ace-icon fa fa-arrow-left"></i>
        												Back to login
        											</a>
        										</div>
        									</div><!-- /.widget-body -->
        								</div><!-- /.signup-box -->
        							</div><!-- /.position-relative -->

        							<div class="navbar-fixed-top align-right">
        								<br />
        								&nbsp;
        								<a id="btn-login-dark" href="#">Dark</a>
        								&nbsp;
        								<span class="blue">/</span>
        								&nbsp;
        								<a id="btn-login-blur" href="#">Blur</a>
        								&nbsp;
        								<span class="blue">/</span>
        								&nbsp;
        								<a id="btn-login-light" href="#">Light</a>
        								&nbsp; &nbsp; &nbsp;
        							</div>
        						</div>
        					</div><!-- /.col -->
        				</div><!-- /.row -->
        			</div><!-- /.main-content -->
        		</div><!-- /.main-container -->

        		<!-- basic scripts -->
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
    <script type="text/javascript">
        jQuery(function($) {
         $(document).on('click', '.toolbar a[data-target]', function(e) {
            e.preventDefault();
            var target = $(this).data('target');
            $('.widget-box.visible').removeClass('visible');//hide others
            $(target).addClass('visible');//show target
         });
        });



        //you don't need this, just used for changing background
        jQuery(function($) {
         $('#btn-login-dark').on('click', function(e) {
            $('body').attr('class', 'login-layout');
            $('#id-text2').attr('class', 'white');
            $('#id-company-text').attr('class', 'blue');

            e.preventDefault();
         });
         $('#btn-login-light').on('click', function(e) {
            $('body').attr('class', 'login-layout light-login');
            $('#id-text2').attr('class', 'grey');
            $('#id-company-text').attr('class', 'blue');

            e.preventDefault();
         });
         $('#btn-login-blur').on('click', function(e) {
            $('body').attr('class', 'login-layout blur-login');
            $('#id-text2').attr('class', 'white');
            $('#id-company-text').attr('class', 'light-blue');

            e.preventDefault();
         });

        });
    </script>

</body>
</html>
