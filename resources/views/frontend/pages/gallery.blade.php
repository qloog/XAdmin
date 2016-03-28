@extends('frontend.layouts.master')

@section('content')

    <div id="portfolio">
		<div class="container padding-top">
			<div class="row section-title text-center">
				<div class="col-sm-8 col-sm-offset-2">
					<h1><span>精美</span> 图片</h1>
					<p>浏览在这里的每一个精彩瞬间</p>
				</div>
			</div>

			@foreach($images as $key => $image)
			@if ($key % 2 == 0)
			<div class="row portfolio-wrapper">
			@endif
				<div class="col-sm-6">
					<div class="single-project">
						<div class="portfolio-item">
							<img class="img-responsive" src="{{ $image }}" alt="">
							<div class="overlay">
								<div class="overlay-content">
									<span><a href="javascript:void(0);"><i class="fa fa-arrow-circle-o-right"></i></a></span>
									<span><a href="{{ $image }}" data-gallery="prettyPhoto"><i class="fa fa-plus-square-o"></i></a></span>
									<h2>Abstract View</h2>
									<p>Effective is more than your average agency.</p>
								</div>
							</div>
						</div>
					</div>
                </div>
			@if ($key % 2 != 0)
			</div>
			@endif
			@endforeach
		</div>
	</div>

@endsection