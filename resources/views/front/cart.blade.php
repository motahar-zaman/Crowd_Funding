@extends('main_layout')
@section('title') 
カート | Crofun
@stop
@section('custom_css')
	<style type="text/css">
		.wizard > .steps > ul > li {
		    width: 19.5%;
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
		.hide{
			display: none;
		}
		.actions{
			text-align: center !important;
		}
		.page_title_product_register{
			padding-top: 10px;
			padding-bottom: 10px;
			font-size: 25px;
		}
		/*steps start*/
		.wizard>.steps .number{
			display: none !important;
		}
		.wizard>.steps .steptext{
			font-size: 18px;
			text-transform: uppercase;
		}
		.wizard>.steps .stepcount{
			font-size: 22px;
			font-weight: bold;
		}
		.wizard>.steps .stepinfo{
			font-size: 18px;
			display: block;
		}
		.wizard>.steps a, .wizard>.steps a:hover, .wizard>.steps a:active{
			padding: 15px;
		    padding-top: 5px;
		    padding-bottom: 5px;
		    border-radius: 0px;
		    position: relative;
		}
		.wizard>.steps .current a, .wizard>.steps .current a:hover, .wizard>.steps .current a:active{
			background-color: #ffbc00;
			padding-left: 42px;
			margin-left: -8px;
		}
		.wizard>.steps .current a:after{
			content: '';
		    background: #ffbc00;
		    height: 50px;
		    width: 50px;
		    position: absolute;
		    top: 10px;
		    right: -24px;
		    transform: rotate(45deg);
		    z-index: 9;
		}
		.wizard>.steps .disabled a, .wizard>.steps .disabled a:hover, .wizard>.steps .disabled a:active, .wizard>.steps .done a, .wizard>.steps .done a:hover, .wizard>.steps .done a:active{
			margin-left: -8px;
			padding-left: 42px;
			border: 2px solid #ffbc00;
			background-color: #ffffff;
			padding-top: 3px;
    		padding-bottom: 3px;
    		position: relative;
    		border-right: none;
    		/* border-left: none; */
		}
		.wizard>.steps .done a, .wizard>.steps .done a:hover, .wizard>.steps .done a:active{
			margin-left: -8px;
			border-left: 2px solid #ffbc00;
			color: #aaaaaa;
		}
		.wizard>.steps .disabled a:after, .wizard>.steps .done a:after{
			content: '';
		    border-top: 2px solid #ffbc00;
		    border-right: 2px solid #ffbc00;
		    height: 50px;
		    width: 50px;
		    position: absolute;
		    top: 8.9px;
		    right: -24px;
		    transform: rotate(45deg);
		    z-index: 9;
		    background-color: #ffffff;
		}
		.wizard>.steps ul li:first-child a{
			margin-left: 0px !important;
		}
		.wizard>.steps ul{
			margin-left: 0% !important;
			margin-top: 0px !important;
		}
		.wizard > .steps > ul > li{
			/* width: 16.4%; */
		}

		.breadcrump {
			background-color: #F1F1F1;
		}

		@media (max-width: 575.98px) {
			.wizard > .steps > ul > li{
		        width: 93% !important;
		    }
		    .wizard>.steps a, .wizard>.steps a:hover, .wizard>.steps a:active{
		        border-left: 2px solid #FFBC00 !important;
		        margin-left: 0px !important;
		    }
		    .wizard>.steps ul{
		    	margin-left: 0px !important;
		    }
		}

		@media (max-width: 1300px) {
			.wizard>.steps .stepinfo{
				font-size: 14px;
				display: block;
			}
			.wizard>.steps .disabled a:after, .wizard>.steps .done a:after{
				content: '';
				border-top: 2px solid #ffbc00;
				border-right: 2px solid #ffbc00;
				height: 43px;
				width: 45px;
				position: absolute;
				top: 8.9px;
				right: -24px;
				transform: rotate(45deg);
				z-index: 9;
				background-color: #ffffff;
			}
			.wizard>.steps .current a:after {
				content: '';
				background: #ffbc00;
				height: 43px;
				width: 45px;
				position: absolute;
				top: 10px;
				right: -24px;
				transform: rotate(45deg);
				z-index: 9;
			}
		}
		@media (max-width: 1200px) {
			.wizard>.steps .stepinfo{
				font-size: 10px;
				display: block;
			}
			.wizard>.steps .disabled a:after, .wizard>.steps .done a:after{
				content: '';
				border-top: 2px solid #ffbc00;
				border-right: 2px solid #ffbc00;
				height: 41px;
				width: 41px;
				position: absolute;
				top: 6.9px;
				right: -20px;
				transform: rotate(48deg);
				z-index: 9;
				background-color: #ffffff;
			}
			.wizard>.steps .current a:after {
				content: '';
				background: #ffbc00;
				height: 41px;
				width: 41px;
				position: absolute;
				top: 7px;
				right: -20px;
				transform: rotate(48deg);
				z-index: 9;
			}
		}
		@media (max-width: 1100px) {
			.wizard>.steps .stepinfo{
				font-size: 10px;
				display: block;
			}
			.wizard>.steps .disabled a:after, .wizard>.steps .done a:after{
				content: '';
				border-top: 2px solid #ffbc00;
				border-right: 2px solid #ffbc00;
				height: 36px;
				width: 36px;
				position: absolute;
				top: 5.9px;
				right: -19px;
				transform: rotate(45deg);
				z-index: 9;
				background-color: #ffffff;
			}
			.wizard>.steps .current a:after {
				content: '';
				background: #ffbc00;
				height: 36px;
				width: 36px;
				position: absolute;
				top: 6px;
				right: -19px;
				transform: rotate(45deg);
				z-index: 9;
			}
			.wizard>.steps .stepcount {
				font-size: 18px;
				font-weight: bold;
			}
			.wizard>.steps .steptext {
				font-size: 16px;
				text-transform: uppercase;
			}
			.page_title_product_register {
				padding-top: 10px;
				padding-bottom: 10px;
				font-size: 23px;
			}
			.table-style{
				font-size:11px;
			}
		}
		@media (max-width: 1000px) {
			.page_title_product_register {
				padding-top: 10px;
				padding-bottom: 10px;
				font-size: 22px;
			}
			.wizard>.steps .stepinfo{
				font-size: 8px;
				display: block;
			}
			.wizard>.steps .disabled a:after, .wizard>.steps .done a:after{
				content: '';
				border-top: 2px solid #ffbc00;
				border-right: 2px solid #ffbc00;
				height: 32px;
				width: 32px;
				position: absolute;
				top: 4.9px;
				right: -16px;
				transform: rotate(45deg);
				z-index: 9;
				background-color: #ffffff;
			}
			.wizard>.steps .current a:after {
				content: '';
				background: #ffbc00;
				height: 32px;
				width: 32px;
				position: absolute;
				top: 5px;
				right: -16px;
				transform: rotate(45deg);
				z-index: 9;
			}
			.wizard>.steps .stepcount {
				font-size: 16px;
				font-weight: bold;
			}
			.wizard>.steps .steptext {
				font-size: 14px;
				text-transform: uppercase;
			}
			
		}
		@media (max-width: 900px) {
			.page_title_product_register {
				padding-top: 10px;
				padding-bottom: 10px;
				font-size: 21px;
			}
			.wizard>.steps .stepinfo{
				font-size: 7px;
				display: block;
			}
			.wizard>.steps .disabled a:after, .wizard>.steps .done a:after{
				content: '';
				border-top: 2px solid #ffbc00;
				border-right: 2px solid #ffbc00;
				height: 30px;
				width: 30px;
				position: absolute;
				top: 4.9px;
				right: -15px;
				transform: rotate(45deg);
				z-index: 9;
				background-color: #ffffff;
			}
			.wizard>.steps .current a:after {
				content: '';
				background: #ffbc00;
				height: 30px;
				width: 30px;
				position: absolute;
				top: 7px;
				right: -18px;
				transform: rotate(45deg);
				z-index: 9;
			}
			.wizard>.steps .stepcount {
				font-size: 16px;
				font-weight: bold;
			}
			.wizard>.steps .steptext {
				font-size: 14px;
				text-transform: uppercase;
			}
			.wizard>.steps .current a, .wizard>.steps .current a:hover, .wizard>.steps .current a:active{
				background-color: #ffbc00;
				padding-left: 37px;
				margin-left: -8px;
			}
			.wizard>.steps .disabled a, .wizard>.steps .disabled a:hover, .wizard>.steps .disabled a:active, .wizard>.steps .done a, .wizard>.steps .done a:hover, .wizard>.steps .done a:active{
				margin-left: -8px;
				padding-left: 34px;
				border: 2px solid #ffbc00;
				background-color: #ffffff;
				padding-top: 3px;
				padding-bottom: 3px;
				position: relative;
				border-right: none;
				/* border-left: none; */
			}
		}

		.padding-table{
			padding-top:1.25rem !important;
		}
	</style>
@stop
@section('ecommerce')
@stop
@section('content')

<div class="row breadcrump p-0 m-0 project_sorting">
	<div class="row container_div">
		<div class="col-md-12 col-12">
			@if(Cart::count()==1)
				@foreach(Cart::content() as $p)
					@php
						$product = App\Models\Product::find($p->id)
					@endphp
					<ul class="list-inline project_category_data pt-4">
						<li class="list-inline-item">TOP ＞  <a style="color:#292b2c" href="{{route('front-product-list')}}">カタログ一覧</a> ＞ <a style="color:#292b2c" href="{{route('front-product-list', ['c' => $product->subCategory->category->id])}}">{{ $product->subCategory->category->name }}</a> ＞ <a style="color:#292b2c" href="{{route('front-product-details', ['id' => $product->id])}}">{{ $product->title }}</a> </li>
					</ul>
				@endforeach
			@else
				<ul class="list-inline project_category_data pt-4"></ul>
			@endif
		</div>
	</div>
</div>

<div class="container" id="new-project">
	<div class="card commonError hide offset-md-1 mt-3">
		<h4 class='p-3' style="color:red;">正しく入力されてない項目があります。メッセージをご確認の上、もう一度入力ください。</h4>
	</div>
	@if (session('error_message'))
		<div class="mt-5">
			<div class="row justify-content-center">
				<div class="col-md-11">
					 <h4 class="bg-info text-danger p-4">{{ session('error_message') }}</h4>
				</div>
			</div>
		</div>
	@endif
	@if(Cart::count() <= 0 && $finish == false)
		<div class="text-center">
			<h3 style="font-weight:bold; margin-top:60px; color: black;"> カートに商品はありません </h3>
		</div>
	@else
		<div class="mt20">
			<div class="row justify-content-center container_div">
				<div class="col-md-12">
					<form id="example-form" action="{{route('user-product-purchase')}}" class="mt20" method="post" enctype="multipart/form-data">
						{{ csrf_field() }}
						<div class="mt20">
							<h3 class="step_title_area">
								<span class="steptext">Step</span>
								<span class="stepcount">1</span>
								<span class="stepinfo">商品情報確認</span>
							</h3>
							<section class="mt-3">
								<div class="col-md-12 p-0 mb-4">
									<div class="row ">
										<h5 class="col-md-12  font-weight-bold ">商品情報確認</h5>
									</div>
									<div class="row justify-content-center mt-5">
										<div class="mt20 table col-md-12 text-nowrap " style="overflow-x:auto;overflow-y: hidden">
											<table class="table table-sm " id="data-table">
												<tr class="bg-dark table-style" >
													<th class="text-center" style="width:300px;">商品名</th>
													<th class="text-center" colspan="2">数量</th>
													<th class="text-center" colspan="2" style="width:200px;">必要ポイント</th>
													<th class="text-center" style="width:50px;"></th>
												</tr>
												<input type="hidden" id="checkCart" value="{{ !Cart::content()->isEmpty() ? 1:0 }}">

													@foreach(Cart::content() as $p)
														@php
															$product = App\Models\Product::find($p->id)
														@endphp
														<tr class="">
															<td style="" class="" style="width:300px;">
																<div class="d-flex flex-row">
																	{{ $product->title }} <br>
																	@if(!empty($p->options['size']) && !empty($p->options['color']))
																	{{$p->options['size']}}/{{$p->options['color']}}
																	@endif
																	<br>
																	{{ $p->price }} ポイント
																</div>
															</td>
															<td class="text-center" colspan="2">
																<div class="d-flex flex-row padding-table justify-content-center">
																	<button class="px-3 py-1 align-self-end border text-center bg-light decrease_btn" data-rowid="{{ $p->rowId }} " data-price="{{ $p->price }}">-</button>
																		<input type="hidden" name="row_id" value="{{$p->rowId}}">
																		<input type="text" class="px-1 py-1 qty border align-self-start text-center cart_qty_{{ $p->rowId }}" name="quantity" value="{{ $p->qty }}" style="width:50px;">
																	<button class="px-3 py-1 align-self-end border text-center bg-light increase_btn" data-rowid="{{ $p->rowId }}" data-price="{{ $p->price }}">+</button>
																</div>
															</td>

															<td text-align="center" class="text-center" style="width:200px;" colspan="2">
																<div class="padding-table">
																	<h4>
																		<span class="setPrice_{{ $p->rowId }} price" style="letter-spacing:1px;">
																			{{ $p->qty*$p->price }}
																		</span>
																	</h4>
																</div>
															</td>
															<td style="width:50px;">
																<div class="d-flex flex-row padding-table justify-content-center">
																	<a href="{{route('front-cart-remove', ['id' => $p->rowId])}}" class="pull-right text-danger">
																		<i class="fa fa-trash"></i>
																	</a>
																</div>
															</td>
														</tr>
													@endforeach
												@if(Cart::count()>0)
													<tr class="">
														<td class=" text-center" style="width:300px;"> </td>
														<td colspan="2" class="text-center">
															<div class="col-md-12 row">
																<div class="col-md-6 col-sm-6 text-right">合計数</div>
																<div class="col-md-6 col-sm-6" style="padding-left:7px">
																	<h5 class="text-left  totalQty" style="font-size:18px">{{Cart::count()}}</h5>
																</div>
															</div>
														</td>
														<td class="text-center" colspan="2" style="width:200px;">
															<div class="col-md-12 row">
																<div class="col-md-6 col-sm-6 text-right">合計ポイント</div>
																<div class="col-md-6 col-sm-6 pl-2">
																	<h5 class="text-danger text-left  totalPrice"></h5>
																</div>
															</div>
														</td>
														<td style="width:50px;" class="text-center"> </td>
													</tr>
												@endif
											</table>
										</div>
									</div>
								</div>
							</section>

							<h3 class="step_title_area">
								<span class="steptext">Step</span>
								<span class="stepcount">2</span>
								<span class="stepinfo">配送先情報入力</span>
							</h3>
							<section class="mt-3">
								<div class="col-md-12 p-0 mb-4">
									<div class="row ">
										<h5 class="col-md-12  font-weight-bold ">配送先情報入力</h5>
									</div>
									<div class="row">
										<div class="col-md-10 ml-md-3">
											<div class="form-check">
												<label class="form-check-label check-first  pt-3">
													<input type="radio" class="form-check-input checkDefault" name="optradio" value="1" checked>
														登録されている住所
														<br> {{ $user->first_name }} {{ $user->last_name }} ({{ $user->profile->phonetic }} {{ $user->profile->phonetic2 }})<br>
														{{ $user->shipping_postal_code }} <br>
														{{ $user->shipping_prefecture }} <br>
														{{ $user->shipping_municipility }} <br>
														{{ $user->shipping_address }}    <br>
														{{ $user->shipping_room_num }} <br>
														{{ $user->profile->phone_no }}
												</label>
												</div>
											</div>
										</div>
								</div>
								<div class="col-md-12 ">
									<div class="row bg-light-yellow">
										<div class="col-12">
											<div class="form-check pt-3 pb-3">
												<label class="form-check-label check-first  pt-3">
													<input type="radio" class="form-check-input checkDefault" name="optradio" value="2">
												新しい送付先
												</label>
											</div>
										</div>
										<div class="col-12 customAddress">
											<div class="row inner_inner  pl-5 ml-2 pb-4">
												<div class="col-md-9">
													<div class="row border">
														<div class="col-md-3 col-3 bg-dark">
															<p class="pt-3 ">氏名</p>
														</div>
														<div class="col-md-9 col-9 bg-white">
															<div class="row pt-2">
																<div class="col-md-3 col-3 p-0 ml-5">
																	<input type="text" class="form-control fname" id="" placeholder=" 姓" value="" name="first_name" required>
																</div>
																<div class="col-md-3 col-3 p-0 m-0">
																	<input type="text" class="form-control mx-1 lname" id="" placeholder="名" value="" name="last_name" required>
																</div>
															</div>
														</div>
													</div>

													<div class="row border">
														<div class="col-md-3 col-3 bg-dark">
															<p class="pt-3 ">フリガナ</p>
														</div>
														<div class="col-md-9 col-9 bg-white">
															<div class="row pt-2">
																<div class="col-md-3 col-3 p-0 ml-5">
																	<input type="text" class="form-control p1" id="" placeholder="セイ" value="" name="first_name_1">
																</div>
																<div class="col-md-3 col-3 p-0 m-0">
																	<input type="text" class="form-control mx-1 p2" id="" placeholder="メイ" value="" name="last_name_1">
																</div>
															</div>
														</div>
													</div>
													<div class="row border">
														<div class="col-md-3 col-3 bg-dark">
															<p class="pt-3 ">住所</p>
														</div>
														<div class="col-md-9 col-9 bg-white">
															<div class="row pt-2">
																<div class="col-md-6 col-6 p-0 ml-5">
																	<input type="number" class="form-control postal"  id="" placeholder="郵便番号" name="postal_code" value="">
																	@if ($errors->has('postal_code'))
																		<span class="help-block text-danger">
																			<strong>{{ $errors->first('postal_code') }}</strong>
																		</span>
																	@endif
																</div>
															</div>
															<div class="row pt-2">
																<div class="col-md-4 col-4 p-0 ml-5">
																		@include('user.layouts.prefectures')
																		@if ($errors->has('division'))
																			<span class="help-block text-danger">
																				<strong>{{ $errors->first('division') }}</strong>
																			</span>
																		@endif
																</div>
															</div>
															<div class="row pt-2">
																<div class="col-md-6 col-6 p-0 ml-5">
																	<input type="text" class="form-control municipility" id="" placeholder="市区町村" name="municipility" value="">
																	@if ($errors->has('address'))
																		<span class="help-block text-danger">
																			<strong>{{ $errors->first('address') }}</strong>
																		</span>
																	@endif
																</div>
															</div>
															<div class="row pt-2">
																<div class="col-md-6 col-6 p-0 ml-5">
																	<input type="text" class="form-control address" id="" placeholder="それ以降の住所" name="address" value="">
																	@if ($errors->has('address'))
																		<span class="help-block text-danger">
																			<strong>{{ $errors->first('address') }}</strong>
																		</span>
																	@endif
																</div>
															</div>
															<div class="row pt-2 pb-2">
																<div class="col-md-6 col-6 p-0 ml-5">
																	<input type="text" class="form-control room room_no" id="" placeholder="マンション名・部屋番号" name="room_no" value="">
																	@if ($errors->has('room_no'))
																		<span class="help-block text-danger">
																			<strong>{{ $errors->first('room_no') }}</strong>
																		</span>
																	@endif
																</div>
															</div>
														</div>
													</div>
													<div class="row border">
														<div class="col-md-3 col-3 bg-dark">
															<p class="pt-3 ">電話番号</p>
														</div>
														<div class="col-md-9 col-9 bg-white">
															<div class="row pt-2">
																<div class="col-md-6 col-6 p-0 ml-5">
																	<input type="text" class="form-control phone" id="" placeholder="(例)09012341234" value="" name="phone_num">
																</div>
															</div>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
								<div class="col-md-12 mt-4 p-0">
									<h6 style="color:red;">
										※こちらの商品はお届け指定日ができません
									</h6>
									<h6 style="color:red;">
										※送料はいただいておりません
									</h6>
								</div>
							</section>

							<h3 class="step_title_area">
								<span class="steptext">Step</span>
								<span class="stepcount">3</span>
								<span class="stepinfo">支払情報入力</span>
							</h3>
							<section class="mt-3">
								<div class="col-md-12 p-0 mb-4">
									<div class="row justify-content-center">
										<div class="col-md-12 ">
											<h5 class=" font-weight-bold ">支払情報入力</h5>
										</div>
									</div>
									<div class="row justify-content-center">
										<div class="col-md-12 offset-md-1">
											<div class="form-check pt-3 pb-3">
												<label class="form-check-label">
													<input type="radio" class="form-check-input" name="optradio2" checked> ポイント払い
												</label>
											</div>
										</div>
									</div>
									<div class="row justify-content-center">
										<div class="col-md-12 offset-md-2">
											<table>
												<tr>
													<th class="px-3 pb-2">ポイント残高</th>
													<th class="userPoint"  data-point = "{{ Auth::user()->point }}"> {{ Auth::user()->point }} ポイント</th>
												</tr>
												<tr>
													<th class="px-3 py-2">支払ポイント</th> <th class="paymentPoint"> {{Cart::subtotal()}} ポイント</th>
												</tr>
												<tr>
													<th class="px-3 py-2 hide" id="positive">購入後ポイント</th>
													<th class="px-3 py-2 hide" id="negative">不足ポイント</th>
													<th class="restPoint"> </th>
												</tr>
											</table>
										</div>
									</div>
								</div>
							</section>

							<h3 class="step_title_area">
								<span class="steptext">Step</span>
								<span class="stepcount">4</span>
								<span class="stepinfo">入力情報確認</span>
							</h3>
							<section class="mt-3">
								<div class="col-md-12 p-0 mb-4">
									<div class="row ">
										<h5 class="col-md-12  font-weight-bold ">入力情報確認</h5>
									</div>

									<div class="row mt-5">
										<h4 class="ml-md-3">商品情報</h4>

										<div class="col-md-12">
											<table class="table">
												<tr class="bg-dark">
													<th class="text-center">商品名</th>
													<th class="text-center ml-1" >数量</th>
													<th class="text-center ml-1"colspan="2">必要ポイント</th>
												</tr>

												@foreach(Cart::content() as $p)
													@php
														$product = App\Models\Product::find($p->id)
													@endphp
													<tr>
														<td style="" class="">
															<div class="d-flex flex-row">
																<img src="{{ $product->image ?  asset('uploads/products/'.$product->image) : asset('uploads/projects/1615154785167836.jpeg')}}" alt=""  width="200px" height="150px;">
																<span class="px-2">
																	{{ $product->title }} <br>
																	@if(!empty($p->options['size']) && !empty($p->options['color']))
																	{{$p->options['size']}}/{{$p->options['color']}}
																	@endif
																	<br> {{ $p->price }} ポイント
																</span>
															</div>
														</td>
														<td class="text-center ml-1" >
															<div class="d-flex flex-row pt-5 justify-content-center">
																<input type="hidden" name="row_id" value="{{$p->rowId}}">
																<h4 name="quantity" class="align-self-start text-center cart_qty_{{ $p->rowId }}" style="letter-spacing:1px;"> {{ $p->qty }} </h4>
															</div>
														</td>
														<td colspan="2" text-align="center" class="text-center ml-1">
															<div class="pt-5">
																<h4 class="setPrice_{{ $p->rowId }}" style="letter-spacing:1px;"> {{ $p->qty*$p->price }} </h4>
															</div>
														</td>
													</tr>
												@endforeach
												<tr class="">
													<td class=" text-center">合計数 </td>
													<td colspan="2"  class="text-center"><h5 class="totalQty">{{Cart::count()}}</h5></td>
													<td class="text-center"> <h5 class="text-danger totalPrice">{{Cart::subtotal()}} P</h5></td>
												</tr>
											</table>
										</div>
									</div>
								</div>
								<div class="col-md-12 pt-1">
									<div class="row">
										<span>配送先</span>
										<div class="col-12  border p-2">
											<div class="row inner_inner  pl-0 ml-2 pb-4">
												<div class="col-md-12">
													<div class="row ">
														<div class="col-md-12 defaultAddress">
															<span><br>
																{{ $user->first_name }} {{ $user->last_name }} ({{ $user->profile->phonetic }} {{ $user->profile->phonetic2 }})<br>
																{{ $user->shipping_postal_code }} <br>
																{{ $user->shipping_prefecture }} <br>
																{{ $user->shipping_municipility }} <br>
																{{ $user->shipping_address }}    <br>
																{{ $user->shipping_room_num }} <br>
																{{ $user->profile->phone_no }}
															</span>
														</div>
													</div>
												</div>
												<div class="col-md-12 setAddress hide">
													<div class="row ">
														<div class="col-md-12">
															<span>
																<span class="set_first_name"></span> <span class="set_last_name"></span>
																( <span class="set_phonetic1"></span> <span class="set_phonetic2"></span> )
																<br>
																<span class="set_postal_code"></span>  <br>
																<span class="set_prefecture"></span>
																<br>
																<span class="set_municipility"></span>  <br>
																<span class="set_address"></span> <br>
																<span class="set_room"></span>  <br>
																<span class="set_phone_no"></span>
															</span>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
								<div class="col-md-12 pt-3">
									<div class="row">
										<span class="p-0 col-12">支払情報</span> <br>
										<span class="p-0 col-12">ポイント払い</span>
										<div class="col-12  border p-2">
											<div class="row inner_inner">
												<div class="col-md-12 ">
													<table>
														<tr>
															<th class="px-3 pb-2">ポイント残高</th>
															<th class="userPoint"  data-point = "{{ Auth::user()->point }}"> {{ Auth::user()->point }} ポイント</th>
														</tr>
														<tr>
															<th class="px-3 py-2">支払ポイント</th> <th class="paymentPoint"> {{Cart::subtotal()}} ポイント</th>
														</tr>
														<tr>
															<th class="px-3 py-2 hide" id="pre-positive">購入後ポイント</th>
															<th class="px-3 py-2 hide" id="pre-negative">不足ポイント</th>
															<th class="restPoint"> </th>
														</tr>
													</table>
												</div>
											</div>
										</div>
									</div>
								</div>
								<div class="col-md-12 mt-5">
									<div class="row justify-content-center">
										<div class="col-8 mb-5">
											<div class="text-center form-check">
												<span><input type="checkbox" class="form-check-input" id="exampleCheck1" value="1">
												<label class="form-check-label" for="exampleCheck1"><a href="{{route('front-terms')}}">利用規約</a>に同意</label>
												</span>
											</div>
										</div>
									</div>
								</div>
							</section>

							<h3 class="step_title_area">
								<span class="steptext">Step</span>
								<span class="stepcount">5</span>
								<span class="stepinfo">完了</span>
							</h3>
							<section>
								<div class="row justify-content-center">
									<div class="mt-5 col-md-12">
										<div class="">
											<h5 class="text-yellow font-weight-bold text-center">商品の購入が完了しました。</h5>
										</div>
									</div>
									<div class="mt-5 col-md-12">
										<div class="">
											<h6 class="font-weight-bold text-center">
												商品のご購入ありがとうございました。<br>
												お手元に届くまでもうしばらくお待ちください。
											</h6>
										</div>
									</div>
									<div class="col-md-12 text-center ">
										<a href="{{route('user-purchase-list')}}" class="text-center btn" style="background-color: #C6C6C6;color:#ffffff; margin-top: 30px;">< 戻 る</a>
									</div>
								</div>
							</section>

						</div>
					</form>
				</div>
			</div>
		</div>
	@endif
</div>

@stop

@section('custom_js')
	<script src="{{Request::root()}}/ckeditor/ckeditor.js"></script>
	<script type="text/javascript" src="{{Request::root()}}/js/jquery.validate.min.js"></script>

	<script type="text/javascript">
		$(window).on('load',function(){
			var price = $(".price");
			var	totalPrice = 0;
			for(var i = 0; i < price.length; i++){
				totalPrice += parseFloat($(price[i]).html());
			}
			$('.totalPrice').html(totalPrice + ' ' + 'P');
		});

		$(document).ready(function(){
			$(document).on('click', '.increase_btn', function(e){
				var row_id = $(this).attr("data-rowid");
				var price = $(this).attr("data-price");
				var qty = parseInt($('.cart_qty_'+row_id).val());
				var newQty = qty + 1;
				if(newQty > 0){
					$('.decrease_btn').removeAttr('disabled', 'disabled');
				}
				$('.cart_qty_'+row_id).val(newQty);
				var newPrice = newQty * price;
				$('.setPrice_'+row_id).html(newPrice);
				var inputs = $(".qty");
				var	totalQty = 0;
				for(var i = 0; i < inputs.length; i++){
					totalQty += parseInt($(inputs[i]).val());
				}
				$('.totalQty').html(totalQty);
				var price = $(".price");
				var	totalPrice = 0;
				for(var i = 0; i < price.length; i++){
					totalPrice += parseFloat($(price[i]).html());
				}
				$('.totalPrice').html(totalPrice + ' ' + 'P');

				$.ajax({
					url: '{{route("front-cart-edit")}}',
					data: {edit : 'add', rowId : row_id},
					type: "GET",
					headers: {
						'X-CSRF-Token': '{{ csrf_token() }}',
					},
					success: function(response){
						//alert("Product quantity increases");
					},
					error: function(response){
						//alert("Product quantity decrease fail");
					}

				});
				manipulateCart(row_id, newQty);
				e.preventDefault();
			});

			$(document).on('click', '.decrease_btn', function(e){
				var row_id = $(this).attr("data-rowid");
				var price = $(this).attr("data-price");

				var qty = parseInt($('.cart_qty_'+row_id).val());

				  var newQty = qty - 1;
				  if(newQty == 0){
					  $('.decrease_btn').attr('disabled', 'disabled');
				  }else{

					$('.decrease_btn').removeAttr('disabled');

				  }
				$('.cart_qty_'+row_id).val(newQty);
				var newPrice = newQty * price;
				$('.setPrice_'+row_id).html(newPrice);
				var inputs = $(".qty");
				var	totalQty = 0;


				for(var i = 0; i < inputs.length; i++){
						totalQty += parseInt($(inputs[i]).val());
				}
				$('.totalQty').html(totalQty);
				var price = $(".price");
				var	totalPrice = 0;
				for(var i = 0; i < price.length; i++){
					totalPrice += parseFloat($(price[i]).html());
				}
				$('.totalPrice').html(totalPrice + ' ' + 'P');

				$.ajax({
					url: '{{route("front-cart-edit")}}',
					data: {edit : 'remove', rowId : row_id},
					type: "GET",
					headers: {
						'X-CSRF-Token': '{{ csrf_token() }}',
					},
					success: function(response){
						//alert("Product quantity decreases");
					},
					error: function(response){
						//alert("Product quantity decrease fail");
					}
				});
				manipulateCart(row_id, newQty);
				e.preventDefault();
			});

			function manipulateCart(row_id, newQty){
				let count = $(".totalQty").html();
				let cls = 'cart_qty_'.concat(row_id);

				$("#cartLoad").text((count < 10) ? count : "9+");
				$(".".concat(cls)).text(newQty);
			}

			$('.error').addClass('text-danger');
		});

		var form = $("#example-form");
		var restAmount = 0;
		form.validate({
		    errorPlacement: function errorPlacement(error, element) { element.before(error); },
		});
		form.children("div").steps({
		    headerTag: "h3",
		    bodyTag: "section",
		    transitionEffect: "slideLeft",
		    startIndex: {{$finish?4:0}},
		    showFinishButtonAlways: false,

		    /* Labels */
		    labels: {
		        cancel: "Cancel?",
		        current: "current step:",
		        pagination: "Pagination",
		        finish: "次へ",
		        next: "次へ",
		        previous: "< 戻る",
		        loading: "Loading ..."
		    },

		  	onInit: function(event, currentIndex, newIndex){
		  		if(currentIndex == 4){
		        	$('.actions > ul > li:nth-child(1)').attr('style', 'display:none;');
					$('.actions > ul > li:nth-child(2)').attr('style', 'display:none;');
					$('.actions > ul > li:nth-child(3)').attr('style', 'display:none;');
					$('.actions > ul > li:nth-child(4)').attr('style', 'display:none;');
		        }
		        $('.steps .current').prevAll().removeClass('done').addClass('disabled');
		  	},
		    onStepChanging: function (event, currentIndex, newIndex)
		    {
			
				if(currentIndex == 3){
				}

				var checkCart = $('#checkCart').val();
				var checkQty = $('.qty').val();

				if(checkCart == 0 || checkQty == 0){
					return false;
				}
				
				if(newIndex > currentIndex){
					form.validate().settings.ignore = ":disabled,:hidden, .room_no";
        			return form.valid();
				}	
					        
        		return true;
		    },
		    onStepChanged: function (event, currentIndex, newIndex)
		    {
				if(currentIndex == 3){
					$('.set_first_name').html($('.fname').val());
					$('.set_last_name').html($('.lname').val());
					$('.set_phonetic1').html($('.p1').val());
					$('.set_phonetic2').html($('.p2').val());
					$('.set_address').html($('.address').val());
					$('.set_postal_code').html($('.postal').val());
					$('.set_prefecture').html($('.prefectures').val());
					$('.set_municipility').html($('.municipility').val());
					$('.set_room').html($('.room').val());
					$('.set_phone_no').html($('.phone').val());
				}

				if (currentIndex == 2 ) {
					var userPoint = parseInt($('.userPoint').html());
					var totalPrice = parseInt($('.totalPrice').html());
					$('.paymentPoint').html(totalPrice + ' ' + 'ポイント');
					var rest_number = userPoint - totalPrice ;
					var rest = Math.abs(rest_number);
					restAmount = rest_number;
					if(rest_number < 0){
						$('.restPoint').html(rest + ' ' + 'ポイント').addClass('text-danger');
						$('#negative').removeClass('hide');
					}else{
						$('.restPoint').html(rest + ' ' + 'ポイント').removeClass('text-danger');
						$('#positive').removeClass('hide');
					}
					if(userPoint > totalPrice){
						$("#card-div :input").attr("disabled", "disabled");
					}
				}
				if (currentIndex == 3 ) {
					var userPoint = parseInt($('.userPoint').html());
					var totalPrice = parseInt($('.totalPrice').html());
					$('.paymentPoint').html(totalPrice + ' ' + 'ポイント');
					var rest_number = userPoint - totalPrice ;
					var rest = Math.abs(rest_number);
					restAmount = rest_number;
					if(rest_number < 0){
						$('.restPoint').html(rest + ' ' + 'ポイント').addClass('text-danger');
						$('#pre-negative').removeClass('hide');
					}else{
						$('.restPoint').html(rest + ' ' + 'ポイント').removeClass('text-danger');
						$('#pre-positive').removeClass('hide');
					}
				}

		        if(currentIndex == 3){
		        	$('.actions > ul > li:last-child').attr('style', '');
		        	$('.actions > ul > li:nth-child(2)').attr('style', 'display:none;');
		        }
		    },
		    onFinishing: function (event, currentIndex)
		    {
				if(!$('#exampleCheck1').is(':checked')){
					alert('利用契約に同意してください。');
					return false;
				}else{
					$('#exampleCheck1').removeClass('required');
				}
				form.validate().settings.ignore = ":disabled,:hidden, .room_no";
	        	return form.valid();
		    },
		    onFinished: function (event, currentIndex)
		    {
		        form.submit();
		    }
		});

		var calculateDay = function(){
			var date1 = new Date($('#fromM').val()+"/"+$('#fromD').val()+"/"+$('#fromY').val());
			var date2 = new Date($('#toM').val()+"/"+$('#toD').val()+"/"+$('#toY').val());
			timeDiff = date2.getTime() - date1.getTime();
			if(timeDiff < 0){
				alert('invalid date');
				return false;
			}
			var timeDiff = Math.abs(timeDiff);
			var diffDays = Math.ceil(timeDiff / (1000 * 3600 * 24));
			if(diffDays > 70){
				alert('maximum day is 70.You have selected '+diffDays+' days');
				this.selectedIndex = $(this).data('lastSelectedIndex');
				e.preventDefault();
				return false;
			}
			$('#totalDay').val(diffDays);
		}

		calculateDay();

		$('select').each(function() {
		  $(this).data('lastSelectedIndex', this.selectedIndex);
		});

		$(".calculateDay").on("click", function() {
	       $(this).data('lastSelectedIndex', this.selectedIndex);
	    });

		$('.calculateDay').on('change', calculateDay);

		var basic = [
		  ['Bold', 'Italic', '-', 'NumberedList', 'BulletedList', '-', 'Link', 'Unlink', '-', 'About']
		];

		$('.add_details').on('click', function(){
			var content = $('.details').html();
			$('.details_container').before(content);
		})
		$('.add_reward').on('click', function(){
			var content = $('.reward').html();
			$('.reward_container').before(content);
		});

		$(document).ready(function(){
			var checkVal = $('.checkDefault').val();
			if (checkVal == 1) {
				$(".customAddress :input").attr("disabled", true);
			}

			$('.checkDefault').on('change', function(e){
				var value = $(this).val();
				if(value == 1){
					$(".customAddress :input").attr("disabled", true);
					$('.setAddress').addClass('hide');
					$('.defaultAddress').removeClass('hide')

				}
				else{
					$(".customAddress :input").attr("disabled", false);
					$(".customAddress :input").addClass("required");

					$('.setAddress').removeClass('hide');
					$('.defaultAddress').addClass('hide');
				}
			});
		})
	</script>
@stop
