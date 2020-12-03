@extends('main_layout')
@section('title')
{{$title}}
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
		.btn-bottom{
			color: #fff;
 background-color: #868e96;
 border-color: #868e96;
 width: 120px;

		}
		.btn-bottom:hover{
			color: #fff;
	 background-color: #727b84;
	 border-color: #6c757d;
		}
		.step{
			border: 2px solid #868e96;
		}
		.bg-dark{
			background-color: #CCCCCC;
		}
    tr{
      width: 750px;
    }
    .border-dark {
  border-color: #343a40 !important; }
  .form-control{
    border-radius: none !important;
  }

  .text-center {
  text-align: center !important; }
  
  /* @media (max-width: 1370px) {
			.first_tabs ul li a {
				color: #333333;
				text-decoration: none;
				font-size: 15px;
				font-weight: 500;
				font-weight: bold;
				padding-top: 10px;
				padding-bottom: 10px;
				display: inline-block;
			}
		}

		@media (max-width: 1295px) {
			.top_menu li a {
				color: #333333;
				text-decoration: none;
				font-size: 16px !important;
				font-weight: 500;
				margin-left: 20px;
				padding-bottom: 5px;
				font-family: w3;
			}
			.first_tabs ul li a {
				color: #333333;
				text-decoration: none;
				font-size: 13px;
				font-weight: 500;
				font-weight: bold;
				padding-top: 10px;
				padding-bottom: 10px;
				display: inline-block;
			}
		}
		
		@media (max-width: 1170px) {
			.top_menu li a {
				color: #333333;
				text-decoration: none;
				font-size: 15px !important;
				font-weight: 500;
				margin-left: 20px;
				padding-bottom: 5px;
				font-family: w3;
			}
			.first_tabs ul li a {
				color: #333333;
				text-decoration: none;
				font-size: 11px;
				font-weight: 500;
				font-weight: bold;
				padding-top: 10px;
				padding-bottom: 10px;
				display: inline-block;
			}
		}
		@media (max-width: 1080px) {
			.top_menu li a {
				color: #333333;
				text-decoration: none;
				font-size: 12px !important;
				font-weight: 500;
				margin-left: 20px;
				padding-bottom: 5px;
				font-family: w3;
			}
			.first_tabs ul li a {
				color: #333333;
				text-decoration: none;
				font-size: 8px;
				font-weight: 500;
				font-weight: bold;
				padding-top: 10px;
				padding-bottom: 10px;
				display: inline-block;
			}
		}
		@media (max-width: 930px) {
			.top_menu li a {
				color: #333333;
				text-decoration: none;
				font-size: 11px !important;
				font-weight: 500;
				margin-left: 20px;
				padding-bottom: 5px;
				font-family: w3;
			}
			.first_tabs ul li a {
				color: #333333;
				text-decoration: none;
				font-size: 7px;
				font-weight: 500;
				font-weight: bold;
				padding-top: 10px;
				padding-bottom: 10px;
				display: inline-block;
			}
		}
		@media (max-width: 870px) {
			.top_menu li a {
				color: #333333;
				text-decoration: none;
				font-size: 10px !important;
				font-weight: 500;
				margin-left: 20px;
				padding-bottom: 5px;
				font-family: w3;
			}
			.first_tabs ul li a {
				color: #333333;
				text-decoration: none;
				font-size: 7px;
				font-weight: 500;
				font-weight: bold;
				padding-top: 10px;
				padding-bottom: 10px;
				display: inline-block;
			}
		}
		@media (max-width: 870px) {
			.top_menu li a {
				color: #333333;
				text-decoration: none;
				font-size: 9px !important;
				font-weight: 500;
				margin-left: 20px;
				padding-bottom: 5px;
				font-family: w3;
			}
			.first_tabs ul li a {
				color: #333333;
				text-decoration: none;
				font-size: 6px;
				font-weight: 500;
				font-weight: bold;
				padding-top: 10px;
				padding-bottom: 10px;
				display: inline-block;
			}
		} */
		@media (max-width: 575.73px) {
			.side_padding{
				padding:0px 10px!important;
			}
			.side_title{
				font-size:10px;
			}
		}
		
	</style>
@stop

@section('ecommerce')

@stop

@section('content')
@include('user.layouts.tab')


<div class="container">
	<div class="row container_div">
		<div class="col-md-12 col-sm-12">
			<div class="mt20">
				<div class="row">
					<div class="col-md-3">
						@include('user.layouts.profile')
					</div>
					<div class="col-md-9">
						@if (session('success'))
							<div class="row">
								<div class="col-md-12">
									<h4 class="">{{ session('success') }}</h4>
									<hr>
								</div>
								
							</div>
						@endif
						<div class="">
							<h4 class="py-2">配送先情報</h4>
							<div class="col-md-12 col-12">
								{!! Form::open(['route' => 'user-shipping-address-update-action', 'method' => 'post']) !!}

								<div class="row border">
									<div class="col-md-3 side_padding col-3 bg-dark">
										<p class="pt-3 side_title ">氏名</p>
									</div>
									<div class="col-md-9 col-9 ">
										<div class="row pt-2">
											<div class="col-md-3 col-5 p-0 ml-4">
												<input type="text" class="form-control" id="" placeholder=" 姓" value="{{ $user->first_name }}" name="first_name">
												@if ($errors->has('first_name'))
													<span class="help-block text-danger">
														<strong>{{ $errors->first('first_name') }}</strong>
													</span>
												@endif
											</div>
											<div class="col-md-3 col-5 p-0 m-0">
												<input type="text" class="form-control mx-1" id="" placeholder="名" value="{{ $user->last_name }}" name="last_name">
												@if ($errors->has('last_name'))
													<span class="help-block text-danger">
														<strong>{{ $errors->first('last_name') }}</strong>
													</span>
												@endif
											</div>
										</div>
									</div>
								</div>

								<div class="row border">
									<div class="col-md-3 side_padding col-3 bg-dark">
										<p class="pt-3 side_title">フリガナ</p>
									</div>
									<div class="col-md-9 col-9 ">
										<div class="row pt-2">
											<div class="col-md-3 col-5 p-0 ml-4">
												<input type="text" class="form-control" id="" placeholder="セイ" value="{{ $user->profile->phonetic }}" name="phonetic1">
												@if ($errors->has('phonetic1'))
													<span class="help-block text-danger">
														<strong>{{ $errors->first('phonetic1') }}</strong>
													</span>
												@endif
											</div>
											<div class="col-md-3 col-5 p-0 m-0">
												<input type="text" class="form-control mx-1" id="" placeholder="メイ" value="{{ $user->profile->phonetic2 }}" name="phonetic2">
												@if ($errors->has('phonetic2'))
													<span class="help-block text-danger">
														<strong>{{ $errors->first('phonetic2') }}</strong>
													</span>
												@endif
											</div>
										</div>
									</div>
								</div>

								<div class="row border">
									<div class="col-md-3 side_padding col-3 bg-dark">
										<p class="pt-3 side_title">住所</p>
									</div>
									<div class="col-md-9 col-9 ">
										<div class="row pt-2">
											<div class="col-md-6 col-10 p-0 ml-4">
												<input type="text" class="form-control phone" id="postal_code" placeholder="郵便番号" name="shipping_postal_code" value="{{ $user->shipping_postal_code }}"  maxlength="7">
												<span id="postal_error" style="color:red;font-size: 10px;"></span>
												@if ($errors->has('shipping_postal_code'))
													<span class="help-block text-danger">
														<strong>{{ $errors->first('shipping_postal_code') }}</strong>
													</span>
												@endif
											</div>
										</div>
										<div class="row pt-2">
											<div class="col-md-3 col-10 p-0 ml-4">
												{{-- <input type="text" class="form-control" id="" placeholder="都道府県" name="division" value=""> --}}
												@include('user.layouts.prefectures', ['user' => $user])

												@if ($errors->has('shipping_prefecture'))
													<span class="help-block text-danger">
														<strong>{{ $errors->first('shipping_prefecture') }}</strong>
													</span>
												@endif
											</div>
										</div>
										<div class="row pt-2">
											<div class="col-md-6 col-10 p-0 ml-4">
												<input type="text" class="form-control" id="" placeholder="市区町村" name="shipping_municipility" value="{{ $user->shipping_municipility }}">
												@if ($errors->has('shipping_municipility'))
													<span class="help-block text-danger">
														<strong>{{ $errors->first('shipping_municipility') }}</strong>
													</span>
												@endif
											</div>
										</div>
										<div class="row pt-2">
											<div class="col-md-6 col-10 p-0 ml-4">
												<input type="text" class="form-control" id="" placeholder="それ以降の住所" name="shipping_address" value="{{ $user->shipping_address }}">
												@if ($errors->has('shipping_address'))
													<span class="help-block text-danger">
														<strong>{{ $errors->first('shipping_address') }}</strong>
													</span>
												@endif
											</div>
										</div>
										<div class="row pt-2">
											<div class="col-md-6 col-10 p-0 ml-4">
												<input type="text" class="form-control" id="" placeholder="マンション名・部屋番号" name="shipping_room_num" value="{{ $user->shipping_room_num }}">
												@if ($errors->has('shipping_room_num'))
													<span class="help-block text-danger">
														<strong>{{ $errors->first('shipping_room_num') }}</strong>
													</span>
												@endif
											</div>
										</div>
										<br>
									</div>
								</div>

								<div class="row border">
									<div class="col-md-3 side_padding col-3 bg-dark">
										<p class="pt-3 side_title">電話番号</p>
									</div>
									<div class="col-md-9 col-9 ">
										<div class="row pt-2">
											<div class="col-md-6 col-10 p-0 ml-4">
												<input type="text" class="form-control" id="" placeholder="(例)09012341234" value="{{ $user->shipping_phone_num }}" name="shipping_phone_num">
												@if ($errors->has('shipping_phone_num'))
													<span class="help-block text-danger">
														<strong>{{ $errors->first('shipping_phone_num') }}</strong>
													</span>
												@endif
											</div>

										</div>
									</div>
								</div>
								@if(($user1->profile->phonetic) == null ||($user1->profile->phonetic2) == null ||($user1->profile->phone_no) == null||($user1->profile->postal_code) == null||($user1->profile->prefectures) == null||($user1->profile->municipility) == null ||($user1->first_name) == null ||($user1->last_name) == null )
						
								<div class="row pt-5 pb-5 justify-content-center">
									<div class="col-md-2 col-6 ">
										<input type="" name="" value="更新する" class="btn btn-md btn-bottom profileModal w6-18" id="submit">
									</div>
								</div>
								@else
								<div class="row pt-5 pb-5 justify-content-center">
									<div class="col-md-2 col-6 ">
										<input type="submit" name="" value="更新する" class="btn btn-md btn-bottom w6-18" id="submit">
									</div>
								</div>
								@endif
								{!! Form::close() !!}
							</div>
						</div>
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

@include('user.layouts.profileModal')
@stop

@section('custom_js')
<script type="text/javascript">
	$(document).ready(function(){
		$(document).on('click', '#submit', function(){
			var postal = $('#postal_code').val();
			if(postal.length > 7 || postal.length < 7){
				$('#postal_error').html('郵便番号は７文字で入力して下さい。');
				return false;
			}else{
				$('#postal_error').html('');
				return true;
			}
		});

		$("input[name='shipping_postal_code']").on('input', function(e) { 
				$(this).val($(this).val().replace(/[^0-9]/g, '')); 
			}); 
	});
</script>
<script type="text/javascript">
	var error = $('#getError').val();
		$(window).on('load',function(){
			console.log('error = ' + error);
			if (error == 1) {
				$('#myModal').modal('show');
			}
		});
</script>
<script type="text/javascript">
	$('.profileModal').on('click',function(){
		$('#myModal').modal('show');
	});

	// $('input[name="shipping_postal_code"]').keyup(function(e) {
  	// 	if (/\D/g.test(this.value)) {
    // 		// Filter non-digits from input value.
    // 		this.value = this.value.replace(/\D/g, '');
  	// 	}
	// });	
</script>
@stop
