@extends('frontend.layouts.master')

@section('content')

<div id="service">
		<div class="container padding-top">
			<div class="row section-title text-center">
				<div class="col-sm-8 col-sm-offset-2">
					<h1>游览路线</h1>
					<p>自驾、公交</p>
				</div>
			</div>
			<div class="row padding-bottom">
				<div class="col-sm-5">
					<img class="img-responsive" src="images/map.png" alt="Service">
				</div>
				<div class="col-sm-7 npl">
					<h2>自驾路线</h2>
					<p>租个宝马去嗨皮~</p>
					<h2>公交</h2>
					<p>1. 828路内环(市政府上,北宫下,11站)，换904路(青龙镇村下,20站)，下车向西北210米</p>
					<p>2. 855路(市政府上,动物园下,13站)，换904路(青龙镇村下,22站)，下车向西北210米</p>
					{{--<div class="row necessary text-center">--}}
						{{--<div class="col-sm-3">--}}
							{{--<i class="fa fa-cogs"></i>--}}
							{{--<p>Easy Settings</p>--}}
						{{--</div>--}}
						{{--<div class="col-sm-3">--}}
							{{--<i class="fa fa-bitbucket"></i>--}}
							{{--<p>One Bucket</p>--}}
						{{--</div>--}}
						{{--<div class="col-sm-3">--}}
							{{--<i class="fa fa-bomb"></i>--}}
							{{--<p>Clean Design</p>--}}
						{{--</div>--}}
						{{--<div class="col-sm-3">--}}
							{{--<i class="fa fa-bug"></i>--}}
							{{--<p>Bug Free</p>--}}
						{{--</div>--}}
					{{--</div>--}}
				</div>
			</div>
		</div>
	</div>

@endsection