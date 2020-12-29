@extends('main_layout')

@section('custom_css')
<style type="text/css">
	.wizard > .steps > ul > li {
		width: 25%;
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
		background-color: #039aff;
		padding-left: 42px;
		margin-left: -8px;
	}
	.wizard>.steps .current a:after{
		content: '';
		background: #039aff;
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
		border: 2px solid #039aff;
		border-left: 2px solid #039aff !important;
		background-color: #ffffff;
		padding-top: 3px;
		padding-bottom: 3px;
		position: relative;
		border-right: none;
		border-left: none;
	}
	.wizard>.steps .done a, .wizard>.steps .done a:hover, .wizard>.steps .done a:active{
		margin-left: -8px;
		border-left: 2px solid #039aff;
		color: #aaaaaa;
	}
	.wizard>.steps .disabled a:after, .wizard>.steps .done a:after{
		content: '';
		border-top: 2px solid #039aff;
		border-right: 2px solid #039aff;
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
		width: 24%;
	}
	/*steps end*/
	.rewardtitlearea{
		width: 100%;
		font-size: 25px;
		border-bottom: 2px solid #039aff;
		padding-bottom: 5px;
		padding-left: 0px;
		margin-left: 0px;
		margin-bottom: 30px;
	}
	.oneCheck{
		margin-top: 15px;
	}
	.rewardimgarea{
		/* width: 100%; */
	}
	.product_hunt{
		font-size: 20px;
	}
	.product_hunt i{
		display: inline-block;
		margin-right: 7px;
	}
	.setdata{
		margin-bottom: 20px;
	}
	.pl-1{
		padding-left: 1rem!important;
	}
	.breadcrump{
		background-color:#F1F1F1;
	}

	@media (max-width: 575.98px) {
		.wizard > .steps > ul > li{
			width: 93% !important;
		}
		.wizard>.steps a, .wizard>.steps a:hover, .wizard>.steps a:active{
			border-left: 2px solid #039aff !important;
			margin-left: 0px !important;
		}
	}
	
	@media (max-width: 575.98px) {
			.wizard > .steps > ul > li{
		        width: 93% !important;
		    }
		    .wizard>.steps a, .wizard>.steps a:hover, .wizard>.steps a:active{
		        border-left: 2px solid #039aff !important;
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
				border-top: 2px solid #039aff;
				border-right: 2px solid #039aff;
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
				background: #039aff;
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
				border-top: 2px solid #039aff;
				border-right: 2px solid #039aff;
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
				background: #039aff;
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
				border-top: 2px solid #039aff;
				border-right: 2px solid #039aff;
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
				background: #039aff;
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
				border-top: 2px solid #039aff;
				border-right: 2px solid #039aff;
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
				background: #039aff;
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
				border-top: 2px solid #039aff;
				border-right: 2px solid #039aff;
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
				background: #039aff;
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
				background-color: #039aff;
				padding-left: 37px;
				margin-left: -8px;
			}
			.wizard>.steps .disabled a, .wizard>.steps .disabled a:hover, .wizard>.steps .disabled a:active, .wizard>.steps .done a, .wizard>.steps .done a:hover, .wizard>.steps .done a:active{
				margin-left: -8px;
				padding-left: 34px;
				border: 2px solid #039aff;
				background-color: #ffffff;
				padding-top: 3px;
				padding-bottom: 3px;
				position: relative;
				border-right: none;
				/* border-left: none; */
			}
		}
</style>
@stop
@section('ecommerce')
@stop

@section('content')
@include('user.layouts.invest-breadcrump')

