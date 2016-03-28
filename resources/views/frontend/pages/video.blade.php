@extends('frontend.layouts.master')

@section('content')

    <div id="main-blog">
		<div class="container padding-top">
			<div class="row section-title text-center">
				<div class="col-sm-8 col-sm-offset-2">
					<h1>青龙古镇</h1>
					<p>青龙古镇距今已有千年的历史，当时古镇店铺林立，好一派繁荣的场景，如今，青龙古镇在原有的地貌上经过重建和返修，古镇焕然一新，又现当年风采。 --此片拍摄于2014国庆</p>
				</div>
			</div>
			<div class="row">
				<div id="content" class="full-width site-content col-md-12">
					<div class="post">
						<div class="entry-header">
							<div class="entry-thumbnail">
								<div class="entry-video embed-responsiv">
									<iframe class="embed-responsive-item" src="http://player.youku.com/player.php/sid/XODI5MzAyMjAw/v.swf" height="500"></iframe>
								</div>
							</div>
						</div>
						{{--<div class="post-content">--}}
							{{--<h2 class="entry-title">--}}
								{{--<a href="blog-detail.html">Facilisis at vero eros et accumsan</a>--}}
							{{--</h2>--}}
							{{--<div class="entry-meta">--}}
								{{--<ul>--}}
									{{--<li class="author"><i class="fa fa-user"></i><a href="#">Admin</a></li>--}}
									{{--<li class="publish-date"><i class="fa fa-calendar"></i><a href="#">21 Feb 2015</a></li>--}}
									{{--<li class="tag"><i class="fa fa-tags"></i><a href="#">Marketing</a></li>--}}
									{{--<li class="comments"><i class="fa fa-comments-o"></i><a href="#">7 Comments</a></li>--}}
								{{--</ul>--}}
							{{--</div>--}}
							{{--<div class="entry-summary">--}}
								{{--<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie</p>--}}
							{{--</div>--}}
						{{--</div>--}}
					</div><!--/post-->
				</div>
			</div>

		</div>
	</div>

@endsection