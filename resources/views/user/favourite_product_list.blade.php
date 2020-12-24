@extends('main_layout')

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
			margin-top: 10px;
			margin-bottom: 45px;
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
	.checked {
		color: #fff658;
	}
	.bg-blue{
		background-color:#0099ff !important;
	}
.bg-yellow{
	background-color:#ffbc00 !important;;
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
			.title{
				font-size: 18px!important;
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
			.title{
				font-size: 16px!important;
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
			.cart_font{
				font-size: 14px !important;
			}
			.title{
				font-size: 12px!important;
			}
			.price{
				font-size: 18px!important;
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
			.favfont{
				font-size: 9px !important;
			}
			.font{
				font-size: 18px !important;
			}
			.cart_font{
				font-size: 12px !important;
			}
			.title{
				font-size: 12px!important;
			}
			.price{
				font-size: 18px!important;
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
				font-size: 9px!important;
			}
		}
		@media (max-width: 830px) {
			.edit-button{
				min-width: 103px;
				max-width:130px;
				padding:0px 10px;
			}
			.favfont{
				font-size: 8px !important;
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
				font-size: 7px !important;
			}
			.user-title{
				font-size: 9px !important;
			}
			.title{
				font-size: 8px!important;
			}
			.product-title{
				font-size: 18px!important;
			}
			.cart_font{
				font-size: 10px !important;
			}
			.price{
				font-size: 16px!important;
			}
		}
		@media (max-width: 790px) {
			.edit-button{
				min-width: 103px;
				max-width:130px;
				padding:0px 10px;
			}
			.favfont{
				font-size: 8px !important;
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
				font-size: 7px !important;
			}
			.user-title{
				font-size: 9px !important;
			}
			.title{
				font-size: 8px!important;
			}
			.product-title{
				font-size: 18px!important;
			}
			.cart_font{
				font-size: 9px !important;
			}
			.price{
				font-size: 16px!important;
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
				font-size: 9px !important;
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
				margin-top:0px;
			}
			.padding_mobile{
				padding:0px 15px !important;
			}
			.margin_left{
				margin-left:0.75rem !important;
			}
			.cart_font{
				font-size: 17px !important;
			}
		}

		.product_options{
			height: 55px;
			width: auto;
			border: 3px solid #eaebed;
			border-radius: 5px;
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
					<div class="col-md-9">
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
								<ul class="nav nav-tabs" role="tablist">
									<li class="nav-item">
										<a class="nav-link {{Route::currentRouteName()=='user-favourite-project-list'?'active':''}}" href="{{route('user-favourite-project-list')}}">プロジェクト</a>
									</li>
									<li class="nav-item">
										<a class="nav-link {{Route::currentRouteName()=='user-favourite-product-list'?'active':''}}" href="{{route('user-favourite-product-list')}}">カタログ商品</a>
									</li>
								</ul>
								<div class="tab-content">
									<div id="home" class="tab-pane active row  mt-5">
										@foreach ($products as $p)
											<div class="col-md-12 col-12 padding_mobile p-0 m-0 horizontal ">
												<div class="row inner_inner ml-md-3">
													<div class="col-md-5">
														<div class="row">
															<div class="col-md-12 project-item">
																<a class="col-md-12 " href="{{route('front-product-details', ['id' => $p->product->id])}}">
																	<div class="frame">
																		<span class="helper"></span>
																		<img src="{{$p->product->image ?  asset('uploads/products/'.$p->product->image) : asset('uploads/projects/1615154785167836.jpeg')}}" style="max-height:242px;margin-left:-5px" alt="" class="img-fluid imageResize">
																	</div>
																</a>
																{{-- <div class="project_status text-white" >		{{$p->product->subCategory->category->name}}</div> --}}
															</div>
														</div>
													</div>
													<div class="col-md-7 margin_top p-md-0">
														<div class="row ">
															<div class="col-md-7 col-7">
																<h6 class="category-name" style="color:#bfc5cc;">
																	<i class="fa fa-tag"></i>
																	<a href="{{route('front-product-list', ['c' => $p->product->subCategory->category->id])}}">{{ $p->product->subCategory->category->name }}</a>
																</h6>
															</div>
															<div class="col-md-5 col-5">
																<a href="{{route('user-favourite-remove-product', ['id' => $p->product->id])}}" class="pull-right favfont" style="font-size:14px;">
																	<span style="color:#ed49b6;"> <i class="fa fa-heart"></i> </span>
																	お気に入り削除
																</a>
															</div>
														</div>
														<div class="row mt-1">
															<a class="col-md-12 " href="{{route('front-product-details', ['id' => $p->product->id])}}">
																<p style="font-size:20px;" class="font-weight-bold product-title">	{{$p->product->title}}</p>
															</a>
														</div>
														<div class="row mt-1">
															<div class="col-md-12">
																<p style="font-size:12px;">	{{$p->product->description}}</p>
															</div>
														</div>
														<div class="noHover row mt-1">
															<div class="col-md-6">
																<p><span class="font-weight-bold price" style="font-size:23px; letter-spacing:2px;">{{ $p->product->price }}</span>
																	<span class="title" style="font-size:20px; letter-spacing:1px;">ポイント</span>
																</p>
															</div>

															<div class="col-md-6 p-md-0 star">
																<p class=" mt-2"><span class="fa fa-star checked" style="font-size:20px;"></span>
																<span class="fa fa-star checked" style="font-size:20px;"></span>
																<span class="fa fa-star checked" style="font-size:20px;"></span>
																<span class="fa fa-star " style="font-size:20px;"></span>
																<span class="fa fa-star " style="font-size:20px;"></span>
																(3)</p>
															</div>
														</div>

														@if(($user->profile->phonetic) == null ||($user->profile->phonetic2) == null ||($user->profile->phone_no) == null||($user->profile->postal_code) ==null||($user->profile->prefectures) == null||($user->profile->municipility) == null ||($user->first_name) == null ||($user->last_name) == null  )
															<div class="">
																<?php if(count($p->product->color) > 0){?>
																<div class="col-md-offset-2 mr-0 ml-3 div-radius1" style="height:55px; width:auto;">
																	<select name="color" style="font-size:12px; width:auto;" id="" class="pt-2 pb-0 product_options"  required>
																		<option value="" >カラー</option>
																		<?php $colorCount = 0;?>
																		@foreach ($p->product->color as $p_color)
																			<?php if(!empty($p_color->color)){?>
																				<option value="{{$p_color->color}}" style="font-size:12px;">{{$p_color->color}}</option>
																			<?php $colorCount++;}?>
																		@endforeach
																		<?php if($colorCount == 0){?>
																			<option value="なし" style="font-size:12px;">なし</option>
																		<?php }?>
																	</select>
																</div>
																<div class="col-md-offset-2 mr-0 ml-2 div-radius1" style="height:55px; width:auto;">
																	<select name="size" style="font-size:12px; width:auto;"  id="" class="pt-2 pb-0 product_options" required>
																		<option value="" >サイズ</option>
																		<?php $typeCount = 0;?>
																		@foreach ($p->product->color as $p_color)
																			<?php if(!empty($p_color->type)){?>
																				<option value="{{$p_color->type}}" >{{$p_color->type}}</option>
																			<?php $typeCount++;}?>
																		@endforeach
																		<?php if($typeCount == 0){?>
																			<option value="なし" style="font-size:12px;">なし</option>
																		<?php }?>
																	</select>
																</div>
																<?php }?>
																<div class="col-md-offset-6  mr-0 div-radius1 margin_left ml-2" style="height: 65px;">
																	<input type="hidden" name="id" value="{{$p->product->id}}">
																	<input type="hidden" name="price" value="{{$p->product->price}}">
																	<input type="hidden" name="title" value="{{$p->product->title}}">
																	<input type="hidden" name="quantity" class="add_to_cart_quantity form-control" value="1" required placeholder="数量">
																	<button type="" class="px-3 text-white btn btn-lg btn-block addCart cart_font profileModal font-weight-bold w6-18" id="" style="background-color:#ffbc00 !important; height:80%;"> <span class="fa fa-shopping-cart px-1"></span> カートに入れる</button>
																</div>
															</div>
														@else
															<div class="">
																<form class="row" action="{{route('front-cart-add-favourite')}}" method="get">
																	<?php if(count($p->product->color) > 0){?>
																	<div class="col-md-offset-2 mr-0 ml-3 div-radius1" style="height:55px; width:auto;">
																		<select name="color" style="font-size:12px; width:auto;" id="" class="pt-2 pb-0 product_options"  required>
																			<option value="" >カラー</option>
																			<?php $colorCount = 0;?>
																			@foreach ($p->product->color as $p_color)
																				<?php if(!empty($p_color->color)){?>
																					<option value="{{$p_color->color}}" style="font-size:12px;">{{$p_color->color}}</option>
																				<?php $colorCount++;}?>
																			@endforeach
																			<?php if($colorCount == 0){?>
																				<option value="なし" style="font-size:12px;">なし</option>
																			<?php }?>
																		</select>
																	</div>
																	<div class="col-md-offset-2 mr-0 ml-2 div-radius1" style="height:55px; width:auto;">
																		<select name="size" style="font-size:12px; width:auto;"  id="" class="pt-2 pb-0 product_options" required>
																			<option value="" >サイズ</option>
																			<?php $typeCount = 0;?>
																			@foreach ($p->product->color as $p_color)
																				<?php if(!empty($p_color->type)){?>
																					<option value="{{$p_color->type}}" >{{$p_color->type}}</option>
																				<?php $typeCount++;}?>
																			@endforeach
																			<?php if($typeCount == 0){?>
																				<option value="なし" style="font-size:12px;">なし</option>
																			<?php }?>
																		</select>
																	</div>
																	<?php }?>
																	<div class="col-md-offset-6  mr-0 div-radius1 margin_left ml-2" style="height: 65px;">
																		<input type="hidden" name="id" value="{{$p->product->id}}">
																		<input type="hidden" name="price" value="{{$p->product->price}}">
																		<input type="hidden" name="title" value="{{$p->product->title}}">
																		<input type="hidden" name="quantity" class="add_to_cart_quantity form-control" value="1" required placeholder="数量">
																		<button type="submit" class="px-3 addCart text-white btn btn-lg btn-block  cart_font w6-18" id="cart-btn" style="background-color:#ffbc00 !important; height:80%;"> <span class="fa fa-shopping-cart px-1"></span> カートに入れる</button>
																		<input type="hidden" id="check-cart" value="{{ session('cart-success') ? 1 : 0 }}">
																	</div>
																</form>
															</div>
														@endif
													</div>
												</div>
											</div>
										@endforeach
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

@if(($user->profile->phonetic) === null ||($user->profile->phonetic2) === null ||($user->profile->phone_no) === null||($user->profile->postal_code) ===null||($user->profile->prefectures) === null||($user->profile->municipility) === null ||($user->first_name) === null ||($user->last_name) === null  )						
	@include('user.layouts.cart-message');
@endif

@include('user.layouts.profileModal')

@stop

@section('custom_js')
	<script type="text/javascript">
		$('.profileModal').on('click',function(){
			$('#myModal').modal('show');
		});

		$(window).on('load',function(){
			var check_cart = $('#check-cart').val();
			if (check_cart == 1) {
				$('#cart-message').modal('show');
				setTimeout(()=>{
					window.location.href = '{{route('front-cart')}}'
				}, 3000);
			}
		});
	</script>
@stop