<div class="container" id="new-project">	
	<div class="mt20">
		<div class="row justify-content-center">
			<div class="card commonError hide offset-md-1 mt-3">
				<h4 class='p-3' style="color:red;">正しく入力されてない項目があります。メッセージをご確認の上、もう一度入力ください。</h4>
			</div>
			<div class="row">
				<div class="col-md-12 justify-content-center">
					@if (session('success_message'))
					<h4 class="py-2 p-2 text-success text-white">{{session('success_message')}}</h4>
					@elseif (session('error_message'))
					<h4 class="py-2 p-2 text-danger text-white">{{session('error_message')}}</h4>
					@endif
				</div>		
			</div>

			<div class="col-md-10">
				<h1 class="text-center page_title_product_register">プロジェクトを支援する</h1>
				<form id="example-form" action="{{ route('user-invest-action', $p_id) }}" class="mt20" method="post" enctype="multipart/form-data">
					{{ csrf_field() }}
					<div class="mt20">
						<h3 class="step_title_area">
							<span class="steptext">Step</span>
							<span class="stepcount">1</span>
							<span class="stepinfo">リターン選択</span>
						</h3>
						<section class="mt-3">
							<div class="row justify-content-center">
								<div class=" col-12">
									<div class="mt-3">
										<div class="row">
											<div class="col-md-12 mb-4">
												<h4>リターンをお選びください</h4>
											</div>
											<div class="col-md-12 ">
												@if ($p->reward)
												<?php $rewardCount = 1;?>
												@foreach ($p->reward as $r)
												<div class="row setdata set-{{ $r->id }}">
													<div class="col-12">
														<div class="form-check">
															<input type="radio" id="product_{{$r->id}}" class="form-check-input oneCheck" data-id="{{ $r->id }}" name="reward_id" value="{{$r->id}}" required {{Request()->reward == $r->id || (empty(Request()->reward) && $rewardCount == 1)?'checked':''}}>
															<label for="product_{{$r->id}}" class="form-check-label rewardtitlearea">￥{{ number_format($r->amount) }}コース </label>
														</div>
													</div>
													<div class="col-md-10 offset-md-1">
														<div class="row inner_inner horizontal ">
															<div class="col-md-5">
																<img src="{{$p->featured_image ?  asset('uploads/projects/'.$p->featured_image) : asset('uploads/projects/1615154785167836.jpeg')}}" alt="" class="img-fluid rewardimgarea">
															</div>
															<div class="col-md-7">
																<div class="row ">
																	<div class="col-md-12">
																		<span class="text-primary product_hunt">
																			{{-- <input class="form-control invest-amount required" type="hidden" name="quantity" style="display: inline;" value="{{$r->id == Request::get('reward')?1:0}}"> --}}
																			{{-- {{ $r->id == Request::get('reward')?1:0 }} --}}
																			{{-- <input type="hidden" name="reward_id[]" style="width: 50px" value="{{$r->id}}"> --}}
																			<i class="fa fa-product-hunt"></i>{{ number_format($r->is_crofun_point) }}	ポイント
																		</span>
																	</div>
																</div>
																<div class="row mt-1">
																	<div class="col-md-12">
																		<span class="font-weight-bold " style="font-size:20px">{{ $r->is_other }}</span>
																		<br>
																	</div>
																</div>
																<div class="row mt-1">
																	<div class="col-md-12">
																		<span>
																			{{ $r->other_description }}
																		</span>
																	</div>
																</div>
															</div>
														</div>
													</div>
												</div>

												<?php $rewardCount++;?>
												@endforeach
												@endif
											</div>
										</div>
									</div>
								</div>
							</div>
						</section>

						<h3 class="step_title_area">
							<span class="steptext">Step</span>
							<span class="stepcount">2</span>
							<span class="stepinfo">配送先情報入力</span>
						</h3>
						<section>
							<div class="row" style="margin-top: 20px;">
								<div class="col-md-12 mb-4">
									<h4>配送先</h4>
								</div>
							</div>
							<div class="col-md-12 p-0 mb-4">
								<div class="row">
									<div class="col-md-10">
										<div class="">
											<label class="form-check-label check-first  pt-3">
												<input type="radio" class="form-check-input checkDefault" name="shipping_address_radio" value="1" checked>
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
							<div class="col-md-12 p-0 mb-4">
								<div class="row">
									<div class="col-12">
										<div class="pt-3 pb-3">
											<label class="form-check-label check-first  pt-3">
												<input type="radio" id="check_to_set" class="form-check-input checkDefault" name="shipping_address_radio" value="2">
												新しい送付先
											</label>
										</div>
									</div>
									<div class="col-12 customAddress hide">
										<div class="row inner_inner  pl-1 ml-2 pb-4">
											<div class="col-md-9">
												<div class="row border">
													<div class="col-md-3 col-3 bg-dark">
														<p class="pt-3 ">氏名</p>
													</div>
													<div class="col-md-9 col-9 bg-white">
														<div class="row pt-2">
															<div class="col-md-3 col-3 p-0 ml-5">
																<input type="text" class="form-control required fname" id="" placeholder="姓" value="" name="first_name" >
															</div>
															<div class="col-md-3 col-3 p-0 m-0">
																<input type="text" class="form-control mx-1 required lname" id="" placeholder="名" value="" name="last_name" >
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
															<div class="col-md-6 col-6 p-0 ml-5" id="postal_code_error_msg_for_step1">
																<input type="text" class="form-control required postal" onkeyup="limit(this)" id="postal_code" placeholder="郵便番号" maxlength="7" name="postal_code" value="">
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
																<input type="text" class="form-control room_no" id="" placeholder="マンション名・部屋番号" name="room_no" value="">
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
						</section>

						<h3 class="step_title_area">
							<span class="steptext">Step</span>
							<span class="stepcount">3</span>
							<span class="stepinfo">入力情報確認</span>
						</h3>
						<section>
							<div class="row justify-content-center">
								<div class="col-md-12" style="margin-top: 20px;">
									<h4>入力情報確認</h4>
								</div>
								<div class="col-md-12 ">
									<div class="row">
										<div class="col-12">
											<div class="form-check pl-5 pt-3">
												<input type="radio" class="form-check-input" name="optradio1" checked>
												<label class="form-check-label">選択したリターン</label>
											</div>
										</div>
										<?php foreach($p->reward as $r){?>

											<div class="col-10  border offset-md-1 p-2 reward_preview_{{$r->id}} reward_preview {{Request()->reward == $r->id || (empty(Request()->reward) && $rewardCount == 1)?'':'hide'}}">
												<div class="row inner_inner  pl-0 ml-2 pb-4">
													<div class="col-md-5">
														<div class="row">
															<div class="col-md-12 project-item">
																<span class="pt-2">￥{{ number_format($r['amount']) }} コース</span>
																<?php if($r->other_file){?>
																	<img src="{{$r->other_file ?  asset('uploads/projects/'.$r->other_file) : asset('uploads/projects/1615154785167836.jpeg')}}" alt="" class="img-fluid">
																<?php }?>
															</div>
														</div>
													</div>
													<div class="col-md-7">
														<div class="row ">
															<div class="col-md-12">
																<span class="text-primary"><i class="fa fa-product-hunt"></i> {{ number_format($r['is_crofun_point']) }}ポイント</span>
															</div>
														</div>
														<div class="row mt-1">
															<div class="col-md-12">
																<span class="font-weight-bold " style="font-size:20px">{{ $r['is_other'] }}</span>
																<br>
															</div>
														</div>
														<div class="row mt-1">
															<div class="col-md-12">
																<span>{!! $r['other_description'] !!}</span>
															</div>
														</div>
													</div>
												</div>
											</div>
										<?php }?>
									</div>
								</div>
								<div class="col-md-12">
									<div class="row">
										<div class="col-12">
											<div class="form-check pl-5 pt-3">
												<input type="radio" class="form-check-input" name="optradio2" checked>
												<label class="form-check-label">配送先 </label>
											</div>
										</div>
										<div class="col-10  border offset-md-1 p-2">
											<div class="row inner_inner  pl-0 ml-2 pb-4">
												<div class="col-md-12">
													<div class="row ">
														<div class="col-md-12 defaultAddress">
															<span>
																<br> {{ $user->first_name }} {{ $user->last_name }} ({{ $user->profile->phonetic }} {{ $user->profile->phonetic2 }})<br>
																{{ $user->shipping_postal_code }} <br>
																{{ $user->shipping_prefecture }} <br>
																{{ $user->shipping_municipility }} <br>
																{{ $user->shipping_address }}    <br>
																{{ $user->shipping_room_num }} <br>
																{{ $user->profile->phone_no }}
															</span>
														</div>
														<div class="col-md-12 setAddress">
															<div class="row ">
																<div class="col-md-12">
																	<span> <span class="set_first_name"></span> <span class="set_last_name"></span>  ( <span class="set_phonetic1"></span>  <span class="set_phonetic2"></span> ) <br>
																	〒<span class="set_postal_code"></span>  <br>
																	<span class="set_address"></span>  <br>
																	電話番号: <span class="set_phone_no"></span>
																</span>
															</div>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="col-md-12 ">
								<div class="row">
									<div class="col-md-12 mt-5">
										<div class="row justify-content-center">
											<div class="col-8">
												<p class="text-center">
													<span>
														<input type="checkbox" name="" id="exampleCheck1" value="">
														<a target="_blank" href="{{route('front-terms')}}">利用規約</a>
														に同意
													</span> <br>
														このプロジェクトはチャレンジ形式です。<br>
														目標金額に達していなくても、プロジェクトは期間が来れば成立となります。<br>
													支援後のキャンセルはできません
												</p>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</section>

					<h3 class="step_title_area">
						<span class="steptext">Step</span>
						<span class="stepcount">4</span>
						<span class="stepinfo">支援完了</span>
					</h3>
					<section>
						<div class="row justify-content-center">
							<div class="col-md-12">
								<div class="row justify-content-center" style="margin-top: 20px;">
									<div class="col-md-12 text-center">
										<h5 class="text-info font-weight-bold text-center">プロジェクトの支援が完了しました。</h5>
									</div>
								</div>
								<div class="row justify-content-center mt-5">
									<div class="col-md-12">
										<h6 class=" font-weight-bold text-center">プロジェクトのご支援ありがとうございました。
											<br> <br> 引き続き応援よろしくお願いいたします。
										</h6>
									</div>
								</div>
								<div class="row justify-content-center mt-5">
									<div class="col-md-12 text-center ">
										<button type="button" class="text-center btn btn-md btn-primary  msg_send_btn w6-18" data-user_id="{{ $p->user->id }}" data-project_username="{{ $p->user->first_name .' '.$p->user->last_name }}" style="cursor:pointer; color:#fff;">
											<span style="color:#fff !important;"> <i class="fa fa-envelope"></i> </span>プロジェクトの起案者へメッセージを送る
										</button>
									</div>
									<div class="col-md-12 text-center ">
										<a href="{{route('user-invest-list')}}" class="text-center btn" style="background-color: #C6C6C6;color:#ffffff; margin-top: 30px;">< 戻 る</a>
									</div>
								</div>
							</div>
						</div>
					</section>
				</div>
			</form>
		</div>
	</div>
