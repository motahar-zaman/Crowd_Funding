@extends('main_layout')
@section('title') 
掲載商品 | Crofun
@stop
@section('custom_css')
	<style type="text/css">
		.wizard > .steps > ul > li {
		    width: 20%;
		}
		.amount{
			border: 1px solid black !important;
			padding: 5px;
		}
		.no-border{
			border: none;
		}
		.box{
			border: 1px solid black !important;
		}
		.padding{
			padding: 10px;
		}
		.heading:after{
			display: block;
			height: 3px;
			background-color: #80b9f2;
			content: "";
			width: 100%;
			margin: 0 auto;
			margin-top: 10px;
			margin-bottom: 30px;
		}
		.bg-dark{
			background-color: #c6c6c6;
		}
		.div-radius{
			border: 3px solid #eaebed;
			border-radius: 5px;
		}
		.div-radius1{
			/* border: 3px solid #eaebed; */
			border-radius: 5px;
		}
		.horizontal:after{
			display: block;
			height: 2px;
			background-color: #999;
			content: "";
			width: 100%;
			margin: 0 auto;
			margin-top: 15px;
			margin-bottom: 30px;
		}
		.bg-danger{
			/* opacity: 0.9 !important; */
			background-color: #ffe3da !important;
		}

	.project_status {
    position: absolute;
    top: 15px;
    left: 3px;
    width: auto;
    padding: 5px;
    padding-left: 15px;
    padding-right: 15px;
    text-align: center;
		background-color: #ff6540;
	}
	.project-item{
		position: relative;
	}
	.icon-info{
		border: 2px solid #ff3300;
		padding-right: 10px;
		padding-left: 10px;
		padding-top: 1px;
		padding-bottom: 1px;
		border-radius: 50%;
		color: #ff3300;
		background-color: #ffffff;


	}
/*  */
		@media (min-width: 1250px) {
			.edit-button{
				min-width: 182px;
				padding:0px 15px;
			}
		}
		@media (max-width: 1320px) {
			.favfont{
				font-size: 13px !important;
			}
			.fontSize{
				font-size: 13px !important;
			}
			.message-button{
				font-size: 14px !important;
			}
			.user-title{
				font-size: 13px !important;
			}
		}
		@media (max-width: 1260px) {
			.message-button{
				font-size: 14px !important;
			}
			.user-title{
				font-size: 12px !important;
			}
		}
		
		@media (max-width: 1250px) {
			.edit-button{
				min-width: 172px;
				max-width: 172px;
				padding:0px 15px;
			}
			.fontSize{
				font-size: 13px !important;
			}
			.box-height{
				height: 77px !important;
			}
			.favfont{
				font-size: 12px !important;
			}
			
		}
		@media (max-width: 1210px) {
			.edit-button{
				min-width: 152px;
				padding:0px 10px;
			}
			.font{
				font-size: 18px !important;
			}
			.favfont{
				font-size: 11px !important;
			}
			.user-title{
				font-size: 10px !important;
			}
			.message-button{
				font-size: 12px !important;
			}
			.box-height-invest{
				height: 69px !important;
			}
			.pt-2{
				padding-top: 0.25rem !important;
			}
			.frame {
				height: 232px !important;      /* equals max image height */
				width: auto ;
				border: 1px solid #cccccc;
				white-space: nowrap;
				text-align: center;
			}
			.imageResize{
				max-height: 232px !important;
			}
		}
		@media (max-width: 1150px) {
			.edit-button{
				min-width: 142px;
				padding:0px 10px;
			}
			.fontSize{
				font-size: 12px !important;
			}
			.box-height-invest{
				height: 69px !important;
				width: 69px !important;
			}
			.message-button{
				font-size: 11px !important;
			}
			.font{
				font-size: 17px !important;
			}
		}
		@media (max-width: 1115px) {
			.edit-button{
				min-width: 132px;
				padding:0px 10px;
			}
			.fontSize{
				font-size: 12px !important;
			}
			.favfont{
				font-size: 10px !important;
			}
			.message-button{
				font-size: 11px !important;
			}
			.font{
				font-size: 16px !important;
			}
		}
		@media (max-width: 1085px) {
			.edit-button{
				min-width: 130px;
				padding:0px 10px;
			}
			.fontSize{
				font-size: 11px !important;
			}
			.message-button{
				font-size: 10px !important;
			}
			.font{
				font-size: 15px !important;
			}
			.box-height{
				height: 77px !important;
				width: 73px !important;
			}

		}
		@media (max-width: 930px) {
			.edit-button{
				min-width: 103px;
				padding:0px 10px;
			}
			.fontSize{
				font-size: 11px !important;
			}
			.message-button{
				font-size: 10px !important;
			}
			.font{
				font-size: 14px !important;
			}
			.box-height-invest{
				height: 64px !important;
				width: 64px !important;
			}
			.font{
				font-size: 18px !important;
			}
		}
		@media (max-width: 890px) {
			.edit-button{
				min-width: 103px;
				max-width:130px;
				padding:0px 10px;
			}
			.fontSize{
				font-size: 9px !important;
			}
			.message-button{
				font-size: 10px !important;
			}
			.box-height-invest{
				height: 60px !important;
				width: 50px !important;
			}
			.comp_font{
				font-size: 12px !important;
			}
			.box-height{
				height: 70px !important;
				width: 60px !important;
			}
			.font{
				font-size: 13px !important;
			}
			.favfont{
				font-size: 8px !important;
			}
			.user-title{
				font-size: 9px !important;
			}
			.title{
				font-size: 18px!important;
			}
		}

		@media (max-width: 575.73px) {
			.edit-button{
				min-width: 170px;
				max-width:170px;
				padding:0px 10px;
			}
			.fontSize{
				font-size: 10px !important;
			}
			.message-button{
				font-size: 10px !important;
			}
			.box-height-invest{
				height: 70px !important;
				width: 80px !important;
			}
			.comp_font{
				font-size: 12px !important;
			}
			.box-height{
				height: 70px !important;
				width: 80px !important;
			}
			.font{
				font-size: 13px !important;
			}
			.favfont{
				font-size: 12px !important;
			}
			.user-title{
				font-size: 12px !important;
			}
			.title{
				font-size: 18px!important;
			}
			.fontTitle{
				font-size:18px !important;
			}
			.priceTitle{
				font-size:14px !important;
			}
			.margin_top{
				margin-top:1rem;
			}
		}

		.frame {
			height: 245px;      /* equals max image height */
			width: auto;
			border: 1px solid #cccccc;
			white-space: nowrap;
			text-align: center;
		}
		.helper {
			display: inline-block;
			height: 100%;
			vertical-align: middle;
		}

	</style>
