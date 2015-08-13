@extends('frontend.layouts.master')

@section('content')
    <!-- Start Our Services -->
    	{{--<div id="our-services">--}}
    		{{--<div class="container padding-top padding-bottom">--}}
    			{{--<div class="row section-title text-center">--}}
    				{{--<div class="col-sm-8 col-sm-offset-2">--}}
    					{{--<h1><span>Our</span> Services</h1>--}}
    					{{--<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas ac augue at erat hendrerit dictum. Praesent porta, purus eget sagittis imperdiet.</p>--}}
    				{{--</div>--}}
    			{{--</div>--}}
    			{{--<div class="row text-center">--}}
    				{{--<div class="col-sm-6 col-md-3 service">--}}
    					{{--<div class="service-content">--}}
    						{{--<i class="fa fa-desktop"></i>--}}
    						{{--<h2>Responsive Layout</h2>--}}
    						{{--<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris eleifend volutpat aliquet. </p>--}}
    					{{--</div>--}}
    				{{--</div>--}}
    				{{--<div class="col-sm-6 col-md-3 service">--}}
    					{{--<div class="service-content">--}}
    						{{--<i class="fa fa-bell"></i>--}}
    						{{--<h2>Clean Design</h2>--}}
    						{{--<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris eleifend volutpat aliquet. </p>--}}
    					{{--</div>--}}
    				{{--</div>--}}
    				{{--<div class="col-sm-6 col-md-3 service">--}}
    					{{--<div class="service-content">--}}
    						{{--<i class="fa fa-coffee"></i>--}}
    						{{--<h2>Great Support</h2>--}}
    						{{--<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris eleifend volutpat aliquet. </p>--}}
    					{{--</div>--}}
    				{{--</div>--}}
    				{{--<div class="col-sm-6 col-md-3 service">--}}
    					{{--<div class="service-content">--}}
    						{{--<i class="fa fa-bug"></i>--}}
    						{{--<h2>Good Features</h2>--}}
    						{{--<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris eleifend volutpat aliquet. </p>--}}
    					{{--</div>--}}
    				{{--</div>--}}
    				{{--<div class="col-sm-6 col-md-3 service">--}}
    					{{--<div class="service-content">--}}
    						{{--<i class="fa fa-paper-plane"></i>--}}
    						{{--<h2>Copywriting</h2>--}}
    						{{--<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris eleifend volutpat aliquet. </p>--}}
    					{{--</div>--}}
    				{{--</div>--}}
    				{{--<div class="col-sm-6 col-md-3 service">--}}
    					{{--<div class="service-content">--}}
    						{{--<i class="fa fa-power-off"></i>--}}
    						{{--<h2>Web design</h2>--}}
    						{{--<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris eleifend volutpat aliquet. </p>--}}
    					{{--</div>--}}
    				{{--</div>--}}
    				{{--<div class="col-sm-6 col-md-3 service">--}}
    					{{--<div class="service-content">--}}
    						{{--<i class="fa fa-university"></i>--}}
    						{{--<h2>Programming</h2>--}}
    						{{--<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris eleifend volutpat aliquet. </p>--}}
    					{{--</div>--}}
    				{{--</div>--}}
    				{{--<div class="col-sm-6 col-md-3 service">--}}
    					{{--<div class="service-content">--}}
    						{{--<i class="fa fa-briefcase"></i>--}}
    						{{--<h2>Marketing &amp; PR</h2>--}}
    						{{--<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris eleifend volutpat aliquet. </p>--}}
    					{{--</div>--}}
    				{{--</div>--}}
    			{{--</div>--}}
    		{{--</div>--}}
    	{{--</div>--}}
    	<!-- /# Our Services -->

    	<!-- Start Parallax Section -->
    	{{--<div id="parallax-one" class="parallax-section">--}}
    		{{--<div class="overlay">--}}
    			{{--<div class="container padding-top padding-bottom">--}}
    				{{--<div class="row">--}}
    					{{--<div class="col-sm-6">--}}
    						{{--<img class="img-responsive" src="images/parallax-bg/tab.png" alt="Tab">--}}
    					{{--</div>--}}

    					{{--<div class="col-sm-6 npr">--}}
    						{{--<!-- Tab panes -->--}}
    						{{--<div class="tab-content">--}}
    							{{--<div role="tabpanel" class="tab-pane active" id="time">--}}
    								{{--<h2>Give a Try and You Will Love This Theme!</h2>--}}
    								{{--<p>Donec ullamcorper nulla non metus ac is mollis, est non commodo luctus, nisi ula, eget lacinia odio sem nec elit. Aene ndum nulla sed consectetur.esest. Don ec ullamcorper nulla non metu.</p>--}}
    							{{--</div>--}}
    							{{--<div role="tabpanel" class="tab-pane" id="platforms">--}}
    								{{--<h2>Create a stunning Website with Protocol</h2>--}}
    								{{--<p>Piure quaerat aut incidunt magni voluptate iste qui eligendi laboriosam omnis corporis repudiandae, animi dolores blanditiis possimus? Obcaecati, ipsam maxime perferendis officia repudiandae doloribus, maiores inventore ab eligendi quae.</p>--}}
    							{{--</div>--}}
    							{{--<div role="tabpanel" class="tab-pane" id="social">--}}
    								{{--<h2>Give a Try and You Will Love This Theme!</h2>--}}
    								{{--<p>Deserunt reiciendis ex amet ad dignissimos eligendi repudiandae! Magni quaerat nesciunt ad quod repellendus quas odio, dignissimos itaque laboriosam ullam eligendi sapiente. Consequatur odit fugiat et, blanditiis. Dolor, necessitatibus, quos?</p>--}}
    							{{--</div>--}}
    						{{--</div>--}}

    						{{--<!-- Nav tabs -->--}}
    						{{--<ul class="nav nav-tabs" role="tablist">--}}
    							{{--<li role="presentation" class="active"><a href="#time" data-toggle="tab"><i class="fa fa-clock-o"></i>Time Changer</a></li>--}}
    							{{--<li role="presentation"><a href="#platforms" data-toggle="tab"><i class="fa fa-cubes"></i>All platforms</a></li>--}}
    							{{--<li role="presentation"><a href="#social" data-toggle="tab"><i class="fa fa-thumbs-up"></i>Social integration</a></li>--}}
    						{{--</ul>--}}
    					{{--</div>--}}
    				{{--</div>--}}
    			{{--</div>--}}
    		{{--</div>--}}
    	{{--</div>--}}
    	<!-- #/ Parallax Section -->

    	<!-- Portfolio Section -->
    	<div id="portfolio">
            <div class="container padding-top padding-bottom">
                <div class="row section-title text-center">
                    <div class="col-sm-8 col-sm-offset-2">
                        <h1><span>青龙</span> 古镇</h1>
                        <p>青龙古镇位于山西省阳曲县与尖草坪区相邻的侯村乡，该村紧傍208国道、北同铺铁路和大运高速公路，交通极为便利。全村总面积235万平方米，其中耕地面积3500亩，户数500户，人口1400人。</p>
                    </div>
                </div>
                <div class="row portfolio-wrapper project-filter">
                    {{--<ul class="filter list-inline text-center">--}}
                        {{--<li><a class="active" href="#" data-filter="*">All</a></li>--}}
                    {{--</ul><!--/#portfolio-filter-->--}}

                    <div class="all-project" style="position: relative; height: 522px;">
                        @foreach($images as $image)
                        <!-- portfolio-item -->
                        <div class="portfolio-content filterable-product web video" style="position: absolute; left: 0px; top: 0px;">
                            <div class="portfolio-item">
                                <img class="img-responsive" src="{{ $image }}" alt="">
                                <div class="overlay">
                                    <span><a href="javascript:void(0);"><i class="fa fa-arrow-circle-o-right"></i></a></span>
                                    <span><a href="{{ $image }}" data-gallery="prettyPhoto"><i class="fa fa-plus-square-o"></i></a></span>
                                    {{--<h2>Abstract View</h2>--}}
                                    {{--<p>Effective is more than your average agency.</p>--}}
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>

                </div>
            </div>
        </div>
    	<!-- #/ Portfolio Section -->

    	<!-- Start Blog Area -->
    	{{--<div id="blog-section">--}}
    		{{--<div class="container padding-bottom">--}}
    			{{--<div class="row section-title text-center">--}}
    				{{--<div class="col-sm-8 col-sm-offset-2">--}}
    					{{--<h1>Our Blog</h1>--}}
    					{{--<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas ac augue at erat hendrerit dictum. Praesent porta, purus eget sagittis imperdiet.</p>--}}
    				{{--</div>--}}
    			{{--</div>--}}

    			{{--<div class="row">--}}
    				{{--<!-- post -->--}}
    				{{--<div class="col-sm-6 col-md-3">--}}
    					{{--<div class="post">--}}
    						{{--<div class="post-image">--}}
    							{{--<div class="post-time">--}}
    								{{--<p>12 <span>Jun</span></p>--}}
    							{{--</div>--}}
    							{{--<img class="img-responsive" src="images/blog/post-1.jpg" alt="Post">--}}
    							{{--<a href="blog.html" class="read-more"><span><i class="fa fa-angle-right"></i></span></a>--}}
    						{{--</div>--}}
    						{{--<a class="entry-title" href="blog.html"><h2>Curabitur nulla lorem</h2></a>--}}
    						{{--<div class="entry-meta">--}}
    							{{--<span>Posted by:<a href="#">Admin</a></span>--}}
    							{{--<span><a href="#">3 comments</a></span>--}}
    						{{--</div>--}}
    						{{--<p>Sed quis nibh vel erat tincidunt pretium. In sit amet massa sapien. Vestibulum diam turpis, gravida in lobortis id, ornare a eros. </p>--}}
    					{{--</div>--}}
    				{{--</div><!-- #/post -->--}}

    				{{--<!-- post -->--}}
    				{{--<div class="col-sm-6 col-md-3">--}}
    					{{--<div class="post">--}}
    						{{--<div class="post-image">--}}
    							{{--<div class="post-time">--}}
    								{{--<p>12 <span>Jun</span></p>--}}
    							{{--</div>--}}
    							{{--<img class="img-responsive" src="images/blog/post-2.jpg" alt="Post">--}}
    							{{--<a href="blog.html" class="read-more"><span><i class="fa fa-angle-right"></i></span></a>--}}
    						{{--</div>--}}
    						{{--<a class="entry-title" href="blog.html"><h2>Curabitur nulla lorem</h2></a>--}}
    						{{--<div class="entry-meta">--}}
    							{{--<span>Posted by:<a href="#">Admin</a></span>--}}
    							{{--<span><a href="#">3 comments</a></span>--}}
    						{{--</div>--}}
    						{{--<p>Sed quis nibh vel erat tincidunt pretium. In sit amet massa sapien. Vestibulum diam turpis, gravida in lobortis id, ornare a eros. </p>--}}
    					{{--</div>--}}
    				{{--</div><!-- #/post -->--}}

    				{{--<!-- post -->--}}
    				{{--<div class="col-sm-6 col-md-3">--}}
    					{{--<div class="post">--}}
    						{{--<div class="post-image">--}}
    							{{--<div class="post-time">--}}
    								{{--<p>12 <span>Jun</span></p>--}}
    							{{--</div>--}}
    							{{--<img class="img-responsive" src="images/blog/post-3.jpg" alt="Post">--}}
    							{{--<a href="blog.html" class="read-more"><span><i class="fa fa-angle-right"></i></span></a>--}}
    						{{--</div>--}}
    						{{--<a class="entry-title" href="blog.html"><h2>Curabitur nulla lorem</h2></a>--}}
    						{{--<div class="entry-meta">--}}
    							{{--<span>Posted by:<a href="#">Admin</a></span>--}}
    							{{--<span><a href="#">3 comments</a></span>--}}
    						{{--</div>--}}
    						{{--<p>Sed quis nibh vel erat tincidunt pretium. In sit amet massa sapien. Vestibulum diam turpis, gravida in lobortis id, ornare a eros. </p>--}}
    					{{--</div>--}}
    				{{--</div><!-- #/post -->--}}

    				{{--<!-- post -->--}}
    				{{--<div class="col-sm-6 col-md-3">--}}
    					{{--<div class="post">--}}
    						{{--<div class="post-image">--}}
    							{{--<div class="post-time">--}}
    								{{--<p>12 <span>Jun</span></p>--}}
    							{{--</div>--}}
    							{{--<img class="img-responsive" src="images/blog/post-4.jpg" alt="Post">--}}
    							{{--<a href="blog.html" class="read-more"><span><i class="fa fa-angle-right"></i></span></a>--}}
    						{{--</div>--}}
    						{{--<a class="entry-title" href="blog.html"><h2>Curabitur nulla lorem</h2></a>--}}
    						{{--<div class="entry-meta">--}}
    							{{--<span>Posted by:<a href="#">Admin</a></span>--}}
    							{{--<span><a href="#">3 comments</a></span>--}}
    						{{--</div>--}}
    						{{--<p>Sed quis nibh vel erat tincidunt pretium. In sit amet massa sapien. Vestibulum diam turpis, gravida in lobortis id, ornare a eros. </p>--}}
    					{{--</div>--}}
    				{{--</div><!-- #/post -->--}}

    			{{--</div><!-- #/ row -->--}}
    		{{--</div><!-- #/ container -->--}}
    	{{--</div>--}}
    	<!-- #/ Blog Area -->

    	{{--<div class="container padding-bottom">--}}
    		{{--<div class="row section-title text-center">--}}
    			{{--<div class="col-sm-8 col-sm-offset-2">--}}
    				{{--<h1>Our Clients</h1>--}}
    				{{--<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas ac augue at erat hendrerit dictum. Praesent porta, purus eget sagittis imperdiet.</p>--}}
    			{{--</div>--}}
    		{{--</div>--}}
    		{{--<div class="text-center our-clients">--}}
    			{{--<ul>--}}
    				{{--<li><a href="#"><img class="img-responsive" src="images/clients/client1.png" alt="" /></a></li>--}}
    				{{--<li><a href="#"><img class="img-responsive" src="images/clients/client2.png" alt="" /></a></li>--}}
    				{{--<li><a href="#"><img class="img-responsive" src="images/clients/client3.png" alt="" /></a></li>--}}
    				{{--<li><a href="#"><img class="img-responsive" src="images/clients/client4.png" alt="" /></a></li>--}}
    				{{--<li><a href="#"><img class="img-responsive" src="images/clients/client5.png" alt="" /></a></li>--}}
    			{{--</ul>--}}
    		{{--</div><!--/our-clients -->--}}
    	{{--</div>--}}
@endsection