</div>
</div>


	{{-- @include('user.layouts.add-project') --}}
	@stop
	@include('user.layouts.message_modal')

	@section('custom_js')

	<script src="{{Request::root()}}/ckeditor/ckeditor.js"></script>

	<script type="text/javascript" src="{{Request::root()}}/js/jquery.validate.min.js"></script>
	<script type="text/javascript">
		function limit(element)
		{
			var max_chars = 7;
			if(element.value.length > max_chars) {
				element.value = element.value.substr(0, max_chars);
			}
		}
	</script>

	<script type="text/javascript">
		$(document).ready(function(){

			$("input[name='postal_code']").on('input', function(e) { 
				$(this).val($(this).val().replace(/[^0-9]/g, '')); 		
			}); 

			var checkVal = $('.checkDefault').val();
			if (checkVal == 1) {
				$(".customAddress :input").attr("disabled", true);
				$('.setAddress').addClass('hide');
			}

			$('.oneCheck').on('change', function(e){
				// console.log('1');
				var rowid = $(this).attr('data-id');
				$('.reward_preview').hide();
				$('.reward_preview_'+rowid).show();
			});

			var default_product = $('.oneCheck:checked').val();
			if(default_product)
			{
				$('.reward_preview').hide();
				$('.reward_preview_'+default_product).show();
			}

			$('.msg_send_btn').on('click', function(e){
				var user_id = $(this).attr('data-user_id');
				var user_name = $(this).attr('data-project_username');
				var modal_title = "プロジェクトの起案者へのメッセージ";

				$('#to_id').val(user_id);
				$('#project_user_name').html(user_name);
				$('#modal-title').html(modal_title);
				$('#send-message').modal('show');
			});

			$('.checkDefault').on('change', function(e){
				var value = $(this).val();
				if(value == 1){
					$(".customAddress :input").attr("disabled", true);
					$('.setAddress').addClass('hide');
					$('.customAddress').addClass('hide');
					$('.defaultAddress').removeClass('hide');
				}else{
					$('.customAddress').removeClass('hide');

					$(".customAddress :input").attr("disabled", false);
					$(".customAddress :input").addClass("required");

					$('.setAddress').removeClass('hide');
					$('.defaultAddress').addClass('hide');
				}
			});
		})
	</script>

	<script type="text/javascript">
		var form = $("#example-form");

		form.validate({
			errorPlacement: function errorPlacement(error, element) { element.before(error); },
			messages: {
				number: '半角数字で入力してください'
			}
		});

		form.children("div").steps({
			headerTag: "h3",
			bodyTag: "section",
			transitionEffect: "slideLeft",
			// startIndex: 1,
			startIndex: {{$finish?3:0}},
			showFinishButtonAlways: false,

			/* Labels */
			labels: {
				cancel: "Cancel?",
				current: "current step:",
				pagination: "Pagination",
				finish: "次へ",
				next: "次へ",
				previous: "< 前へ",
				loading: "Loading ..."
			},
			onInit: function(event, currentIndex, newIndex){
				if(currentIndex == 3){
					$('.actions > ul > li:nth-child(1)').attr('style', 'display:none;');
					$('.actions > ul > li:nth-child(2)').attr('style', 'display:none;');
					$('.actions > ul > li:nth-child(3)').attr('style', 'display:none;');
				}
				$('.steps .current').prevAll().removeClass('done').addClass('disabled');
			},
			onStepChanging: function (event, currentIndex, newIndex)
			{
				if (currentIndex === 1) {
					console.log('step-change->step2=>', currentIndex)
					const max_chars_length = 7;
					console.log('error-test=>', $('#postal_code').val(), parseInt($('#postal_code').val()));
			
					$("#label_postal_code_error_display").remove();
					if (parseInt($('#postal_code').val()) >= 10000 && parseInt($('#postal_code').val()) <= 9998531 ) {
						$("#label_postal_code_error_display").remove();
						$('#postal_code').val($('#postal_code').val().substr(0, max_chars_length));						
						console.log('block1.1=>', $('#postal_code').val());
					}else {
						$("#label_postal_code_error_display").remove();
						$('#postal_code_error_msg_for_step1').append('<span name="postal_code_display" class="error" id="label_postal_code_error_display">この項目は必須です</span>');												
						console.log('block1.4=>', $('#postal_code').val());
					}
			
				}

				if(currentIndex == 1 && form.valid() === false){
					$('.commonError').removeClass('hide');
				}else if(!$(".commonError").hasClass("hide")){
					$('.commonError').addClass('hide');
				}

				if(newIndex > currentIndex){
					form.validate().settings.ignore = ":disabled,:hidden, .room_no";
					return form.valid();
				}

				return true;
			},
			onStepChanged: function (event, currentIndex, newIndex)
			{
				
				if(currentIndex == 2){
					
					$('.set_first_name').html($('.fname').val());
					$('.set_last_name').html($('.lname').val());
					$('.set_phonetic1').html($('.p1').val());
					$('.set_phonetic2').html($('.p2').val());

					$('.set_address').html($('.address').val());
					
					$('.set_postal_code').html($('input[name="postal_code"]').val());
					

					$('.set_phone_no').html($('.phone').val());
				}
				if(currentIndex == 2){
					$('.actions > ul > li:last-child').attr('style', '');
					$('.actions > ul > li:nth-child(2)').attr('style', 'display:none;');
				}
			},
			onFinishing: function (event, currentIndex)
			{
				if(!$('#exampleCheck1').is(':checked')){
					//$('#exampleCheck1').addClass('required');
					alert('利用契約に同意してください。');
					return false;
				}else{
					$('#exampleCheck1').removeClass('required');
				}
				form.validate().settings.ignore = ":disabled,:hidden, .room_no";
				return form.valid();
				// return true;
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
		// CKEDITOR.replace( 'ckeditor' );
		// CKEDITOR.replaceClass = 'ckeditor';
	});

	$('.add_reward').on('click', function(){
		var content = $('.reward').html();
		$('.reward_container').before(content);
	});

	// console.log('new project');
	$(function(){
		CKEDITOR.replace( 'editor', {
			toolbar: basic
		} );
		// CKEDITOR.replaceClass = 'ckeditor';
		CKEDITOR.replace( 'description' ,{
			// filebrowserBrowseUrl : 'ckeditor1/plugins/imageuploader/imgbrowser.php',
			// filebrowserUploadUrl : '/browser1/upload/type/all',
			filebrowserImageBrowseUrl : '{{Request::root()}}/ckeditor/plugins/imageuploader/imgbrowser.php',
			// filebrowserImageUploadUrl : '/browser3/upload/type/image',
				// filebrowserWindowWidth  : 800,
				// filebrowserWindowHeight : 500,
				extraPlugins: 'imageuploader'
			// extraPlugins: 'dropler'
		});
	});
</script>
@stop
