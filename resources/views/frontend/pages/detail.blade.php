@extends('frontend.layouts.master')

@section('content')
    <div id="main-blog">
    		<div class="container padding-top">
    			<div class="row section-title text-center">
    				<div class="col-sm-8 col-sm-offset-2">
    					<h1>青龙古镇</h1>
    					<p>青龙古镇位于山西省阳曲县与尖草坪区相邻的侯村乡，该村紧傍208国道、北同铺铁路和大运高速公路，交通极为便利。全村总面积235万平方米，其中耕地面积3500亩，户数500户，人口1400人。</p>
    				</div>
    			</div>
    			<div class="row">
    				<div id="content" class="full-width site-content col-md-12">
    					<div class="post">
    						{{--<div class="entry-header">--}}
    							{{--<div class="entry-thumbnail">--}}
    								{{--<img class="img-responsive" src="images/blog/post1.jpg" alt="">--}}
    							{{--</div>--}}
    						{{--</div>--}}
    						<div class="post-content">
    							{{--<h2 class="entry-title">--}}
    								{{--<a href="blog-detail.html">Exercitation photo booth stumptown</a>--}}
    							{{--</h2>--}}
    							{{--<div class="entry-meta">--}}
    								{{--<ul>--}}
    									{{--<li class="author"><i class="fa fa-user"></i><a href="#">Admin</a></li>--}}
    									{{--<li class="publish-date"><i class="fa fa-calendar"></i><a href="#">24 Feb 2015</a></li>--}}
    									{{--<li class="tag"><i class="fa fa-tags"></i><a href="#">Business</a></li>--}}
    									{{--<li class="comments"><i class="fa fa-comments-o"></i><a href="#">9 Comments</a></li>--}}
    								{{--</ul>--}}
    							{{--</div>--}}
    							<div class="entry-summary">
                                    {!! $page->content !!}
    							</div>
    						</div>
    					</div><!--/post-->
    				</div>
    			</div>
    		</div>
    	</div>
	<!--/#main-blog-->
@endsection