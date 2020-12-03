@extends('main_layout')
@section('title') 
商品購入履歴 | Crofun
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
		
		}
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
			.status_font{
				font-size:15px;
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
				font-size: 11px !important;
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
				max-height: 230px !important;
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
			.status_font{
				font-size:14px;
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
			.status_font{
				font-size:13px;
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
			.status_font{
				font-size:12px;
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
			.status_font{
				font-size:11px;
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
			.editbtn{
				margin-top:0rem;
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
	<div class="row container_div" >
		<div class=" col-md-12 col-12">
			<div class="mt20">
				<div class="row">
					<div class="col-md-3">
						@include('user.layouts.profile')
					</div>
					<div class="col-md-9 project-details-block-padding">
						<div class="row">
							<div class="col-md-12 col-12">
								<div class="row inner">
									<div class="col-md-12 col-12 ">
										<div class="px-2 pt-3">
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-12 col-12">
							</div>
							<div class="col-md-12 col-12 pt-3">
								<h4 class="heading">購入済み商品</h4>
							</div>
						</div>

						     @if($products)
									@foreach ($products as $product)
									@php
										// dd($product);
										//echo $product->order_id;
									@endphp
									<div class="row inner horizontal mb-5">
										<div class="col-md-12 col-12">
											<div class="row inner_inner">
												<div class="col-md-5">
													<div class="row">
														<div class="col-md-12 project-item">
															<div class="frame">
															<span class="helper"></span>
																<img src="{{$product->product->image ?  asset('uploads/products/'.$product->product->image) : ''}}" style="max-height:242px; margin-left:-5px" alt="" class="img-fluid imageResize">
															</div>
														</div>
													</div>
													<br>
												</div>
												<div class="col-md-7">
													<div class="row ">
														<div class="col-md-7 category_favourite">
															<h6 class="category-name" style="color:#bfc5cc;"> <span style="color:#bfc5cc;"> <i class="fa fa-tag"></i> <span> {{$product->product->subCategory->category->name}}</span>  
															</span></h6>
														</div>
														<div class="col-md-5 category_favourite">
														{{--@php
																$fav = 0;
															@endphp
															@foreach ($product->product->favourite as $f)
																@if ($f->user_id == Auth::user()->id)
																	@php
																		$fav = 1;
																	@endphp
																@endif
															@endforeach
															@if(Auth::check())
																@if($product->product->user_id==Auth::user()->id)
																	<div class="col-md-4 col-sm-6 category_favourite"></div>
																@else
																	@if ($fav == 0)
																		<a href="{{ route('user-favourite-add-product',$product->product_id) }}" class="pull-right favfont" style="font-size:14px;"><span style="color:#555;"> <i class="fa fa-heart-o"></i> </span>お気に入りに追加</a>
																	@else
																		<a href="{{ route('user-favourite-remove-product', $product->product_id) }}" class="pull-right favfont" style="font-size:14px;"><span style="color:#ed49b6"> <i class="fa fa-heart"></i> </span>お気に入り</a>
																	@endif
																@endif
															@endif
															@if ($fav == 0)
																<a  href="{{ route('user-favourite-add-product', $product->product_id) }}" class="pull-right" style="font-size:14px;"><span style="color:#ed49b6;"> <i class="fa fa-heart"></i> </span>お気に入りに追加 </a>
															@else
																<span class="pull-right" style="font-size:14px;"><span style="color:#555"> <i class="fa fa-heart-o"></i> </span>お気に入り</span>
															@endif--}}
														</div>

													</div>
													<div class="row mt-1">
														<div class="col-md-12">
															<h5 class="title"  style="font-size:20px;" class="font-weight-bold">{{$product->product->title}}</h5>
														</div>
													</div>
													<div class="row mt-3">
														<div class="col-md-9">
															<h5 class="message-button" style="font-size:21px; letter-spacing:2px;">{{$product->total_point}} ポイント</h5>
														</div>
													</div>
													<?php
														$specification = '';
														if($product->qty){
															$specification .= $product->qty.'個';
															if($product->color){
																$specification .= '/';
															}
														}
														if($product->color){
															$specification .= $product->color;
															if($product->size){
																$specification .= '/';
															}
														}
														if($product->size){
															$specification .= $product->size;
														}

													?>
													<div class="row  mt-2">
														<div class="col-md-9">
															<h5 class="message-button" style="font-size:15px; letter-spacing:2px;">{{$specification}}</h5>
														</div>
													</div>
													<div class="row  mt-2">
														<div class="col-md-9">
														<h5 class="message-button" style="font-size:15px; letter-spacing:2px;">購入日：{{$product->created_at}}</h5>
														</div>
													</div>
													<div class="row  mt-2">
														<div class="col-md-9">
														<h5 class="message-button" style="font-size:13px; letter-spacing:2px;">商品提供者：{{$product->product->user->first_name.' '.$product->product->user->last_name}}</h5>
														</div>
													</div>
													<div class="row mt-2">
														@php $my_rating = 0; @endphp
														@foreach ($product->product->ratings as $rating)
															@if ($rating->user_id == Auth::user()->id && $product->order_id == $rating->order_id)
																@php
																	$my_rating = $rating->user_rating
																@endphp
															@endif
														@endforeach
														<div class="col-md-6 col-6 pr-1 pr-md-1">
															<button class="p-2 text-white message-button btn btn-md btn-block w6-14 msg_send_btn btn-default"  data-user_id="{{ $product->product->user_id }}" data-project_username="{{ $product->order->user->first_name.' '.$product->order->user->last_name }}" style="cursor:pointer; color:#fff;">
															 	<span style="color:#fff !important;"> <i class="fa fa-envelope"></i> </span>メッセージを送る
															</button>
														</div>
														@if($my_rating == 0)
															<div class="col-md-6 pl-md-1">
																<button type="button" class="p-2 editbtn message-button text-white btn btn-md btn-block w6-14 btn-warning rating_btn" data-my-rate="{{ $my_rating }}" data-order-id = "{{ $product->order_id }}" data-product-id = "{{ $product->product_id }}" data-toggle="modal" data-target="#star">★★★  レビューを書く</button>
															</div>
														@endif
													</div>
												</div>
												<div class="margin_top">
													<div class="col-md-12 status_font">
														@if($product->status == 1)
															対応状況 : 新規受注
														@elseif($product->status == 2)
															対応状況 : 配送準備中&nbsp;&nbsp;
															伝票番号:
															{{$product->order->document_number}}&nbsp;&nbsp;
															配送会社:
															{{$product->order->shipping_company}}
														@elseif($product->status == 3)
															対応状況 : 配送済み&nbsp;&nbsp;
															伝票番号:
															{{$product->order->document_number}}&nbsp;&nbsp;
															配送会社:
															{{$product->order->shipping_company}}
														@elseif($product->status == 4)
															対応状況 : キャンセル&nbsp;&nbsp;
															{{--{{$product->order->cancel_content}}--}}
														@endif
													</div>
												</div>
											</div>
										</div>
									</div>
								@endforeach
							@endif
					</div>
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
{{-- @include('user.layouts.message_modal') --}}
@include('user.layouts.message_modal')
@include('user.layouts.star-rating')

@include('user.layouts.profileModal')
@stop

@section('custom_js')

	<script type="text/javascript">
			$(document).ready(function(){
				$('.msg_send_btn').on('click', function(e){
					var user_id = $(this).attr('data-user_id');
					var user_name = $(this).attr('data-project_username');


					$('#to_id').val(user_id);
					$('#project_user_name').val(user_name);
					$('#send-message').modal('show');
					//$('#send-message').addClass('show');
				});
			});
	</script>

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


	<script type="text/javascript">
		$(document).ready(function(){
			$('.rating_btn').on('click', function(){
				var product_id = $(this).attr('data-product-id');
				var my_rate = parseInt($(this).attr('data-my-rate'));
				var my_order_id = parseInt($(this).attr('data-order-id'));
				// console.log(product_id);
				$('#get_product_id').val(product_id);
				$('#get_my_rate').val(my_rate);
				$('#get_my_order_id').val(my_order_id);

				if (my_rate == 1) {
					$('#one').addClass('active');
					$('#two').removeClass('active');
					$('#three').removeClass('active');
					$('#four').removeClass('active');
					$('#five').removeClass('active');
				}else if (my_rate == 2) {
					$('#one').removeClass('active');
					$('#two').addClass('active');
					$('#three').removeClass('active');
					$('#four').removeClass('active');
					$('#five').removeClass('active');
				}else if (my_rate == 3) {
					$('#one').removeClass('active');
					$('#two').removeClass('active');
					$('#three').addClass('active');
					$('#four').removeClass('active');
					$('#five').removeClass('active');
				}else if (my_rate == 4) {
					$('#one').removeClass('active');
					$('#two').removeClass('active');
					$('#three').removeClass('active');
					$('#four').addClass('active');
					$('#five').removeClass('active');

				}else if (my_rate == 5) {
					$('#one').removeClass('active');
					$('#two').removeClass('active');
					$('#three').removeClass('active');
					$('#four').removeClass('active');
					$('#five').addClass('active');
				}

			});

			$('.rating').on('click', function(){
				var rate = $(this).attr('data-rating');
				$('#get_rating').val(rate);
				// console.log($('#get_rating').val());
				// $(this).addClass('active');
				var getId = $(this).attr('id');
				console.log(getId);
				if (getId == 'one') {
					$('#one').addClass('active');
					$('#two').removeClass('active');
					$('#three').removeClass('active');
					$('#four').removeClass('active');
					$('#five').removeClass('active');
				}else if (getId == 'two') {
					$('#one').removeClass('active');
					$('#two').addClass('active');
					$('#three').removeClass('active');
					$('#four').removeClass('active');
					$('#five').removeClass('active');
				}else if (getId == 'three') {
					$('#one').removeClass('active');
					$('#two').removeClass('active');
					$('#three').addClass('active');
					$('#four').removeClass('active');
					$('#five').removeClass('active');
				}else if (getId == 'four') {
					$('#one').removeClass('active');
					$('#two').removeClass('active');
					$('#three').removeClass('active');
					$('#four').addClass('active');
					$('#five').removeClass('active');
				}else if (getId == 'five') {
					$('#one').removeClass('active');
					$('#two').removeClass('active');
					$('#three').removeClass('active');
					$('#four').removeClass('active');
					$('#five').addClass('active');
				}

			});
		});
	</script>

@stop