@stop


@section('ecommerce')

@stop

@section('content')

@include('user.layouts.tab')


<div class="container">
	<div class="row container_div">
	  <div class="col-md-12 col-12">
			<div class="mt20">
				<div class="row">
					<div class="col-md-3">
						@include('user.layouts.profile')
					</div>
					<div class="col-md-9 project-details-block-padding">

					@include('user.layouts.notifications')

						<div class="row">
							
							<div class="col-md-12 col-12 pt-3">
								<h4 class="heading">掲載商品</h4>
							</div>
						</div>
						@if($products)
						@foreach ($products as $product)
							{{-- {{ $product->id }} --}}
							<div class="row mb-5 horizontal">
								<div class="col-md-12 col-12">
									<div class="row inner ">
										<div class="col-md-12 col-12">
											<div class="row inner_inner">
												<div class="col-md-5">
													<div class="row">
														<div class="col-md-12 project-item">
														<div class="frame">
															<span class="helper"></span>
															<img src="{{$product->image ?  asset('uploads/products/'.$product->image) : asset('uploads/projects/1615154785167836.jpeg')}}" style="max-height:242px; margin-left:-5px" alt="" class="img-fluid imageResize">
															{{-- <div class="project_status {{strtotime($product->end) > strtotime(date('Y-m-d H:i:s')) ? 'status_1' : 'status_2'}}"><span>{{strtotime($product->end) > strtotime(date('Y-m-d H:i:s')) ? '募集中' : '達成！'}}</span></div> --}}
														</div>
														</div>
													</div>
												</div>
												<div class="col-md-7 margin_top">
													<div class="row ">
														<div class="col-md-12">
															<h6 class="comp_font category-name" style="color:#bfc5cc;"> <i class="fa fa-tag"></i><a href="{{route('front-product-list', ['c' => $product->subCategory->category->id])}}">{{ $product->subCategory->category->name }}</a></h6>
														</div>
														<div class="col-md-0">
															@php
																$fav = 0;
															@endphp
															@foreach ($product->favourite as $f)
																@if ($f->user_id == Auth::user()->id)
																	@php
																		$fav = 1;
																	@endphp
																@endif
															@endforeach
															@if(Auth::check())
																@if($product->user_id==Auth::user()->id)
																	<div class="col-md-4 col-sm-6 category_favourite"></div>
																
																@else
																	@if ($fav == 0)
																		<a href="{{ route('user-favourite-add-product',$product->id) }}" class="pull-right favfont" style="font-size:14px;"><span style="color:#ed49b6;"> <i class="fa fa-heart"></i> </span>お気に入りに追加</a>
																	@else
																		<a href="{{ route('user-favourite-remove-product', $product->id) }}" class="pull-right favfont" style="font-size:14px;"><span style="color:#555"> <i class="fa fa-heart-o"></i> </span>お気に入り</a>
																	@endif
																@endif
															@endif
															{{--@if ($fav == 0)
																<a  href="{{ route('user-favourite-add-product', $product->id) }}" class="pull-right" style="font-size:14px;"><span style="color:#ed49b6;"> <i class="fa fa-heart"></i> </span>お気に入りに追加</a>
															@else
																<span class="pull-right" style="font-size:14px;"><span style="color:#555"> <i class="fa fa-heart-o"></i> </span>お気に入り </span>
															@endif--}}
														</div>
													</div>
													<div class="row mt-1">
														<div class="col-md-12">
															<h5 style="font-size:20px;" class="font-weight-bold">{{$product->title}}</h5>
														</div>
													</div>
													<div class="row mt-3">
														<div class="col-md-12">
															<h5 style="font-size:17px; letter-spacing:2px;">{!!number_format($product->price)!!} ポイント</h5>
														</div>
													</div>
													<div class="row  mt-3">
														<div class="col-md-12">
															<h5 style="font-size:15px; letter-spacing:2px;">カラー：
																<?php
																	$colors = [];
																	foreach ($product->color as $pt){
																		if ($pt->color != null && $pt->color != ''){
																			array_push($colors, $pt->color);
																		}
																	}
																	$color = implode(',',$colors);
																?>
																{{ $color }}
																
															</h5>
														</div>
													</div>
													<div class="row  mt-3">
														<div class="col-md-12">
															<h5 style="font-size:15px; letter-spacing:2px;">サイズ：
																<?php
																	$types = [];
																	foreach ($product->color as $pt){
																		if ($pt->type != null && $pt->type != ''){
																			array_push($types, $pt->type);
																		}
																	}
																	$type = implode(',',$types);
																?>
																{{ $type }}
																
															</h5>
														</div>
													</div>
													<div class="row mt-3">
														<div class="col-md-12">
															<div class="div-radius1">
																{{--<a href="{{ route('user-product-edit', $product->id) }}" class="p-2 bg-dark text-white btn btn-secondary font-weight-bold" style="padding-left: 30px !important;padding-right: 30px !important;">編集する</a>--}}
																<a href="{{ route('user-product-details', $product->id) }}" class="p-2 bg-dark text-white btn btn-secondary font-weight-bold" style="padding-left: 30px !important;padding-right: 30px !important;">詳細をみる</a>
															</div>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
						</div>

						@endforeach
					@endif

					@if(($user->profile->phonetic) == null ||($user->profile->phonetic2) == null ||($user->profile->phone_no) == null||($user->profile->postal_code) == null||($user->profile->prefectures) == null||($user->profile->municipility) == null ||($user->first_name) == null ||($user->last_name) == null )
						
						<div class="row" style="margin-top: 30px;margin-bottom: 30px;">
							<div class="col-12 text-center">
								<a href="" class="btn btn-warning">商品を登録をする</a>
							</div>
						</div>
						@else
						<div class="row" style="margin-top: 30px;margin-bottom: 30px;">
							<div class="col-12 text-center">
								<a href="{{ route('user-product-add') }}" class="btn btn-warning">商品を登録をする</a>
							</div>
						</div>
					@endif
						{{-- repeat --}}



						{{-- repeat ends --}}


						@php
						$error = 0;
						if (empty($user->first_name) || empty($user->last_name) || empty($user->profile->phonetic) ||  empty($user->profile->phonetic2) ||  empty($user->profile->postal_code) || empty($user->profile->prefectures) || empty($user->profile->phone_no) || empty($user->profile->municipility)) {
							$error = 1;
						}
						@endphp
						<input type="hidden" name="getError" id="getError" value="{{ $error }}">

				</div>

			</div>

			</div>
	  </div>
	</div>
</div>

@include('user.layouts.profileModal')

@stop

@section('custom_js')
<script type="text/javascript">
	    // var error = document.getElementById('getError').value;
			var error = $('#getError').val();

			// error = 1;
				$(window).on('load',function(){
					console.log('error = ' + error);
						if (error == 1) {
							$('#myModal').modal('show');
						}
				});




			// $('#myModal').modal({
    	// 	backdrop: 'static',
    	// 	keyboard: false  // to prevent closing with Esc button (if you want this too)
			// });
	</script>

@stop
