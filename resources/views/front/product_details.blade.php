@extends('main_layout')
@section('title') 
{{$title}}
@stop
@section('custom_css')
	<style type="text/css">
		.wizard > .steps > ul > li {
		    width: 20%;
		}
		.body{

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
			background-color: #f8f8f8;
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
		.bg-white{
			background-color:#fff;
		}
		.content-inner:before{
			display: block;
			height: 2px;
			background-color: #ffbc00;
			content: "";
			width: 100%;
			margin: 0 auto;
			margin-top: 0px;
			margin-bottom: 0px;
		}

		.content-inner-arrow{
			-webkit-clip-path: polygon(0 0, 100% 0, 100% 82%, 51% 100%, 0 82%);
			clip-path: polygon(0 0, 100% 0, 100% 82%, 51% 100%, 0 82%);

		}
		.checked{
			color: #ffbc00;
		}
		.bg-yellow{
			background-color:#ffbc00 !important;
		}
		.breadcrump{
			background-color: #F1F1F1;
		}
		.breadcrump li a{
			color: #000;

		}
		/* .content-inner-arrow:after{
			-webkit-clip-path: polygon(0 0, 100% 0, 100% 82%, 51% 100%, 0 82%);
			clip-path: polygon(0 0, 100% 0, 100% 82%, 51% 100%, 0 82%);
			display: block;
			height: 2px;
			background-color: #81ccff;
			content: "";
			width: 100%;
			margin: 0 auto;
			margin-top: 80px;
			margin-bottom: 0px;

		} */
		/* .arrow-down {
		width: 0;
		height: 0;
		border-left: 20px solid transparent;
		border-right: 20px solid transparent;

		border-top: 20px solid #f00;
		} */

		.product_options{
			height: 55px;
			width: 55px;
			border: 3px solid #eaebed;
			border-radius: 5px;
		}

		@media (max-width: 1365px) {
		}
		@media (max-width: 1265px) {
			.category_favourite{
				font-size:13px!important;
			}
		}
		@media (max-width: 1170px) {
			.category_favourite{
				font-size:12px!important;
			}
		}
		@media (max-width: 1080px) {
			.category_favourite{
				font-size:10px!important;
			}
			.point{
				font-size:18px !important;
			}
			.addCart{
				font-size:18px !important;
			}
		}
		@media (max-width: 980px) {
			.point{
				font-size:16px !important;
			}
			.addCart{
				font-size:13px !important;
			}
			.category_favourite{
				font-size:9px!important;
			}
			.list-inline {
				font-size: 12px;
				padding-left: 0;
				list-style: none;
			}
		}
		@media (max-width: 890px) {
			.category_favourite{
				font-size:8px!important;
			}
			.point{
				font-size:13px !important;
			}
			.addCart{
				font-size:8px !important;
			}
			.list-inline {
				font-size: 12px;
				padding-left: 0;
				list-style: none;
			}
			.buttonFont{
				font-size: 14px;
				padding-top: 1.25rem;
			}
			.reward_extra{
				font-size: 1.25rem;
			}
			.reward_extra_details{
				font-size: .5rem;
			}
			.reward_button{
				font-size: 0.7rem;
			}
			.reward_img{
				height: 117px!important;
			}
			.additional_img{
				height: 101px!important;
			}
		}
		@media (max-width: 790px) {
			.category_favourite{
				font-size:8px!important;
			}
			.point{
				font-size:13px !important;
			}
			.addCart{
				font-size:8px !important;
			}
			.list-inline {
				font-size: 12px;
				padding-left: 0;
				list-style: none;
			}
			.buttonFont{
				font-size: 12px;
				padding-top: 1.25rem;
			}
			.fontsizeday{
				font-size:8px!important;
			}
			.fontsizeper{
				font-size:16px!important;
			}
			.button{
				max-width: 37%;
			}
			.reward_extra{
				font-size: 1rem;
			}
			.reward_extra_details{
				font-size: .5rem;
			}
			.reward_button{
				font-size: 0.55rem;
			}
			.reward_img{
				height: 117px!important;
			}
			.additional_img{
				height: 101px!important;
			}
			.title{
				font-size: 1rem;
			}
			.des{
				font-size: 13px;
			}
		}
		
		@media (max-width: 575.73px) {
			.name_margin{
				margin-top:1rem;
			}
			.message_button{
				width:100%;
			}
		}


		@media (min-width: 1800px){
			.product_img{
				height: 240px;
				width: auto;
			}
		}
		@media (max-width: 1800px){
			.product_img{
				height: 240px;
				width: auto;
			}
		}
		@media (max-width: 1700px){
			.product_img{
				height: 240px;
				width: auto;
			}
		}
		@media (max-width: 1600px){
			.product_img{
				height:240px; width:auto;
			}
		}
		@media (max-width: 1500px){
			.product_img{
				height:240px; width:auto;
			}
		}
		@media (max-width: 1400px){
			.product_img{
				height:240px; width:auto;
			}
		}
		@media (max-width: 1300px){
			.product_img{
				height:225px; width:auto;
			}
			.description_font{
				font-size:11px !important;
			}
		}
		@media (max-width: 1210px){
			.product_img{
				height:215px; width:auto;
			}
			.project_item_footer{
				font-size: 14px;
			}
		}
		@media (max-width: 1160px){
			.product_img{
				height:205px; width:auto;
			}
			.project_item_footer{
				font-size: 13px;
			}
			.description_font{
				font-size:10px !important;
			}
		}
		@media (max-width: 1110px){
			.product_img{
				height:195px; width:auto;
			}
			.project_item_footer{
				font-size: 12px;
			}
		}
		@media (max-width: 1060px){
			.product_img{
				height:183px; width:auto;
			}
			.project_item_footer{
				font-size: 12px;
			}
		}
		@media (max-width: 1010px){
			.product_img{
				height:168px; width:auto;
			}
			.project_item_footer{
				font-size: 10px;
			}
			.description_font{
				font-size:9px !important;
			}
		}
		@media (max-width: 950px){
			.product_img{
				height:180px; width:auto;
			}
			.project_item_footer{
				font-size: 10px;
			}
		}
		@media (max-width: 890px){
			.product_img{
				height:156px; width:auto;
			}
			.project_item_footer{
				font-size: 10px;
			}
		}
		@media (max-width: 830px){
			.product_img{
				height:143px; width:auto;
			}
			.project_item_footer{
				font-size: 10px;
			}
		}
		@media (max-width: 795px){
			.product_img{
				height:127px; width:auto;
			}
			.project_item_footer{
				font-size: 10px;
			}
		}
		@media (max-width: 765px){
			.product_img{
				height:193px; width:auto;
			}
			.project_item_footer{
				font-size: 10px;
			}
		}

		.frame {
			height: 275px;      /* equals max image height */
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
		/* .frame img{
			height: 100%;
			width: 100%;
		} */

	</style>
	<style type="text/css">
		.recommend_area{
			display: inline-block;
		    color: #fff;
		    background-color: #1e7e34;
		    /* border-color: #1c7430; */
		    /* box-shadow: 0 0 0 0.2rem rgba(40,167,69,.5); */
		    padding: 2px 15px;
		}
		.category_favourite > h6 > a:hover {
		/* .link-hover-remove a:hover { */
			text-decoration: none;
		}
		.category_favourite > a:hover {
			text-decoration: none;
		}
		.fornt-weight-bold > a:hover {
			text-decoration: none;
		}
	</style>
@stop


@section('ecommerce')

@stop

@section('content')

{{-- @include('user.layouts.tab') --}}

<div class="row breadcrump p-0 m-0 project_sorting">
	<div class="container">
		<div class="row container_div">
			<div class="col-md-9  col-sm-12">
				<div class="">
					@include('front.layouts.product-details-breadcrump')
				</div>
			</div>
			<div class="col-md-3 col-sm-12">
				<div class="py-3">
					@include('front.layouts.productsearch')
				</div>
			</div>
		</div>
	</div>
</div>



<div class="row bg-white ">
	<div class="container">
		<div class="row container_div justify-content-center">
			<div class=" col-12 project_details_area">
				<div class="">
					<div class="">
						<div class="row inner_inner">
							<div class="col-md-5">
								<div class="row">
									<div class="col-md-12 project-item">
										<div class="frame">
											<span class="helper"></span>
											<img src="{{$product->image ? Request::root().'/uploads/products/'.$product->image : asset('uploads/projects/1615154785167836.jpeg')}}" alt="" style="margin-left:-4px" class=" product_img">
										</div>
									</div>
								</div>
							</div>
							<div class="col-md-7">
								<div class="row ">
									<div class="col-md-8 category_favourite">
										<h6 class="category-name" style="color:#bfc5cc;"> <span style="color:#bfc5cc;"> <i class="fa fa-tag"></i> </span> <a class="link-hover-remove" href="{{route('front-product-list', ['c' => $product->subCategory->category->id])}}">{{$product->subCategory->category->name}}</a></h6>
									</div>
									@php
										$fav = 0;
									@endphp
									@foreach ($product->favourite as $f)
										@if (Auth::check())

										@if ($f->user_id == Auth::user()->id)
											@php
												$fav = 1;
											@endphp
										@endif
									@endif

									@endforeach

									@if(Auth::check())
										@if($product->user_id==Auth::user()->id)
											<div class="col-md-4 col-sm-6 "></div>
										@else
											@if (empty($isFavourite))
												<div class="col-md-4 col-sm-6 category_favourite">
													@if ($fav == 0)
														<a href="{{ route('user-favourite-add-product', $product->id) }}" class="pull-right category_favourite" style="font-size:14px;"><span style="color:#555;"> <i class="fa fa-heart-o"></i> </span> お気に入りに追加</a>
													@else
														<a href="{{ route('user-favourite-remove-product', $product->id) }}" class="pull-right category_favourite" style="font-size:14px;"><span style="color:#ed49b6 "> <i class="fa fa-heart"></i> </span>お気に入り </a>
													@endif
												</div>
											@endif
										@endif
									@else
										<a title="" href="{{route('front-product-details-login', ['id' => $product->id])}}"><span class="pull-right" style="font-size:14px;"><span style="color:#555"> <i class="fa fa-heart-o"></i> </span>お気に入り</span></a>
									@endif
								</div>
								<div class="row mt-1">
									<div class="col-md-12">
										@if($product->is_featured)
											<p class="recommend_area">オススメ!</p>
										@endif
									</div>
									<div class="col-md-12">
										<span style="font-size:18px; letter-spacing:1px;" class="font-weight-bold"> {{ $product->title }}</span>
										{{-- <h5 style="font-size:16px;" class="font-weight-bold"> こに入ります</h5> --}}
									</div>
								</div>
								<div class="row mt-3">
									<div class="col-md-12">
										<span style="font-size:14px" class="description_font">{{ $product->description }}
										</span>
									</div>
								</div>
								<div class="row mt-2">
									<div class="col-md-6">
										<p><span class="font-weight-bold point" style="font-size:23px; letter-spacing:2px;">{!!number_format($product->price)!!}</span>
											<span class="point" style="font-size:20px; letter-spacing:1px;">ポイント</span></p>
									</div>
									<div class="col-md-6 ">
										@php
											$sum = 0;
											$totalCount = $product->ratings->count();
											$total_revs = $product->ratings->count();
											if ($totalCount == 0) {
												$totalCount	= 1;													}
										@endphp
										@foreach ($product->ratings as $p_ratings)
											{{-- {{ $p_ratings->user_rating }}
											{{ $p_ratings->count() }} --}}
											@php
												$sum += $p_ratings->user_rating;
											@endphp
										@endforeach
										{{-- {{ $totalCount }} --}}
										@php
											$avgRating = $sum / $totalCount;
											$gray = 5 - ceil($avgRating);
										@endphp
										@foreach(range(1,5) as $i)

												@if($avgRating >0)
													@if($avgRating >0.75)
														<span class="fa fa-star checked" style="font-size:20px;"></span>
													@else
														<span class="fa fa-star-half-o checked" style="font-size:20px;"></span>
													@endif
												@endif
												@php $avgRating--; @endphp
										@endforeach
										@if($gray > 0)
											@foreach(range(1,$gray) as $i)
												<span class="fa fa-star-o" style="font-size:20px;"></span>
											@endforeach
										@endif
										( {{ $total_revs }} )
										<p class=" mt-2">
											{{--<span class="fa fa-star {{ $avgRating > 1?'checked':'' }}" style="font-size:20px;"></span>
											<span class="fa fa-star-half-o {{ $avgRating >= 2?'checked':'' }}" style="font-size:20px;"></span>
											<span class="fa fa-star {{ $avgRating >= 3?'checked':'' }}" style="font-size:20px;"></span>
											<span class="fa fa-star {{ $avgRating >= 4?'checked':'' }}" style="font-size:20px;"></span>
											<span class="fa fa-star {{ $avgRating >= 5?'checked':'' }}" style="font-size:20px;"></span>--}}
											
											<input type="hidden" id="avgRate" name=""  value="{{ $avgRating }}">
										</p>
									</div>
								</div>
								@if (Auth::check())
									@if(($user->profile->phonetic) == null ||($user->profile->phonetic2) == null ||($user->profile->phone_no) == null||($user->profile->postal_code) ==null||($user->profile->prefectures) == null||($user->profile->municipility) == null ||($user->first_name) == null ||($user->last_name) == null  )
										<div class="row" style="marginleft:0px !important">
											<?php if(count($product->color) > 0){?>
											<div class="col-md-offset-2 mr-0 ml-2" style="height:55px; width:80px;">
												<select name="color" style="font-size:12px; width:70px;" id="" class="pt-0 pb-0 product_options"  required>
													<option value="" >カラー</option>
													<?php $colorCount = 0;?>
													@foreach ($product->color as $p_color)
														<?php if(!empty($p_color->color)){?>
															<option value="{{$p_color->color}}" style="font-size:12px;">{{$p_color->color}}</option>
														<?php $colorCount++;}?>
													@endforeach
													<?php if($colorCount == 0){?>
														<option value="なし" style="font-size:12px;">なし</option>
													<?php }?>
												</select>
											</div>
											<div class="col-md-offset-2 mr-0 ml-2" style="height:55px; width:80px;">
												<select name="size" style="font-size:12px; width:70px;"  id="" class="pt-0 pb-0 product_options" required>
													<option value="" >サイズ</option>
													<?php $typeCount = 0;?>
													@foreach ($product->color as $p_color)
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
											<div class="col-md-offset-6  mr-0 div-radius1 ml-2" style="height: 65px;">
												<input type="hidden" name="id" value="{{$product->id}}">
												<input type="hidden" name="price" value="{{$product->price}}">
												<input type="hidden" name="title" value="{{$product->title}}">
												<input type="hidden" name="quantity" class="add_to_cart_quantity form-control" value="1" required placeholder="数量">
												<button type="" class="px-3 text-white btn btn-lg btn-block addCart  profileModal w6-18" id="" style="background-color:#ffbc00 !important; height:80%;cursor: pointer;"> <span class="fa fa-shopping-cart px-1"></span> カートに入れる</button>
											</div>
										</div>
									@else
										@if($product->user_id == Auth::user()->id)
											<div class="row"style="margin-left:0px">
												<?php if(count($product->color) > 0){?>
												<div class="col-md-offset-2 mr-0 ml-2" style="height:55px; width:80px;">
													<select name="color" style="font-size:12px; width:70px;" id="" class="pt-0 pb-0 product_options"  required>
														<option value="" >カラー</option>
														<?php $colorCount = 0;?>
														@foreach ($product->color as $p_color)
															<?php if(!empty($p_color->color)){?>
																<option value="{{$p_color->color}}" style="font-size:12px;">{{$p_color->color}}</option>
															<?php $colorCount++;}?>
														@endforeach
														<?php if($colorCount == 0){?>
															<option value="なし" style="font-size:12px;">なし</option>
														<?php }?>
													</select>
												</div>
												<div class="col-md-offset-2 mr-0 ml-2" style="height:55px; width:80px;">
													<select name="size" style="font-size:12px; width:70px;"  id="" class="pt-0 pb-0 product_options" required>
														<option value="" >サイズ</option>
														<?php $typeCount = 0;?>
														@foreach ($product->color as $p_color)
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
												<div class="col-md-offset-6  mr-0 div-radius1 ml-2" style="height: 65px;">
													<input type="hidden" name="id" value="{{$product->id}}">
													<input type="hidden" name="price" value="{{$product->price}}">
													<input type="hidden" name="title" value="{{$product->title}}">
													<input type="hidden" name="quantity" class="add_to_cart_quantity form-control" value="1" required placeholder="数量">
													<button type="" class="px-3 text-white addCart btn btn-lg btn-block w6-18" id="" style="background-color:#cccccc !important; height:80%;cursor: pointer;"> <span class="fa fa-shopping-cart px-1"></span> カートに入れる</button>
												</div>
											</div>
										@else
											<div class="row"style="margin-left:0px" >
												<form class="row" style="margin-left:-10px !important" action="{{route('front-cart-add')}}" method="get">
													<?php if(count($product->color) > 0){?>
													<div class="col-md-offset-2 mr-0 ml-2" style="height:55px; width:80px;">
														<select name="color" style="font-size:12px; width:70px;" id="" class="pt-0 pb-0 product_options"  required>
															<option value="" >カラー</option>
															<?php $colorCount = 0;?>
															@foreach ($product->color as $p_color)
																<?php if(!empty($p_color->color)){?>
																	<option value="{{$p_color->color}}" style="font-size:12px;">{{$p_color->color}}</option>
																<?php $colorCount++;}?>
															@endforeach
															<?php if($colorCount == 0){?>
																<option value="なし" style="font-size:12px;">なし</option>
															<?php }?>
														</select>
													</div>
													<div class="col-md-offset-2 mr-0 ml-2" style="height:55px; width:80px;">
														<select name="size" style="font-size:12px; width:70px;"  id="" class="pt-0 pb-0 product_options" required>
															<option value="" >サイズ</option>
															<?php $typeCount = 0;?>
															@foreach ($product->color as $p_color)
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
													<div class="col-md-offset-6  mr-0 div-radius1 ml-2" style="height: 65px;">
														<input type="hidden" name="id" value="{{$product->id}}">
														<input type="hidden" name="price" value="{{$product->price}}">
														<input type="hidden" name="title" value="{{$product->title}}">
														<input type="hidden" name="quantity" class="add_to_cart_quantity form-control" value="1" required placeholder="数量">
														<button type="submit" class="px-3 addCart text-white btn btn-lg btn-block w6-18 btn-warning" id="cart-btn" style="height:80%;cursor: pointer;"> <span class="fa fa-shopping-cart px-1"></span> カートに入れる</button>
														<input type="hidden" id="check-cart" value="{{ session('cart-success') ? 1 : 0 }}">
													</div>
												</form>
											</div>
										@endif
									@endif
								@else
									<div class="row" style="margin-left:0px">
										<form class="row" style="margin-left:-5px!important" action="{{route('front-product-details-login', ['id' => $product->id])}}" method="get">
											<?php if(count($product->color) > 0){?>
											<div class="col-md-offset-2 mr-0 ml-2" style="height:55px; width:80px;">
												<select name="color" style="font-size:12px; width:70px;" id="" class="pt-0 pb-0 product_options"  required>
													<option value="" >カラー</option>
													<?php $colorCount = 0;?>
													@foreach ($product->color as $p_color)
														<?php if(!empty($p_color->color)){?>
															<option value="{{$p_color->color}}" style="font-size:12px;">{{$p_color->color}}</option>
														<?php $colorCount++;}?>
													@endforeach
													<?php if($colorCount == 0){?>
														<option value="なし" style="font-size:12px;">なし</option>
													<?php }?>
												</select>
											</div>
											<div class="col-md-offset-2 mr-0 ml-2" style="height:55px; width:80px;">
												<select name="size" style="font-size:12px; width:70px;"  id="" class="pt-0 pb-0 product_options" required>
													<option value="" >サイズ</option>
													<?php $typeCount = 0;?>
													@foreach ($product->color as $p_color)
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
											<div class="col-md-offset-6  mr-0 div-radius1 ml-2" style="height: 65px;">
												<input type="hidden" name="id" value="{{$product->id}}">
												<input type="hidden" name="price" value="{{$product->price}}">
												<input type="hidden" name="title" value="{{$product->title}}">
												<button type="submit" class="px-3 text-white btn btn-lg btn-block addCart w6-18 btn-warning" id="cart-btn" style="background-color:#ffbc00 !important; height:80%;cursor: pointer;"> <span class="fa fa-shopping-cart px-1"></span> カートに入れる</button>
											</div>
										</form>
									</div>
								@endif

								<div class="row">
									<div class="ml-md-3" id="shareIcons"></div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
	
	@if (Auth::check())
		@if(($user->profile->phonetic) === null ||($user->profile->phonetic2) === null ||($user->profile->phone_no) === null||($user->profile->postal_code) ===null||($user->profile->prefectures) === null||($user->profile->municipility) === null ||($user->first_name) === null ||($user->last_name) === null  )						
			@include('user.layouts.cart-message');
		@endif
	@endif
	
	@if (Auth::check())
		@include('user.layouts.message_modal')
	@endif

	@include('front.layouts.301')
	@include('user.layouts.profileModal')

@stop

@section('custom_js')
	<script type="text/javascript">
			$(document).ready(function(){
				$('.msg_send_btn').on('click', function(e){
					var user_id = $(this).attr('data-user_id');
					var user_name = $(this).attr('data-project_username');
					var company_name = $(this).attr('data-product_company_name');


					$('#to_id').val(user_id);
					$('#project_user_name').html(user_name);
					$('#get_vendor_name').html('宛先 : ' + ' ' + company_name);

					$('#send-message').modal('show');
					//$('#send-message').addClass('show');
				});
			});
	</script>
	<script type="text/javascript">
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
	<script type="text/javascript">
		$('.profileModal').on('click',function(){
			console.log('hello')
			// var check_cart = $('#check-cart').val();
			// 	if (check_cart == 1) {
					$('#myModal').modal('show');
				// }
		});
	</script>
	{{-- <script type="text/javascript">
			$(function() {
				var linkurl  = $('#linkUrl').val();
				$('#shareIcons').jsSocials({
					url : linkurl,
					text : 'laravel for social sharing',
					showLabel : true,
					showCount : false,
					shareIn : "popup",
					shares : ["facebook", "twitter", "line"]
				});
			});
	</script> --}}
@stop
