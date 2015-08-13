
<!DOCTYPE html>
<html lang="en">
<head>
	<!-- meta -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
	<!--title-->
    <title>青龙古镇官网</title>
	<!--CSS-->
	<link href="{{ asset('css/bootstrap.min.css?v=3.4.0') }}" rel="stylesheet">
    <link href="{{ asset('font-awesome/css/font-awesome.css?v=4.3.0') }}" rel="stylesheet">
	<link href="{{ asset('css/owl.carousel.css') }}" rel="stylesheet">
    <link href="{{ asset('css/owl.transitions.css') }}" rel="stylesheet">
    <link href="{{ asset('css/prettyPhoto.css') }}" rel="stylesheet">
	<link href="{{ asset('css/main.css') }}" rel="stylesheet">
	<link id="css-preset" href="{{ asset('css/presets/preset5.css') }}" rel="stylesheet">
	<link href="{{ asset('css/responsive.css') }}" rel="stylesheet">
	

    <!--[if lte IE 9]>
    <script src="{{ asset('js/html5shiv.min.js') }}"></script>
    <script src="{{ asset('js/respond.min.js') }}"></script>
    <![endif]-->
</head><!--/head-->
<body>
	<header id="navigation">
        <div class="navbar navbar-static-top" role="banner">
            <div class="container">
				<div class="row header-section">
					<div class="col-sm-3">
						<div class="navbar-header">
							<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
								<span class="sr-only">Toggle navigation</span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
							</button>
							<a class="navbar-brand" href="/">
								<h1><img class="img-responsive" src="images/logo.png" alt="logo"></h1>
							</a>
						</div>
					</div>				
					<div class="col-sm-9">
						<nav class="collapse navbar-collapse navbar-right">					
							<ul class="nav navbar-nav">
								<li @if(Request::is('/')) class="active" @endif><a href="/">首页</a></li>
									{{--<ul class="dropdown-menu" role="menu">--}}
										{{--<li><a href="index2.html">Bootstrap Carousel</a></li>--}}
									{{--</ul>--}}
								<li @if(Request::is('overview')) class="active" @endif><a href="/overview">景区概况</a></li>
								<li @if(Request::is('gallery')) class="active" @endif><a href="/gallery">精美图片</a></li>
								<li @if(Request::is('video')) class="active" @endif><a href="/video">视频介绍</a></li>
								<li @if(Request::is('route')) class="active" @endif><a href="/route">游览路线</a></li>
								{{--<li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown">Contact <span class="caret"></span></a>--}}
									{{--<ul class="dropdown-menu" role="menu">--}}
										{{--<li><a href="contact.html">Contact One</a></li>--}}
										{{--<li><a href="contact2.html">Contact Two</a></li>															--}}
									{{--</ul>--}}
								{{--</li>--}}
							</ul>					
						</nav>
						<div class="topbar-icons">
							<span><i class="fa fa-search"></i></span>
						</div>
						<div class="search">
							<form role="form">
								<input type="text" class="search-form" autocomplete="off" placeholder="Write something and press enter">
								<span class="search-close"><i class="fa fa-times"></i></span>
							</form>
						</div>
					</div>
				</div>
            </div>
        </div>
    </header><!--/#navigation-->

	<div id="main-slider">
        <div class="owl-carousel">
            <div class="item item-one">
                <div class="slider-inner">
                    <div class="container">
                        <div class="row">
                            <div class="col-sm-8">
                                 {{--<div class="carousel-content">--}}
                                    {{--<h2>Welcome To <span>青龙古镇</span></h2>--}}
                                    {{--<p>I throw myself down among the tall grass by the trickling stream; and, as I lie close to the earth, a thousand</p>--}}
                                    {{--<a class="btn btn-primary btn-lg" href="/overview">More Info</a>--}}
                                {{--</div>--}}
                            </div>
                        </div>
                    </div>
                </div>
            </div><!--/.item-->
            <div class="item item-two">
                <div class="slider-inner">
                    <div class="container">
                        <div class="row">
                            <div class="col-sm-8">
                                 {{--<div class="carousel-content">--}}
                                    {{--<h2>景区预览</h2>--}}
                                    {{--<p>I throw myself down among the tall grass by the trickling stream; and, as I lie close to the earth, a thousand</p>--}}
                                    {{--<a class="btn btn-primary btn-lg" href="#">More Info</a>--}}
                                {{--</div>--}}
                            </div>
                        </div>
                    </div>
                </div>
            </div><!--/.item-->
        </div><!--/.owl-carousel-->
    </div><!--/#main-slider-->

    @yield('content')
	
	<!-- footer -->
	<footer id="footer">
		<!-- footer-widget-wrapper -->
		<div class="footer-widget-wrapper">
			<div class="container">
				<div class="row">

					<!-- footer-widget -->				
					<div class="col-md-3 col-sm-6">
						<div class="footer-widget text-widget">
							<a href="index.html" class="footer-logo"></a>
							<p>Suspendisse condimentum mollis vehicula. Praesent sodales interdum elit interdum ornare. Suspendisse tristique semper arcu, non vehicula magna vestibulum nec.</p>
							<ul class="social list-inline">
								<li><a href="#"><i class="fa fa-wechat"></i></a></li>
								<li><a href="#"><i class="fa fa-weibo"></i></a></li>
							</ul>
						</div>
					</div><!-- footer-widget -->

					<!-- footer-widget -->				
					<div class="col-md-3 col-sm-6">
						<div class="footer-widget contact-widget">
							<h1><span>联系</span> 信息</h1>
							<p><i class="fa fa-map-marker"></i><strong>地址: </strong>太原市阳曲县紧邻尖草坪区</p>
							<p><i class="fa fa-phone"></i><strong>电话: <a href="tel:+18610002000">18610002000</a></strong></p>
							<p><i class="fa fa-envelope"></i><strong>邮箱: <a href="mailto:info@qinglongguzhen.com">info@qinglongguzhen.com</a></strong></p>
						</div>
					</div><!-- footer-widget -->

					<!-- footer-widget -->				
					{{--<div class="col-md-3 col-sm-6">--}}
						{{--<div class="footer-widget twitter-widget">--}}
							{{--<h1><span>Twitter</span> Feed</h1>--}}
							{{--<p><i class="fa fa-twitter"></i>about 2 hours ago</p>--}}
							{{--<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin at dolor lectus, vel rhoncus magna.. <a href="#">http://sample.com</a> <a href="#">#sampleuser</a></p>--}}
						{{--</div>--}}
					{{--</div><!-- footer-widget -->--}}

					<!-- footer-widget -->				
					{{--<div class="col-md-3 col-sm-6">--}}
						{{--<div class="footer-widget instagram-widget">--}}
							{{--<h1><span>Instagram</span> Feed</h1>--}}
							{{--<ul class="instagram">--}}
								{{--<li><a href="#"><img class="img-responsive" src="images/others/instagram1.jpg" alt="" /></a></li>--}}
								{{--<li><a href="#"><img class="img-responsive" src="images/others/instagram2.jpg" alt="" /></a></li>--}}
							{{--</ul>--}}
						{{--</div>--}}
					{{--</div><!-- footer-widget -->--}}
				</div>
			</div>
		</div><!-- footer-widget-wrapper -->

		<!-- footer-bottom -->
		<div class="footer-bottom">
			<div class="container">
				<div class="row">				
					<div class="col-sm-6">
						<ul class="footer-menu list-inline">
							<li><a href="/">首页</a></li>
							<li><a href="/overview">景区介绍</a></li>
							<li><a href="/gallery">精美图片</a></li>
							<li><a href="/video">视频介绍</a></li>
						</ul>
					</div>

					<div class="col-sm-6">
						<div class="copy-right text-right">
							<p>&copy; Copyright <strong>Protocol</strong> by <a href="http://themeregion.com">Theme Region</a></p>
						</div>
					</div>
				</div>
			</div>
		</div><!-- footer-bottom -->
	</footer><!--/#footer-->
	
	<!--/#scripts--> 
    <script src="{{ asset('js/jquery-2.1.1.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js?v=3.4.0') }}"></script>
	<script type="text/javascript" src="{{ asset('js/jquery.inview.min.js') }}"></script>
	<script type="text/javascript" src="{{ asset('js/owl.carousel.min.js') }}"></script>
	<script type="text/javascript" src="{{ asset('js/jquery.countTo.js') }}"></script>
	<script type="text/javascript" src="{{ asset('js/jquery.parallax.js') }}"></script>
	<script type="text/javascript" src="{{ asset('js/isotope.pkgd.min.js') }}"></script>
	<script type="text/javascript" src="{{ asset('js/jquery.easypiechart.min.js') }}"></script>
	<script type="text/javascript" src="{{ asset('js/mousescroll.js') }}"></script>
	<script type="text/javascript" src="{{ asset('js/jquery.prettyPhoto.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/main.js') }}"></script>
    @yield('scripts')
</body>
</html>