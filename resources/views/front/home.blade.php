@extends('main_layout')
@section('title') 
{{$title}}
@stop
@section('custom_css')
@stop

@section('content')
	@include('front.layouts.banner')
	<div class="" id="main-content" style="visibility:hidden;">
		<section class="project_tabs">
			<div class="container">
				@include('front.layouts.tabs')
			</div>
		</section>
		<section class="project_sorting">
			<div class="container">
				<div class="container_div">
					<div class="col-md-12 ">
						<div class="col-md-3 padding_search col-sm-10 search_area">
							@include('front.layouts.search')
						</div>
					</div>
				</div>
			</div>
		</section>
		<section class="project_list">
			<div class="">
				<div class="container ">
					<div class="row justify-content-center container_div">
						<div class="col-md-12  col-sm-12 col_padding">
							<div class="row" style='margin:0px'>
								@foreach($projects as $p)
									<div class="col-md-4">
										@include('front.layouts.project')
									</div>
								@endforeach
							</div>
							<div class="row"  style='margin:0px'>
								<div class="col-md-4"></div>
								<div class="col-md-4"></div>
								<div class="col-md-4 text-right" style="margin-top:-15px"><a class="see_all_button btn btn-primary" href="{{route('front-project-list-bycat', ['s' => 'd'])}}">もっと見る</a></div>
							</div>
							
							<!-- Most colllected by percentage -->
							<div class="mt-5"><h3>あとひと押しのプロジェクト</h3></div>
							<div class="row" style='margin:0px'>
								@foreach($most_earned_100 as $p)
									<div class="col-md-4">
										@include('front.layouts.project')
									</div>
								@endforeach
							</div>
							<div class="row" style='margin:0px'>
								<div class="col-md-4"></div>
								<div class="col-md-4"></div>
								<div class="col-md-4 text-right" style="margin-top:-15px"><a class="see_all_button btn btn-primary"  href="{{route('front-project-list-bycat', ['s' => 'per'])}}">もっと見る</a></div>
							</div>
							<!-- Most colllected by amount -->
							<div class="mt-5"><h3>支援金額の多いプロジェクト</h3></div>
							<div class="row" style='margin:0px'>
								@foreach($most_earned as $p)
									<div class="col-md-4">
										@include('front.layouts.project')
									</div>
								@endforeach
							</div>
							<div class="row" style='margin:0px'>
								<div class="col-md-4"></div>
								<div class="col-md-4"></div>
								<div class="col-md-4 text-right" style="margin-top:-15px"><a class="see_all_button btn btn-primary"  href="{{route('front-project-list-bycat', ['s' => 'c'])}}">もっと見る</a></div>
							</div>
							<div class="mt-5"><h3>人気の商品</h3></div>
							<div class="row" style='margin:0px'>
								@foreach($most_solds as $p)
									<div class="col-md-4">
										@include('front.layouts.product')
									</div>
								@endforeach
							</div>
							<div class="row" style='margin:0px'>
								<div class="col-md-4"></div>
								<div class="col-md-4"></div>
								<div class="col-md-4 text-right" style="margin-top:-15px"><a class="see_all_button btn btn-primary"  href="{{route('front-product-list', ['s' => 'most'])}}">もっと見る</a></div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
	</div>
	@include('user.layouts.profileModal')
@stop

@section('custom_js')
	@yield('sort_js')
	<script type="text/javascript">
		$('.banner_slider').slick({
		  centerMode: true,
		  centerPadding: '80px',
		  slidesToShow: 1,
		  responsive: [
		    {
		      breakpoint: 480,
		      settings: {
		        arrows: false,
		        centerMode: true,
		        centerPadding: '40px',
		        slidesToShow: 1
		      }
		    }
		  ]
		});

		$(document).ready(function () {
			$('#slideshow').css('visibility','visible');
			$('#main-content').css('visibility','visible');
		})

		$('.profileModal').on('click',function(){
			$('#myModal').modal('show');
		});
	</script>
@stop
