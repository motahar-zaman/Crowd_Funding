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
			text-align: center !important; 
		}

		.error_font{
			font-size: 10px !important;
		}
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
									<h4 class=" text-info">{{ session('success') }}</h4>
								</div>
							</div>
						@endif
						<div class="">
							<h4 class="py-2">プロフィール編集</h4>
							<div class="col-md-12 col-12">
								{!! Form::open(['route' => 'user-profile-update-action', 'id' => 'profile-form', 'method' => 'post', 'enctype' => 'multipart/form-data']) !!}
								<div class="row border">
									<div class="col-md-3 side_padding col-3 bg-dark">
										<p class="pt-3 side_title">氏名 <span><img height="14px" src="{{Request::root()}}/assets/front/img/requir.png"></span></p>
									</div>
									<div class="col-md-9 col-9 ">
										<div class="row pt-2">
											<div class="col-md-3 col-5 p-0 ml-4">
												<input type="text" class="form-control" id="first_name" placeholder="姓" value="{{ old('first_name', $user->first_name) }}" name="first_name" maxlength="10" onclick="removealert('firstname_error')">
												<span class="error_font" id="firstname_error" style="color:red;"></span>
												@if ($errors->has('first_name'))
													<span class="help-block text-danger">
														<strong>{{ $errors->first('first_name') }}</strong>
													</span>
												@endif
											</div>
											<div class="col-md-3 col-5 p-0 m-0">
												<input type="text" class="form-control mx-1" id="last_name" placeholder="名" value="{{ old('last_name', $user->last_name) }}" name="last_name" maxlength="10" onclick="removealert('lastname_error')">
												<span class="error_font" id="lastname_error" style="color:red;"></span>
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
									<div class="col-md-3 col-3 side_padding bg-dark">
										<p class="pt-3 side_title">フリガナ <span><img height="14px" src="{{Request::root()}}/assets/front/img/requir.png"></span></p>
									</div>
									<div class="col-md-9 col-9 ">
										<div class="row pt-2">
										<div class="col-md-3 col-5 p-0 ml-4">
												<input type="text" class="form-control" id="phonetic" placeholder="セイ" value="{{isset($user->profile->phonetic)?  old('phonetic', str_replace(' ', '&nbsp;',$user->profile->phonetic)) : old('phonetic')}}" name="phonetic" maxlength="10" onclick="removealert('phonetic_error')">
												<span class="error_font" id="phonetic_error" style="color:red;"></span>
												@if ($errors->has('phonetic'))
													<span class="help-block text-danger">
														<strong style="font-size: 12px;">{{ $errors->first('phonetic') }}</strong>
													</span>
												@endif
											</div>
											<div class="col-md-3 col-5 p-0 ml-1">
												<input type="text" class="form-control" id="phonetic2" placeholder="メイ" value="{{isset($user->profile->phonetic2)? old('phonetic2', str_replace(' ', '&nbsp;',$user->profile->phonetic2)) : old('phonetic2')}}" name="phonetic2" maxlength="10" onclick="removealert('phonetic2_error')">
												<span class="error_font" id="phonetic2_error" style="color:red;"></span>
												@if ($errors->has('phonetic2'))
													<span class="help-block text-danger">
														<strong style="font-size: 12px;">{{ $errors->first('phonetic2') }}</strong>
													</span>
												@endif
											</div>
										</div>
									</div>
								</div>

								<div class="row border">
									<div class="col-md-3 side_padding col-3 bg-dark">
										<p class="pt-3 side_title">生年月日 </p>
									</div>
									<div class="col-md-9 col-9 ">
										<div class="pt-2 ml-4 justify-content-around">
											<div class="row">
												<input  type="hidden" id="dob" name="dob">
												<select class="year col-md-3 form-control mr-1" id="year" name="date_[year]"></select>
												<select class="month col-md-3 form-control mr-1" id="month" name="date_[month]"></select>
												<select class="day col-md-3 form-control mr-1" id="day" name="date_[day]"></select>
											</div>

										</div>
									</div>
								</div>

								<div class="row border">
									<div class="col-md-3 side_padding col-3 bg-dark">
										<p class="pt-3 side_title">性別 </p>
									</div>
									<div class="col-md-9 col-9 ">
										<div class="row pt-2">
											<div class="col-md-6 col-10 p-0 ml-4">
												<select name="sex" class="form-control" >
													<option value="">選択してください</option>
													<option value="1" {{isset($user->profile->sex) && old('sex', $user->profile->sex) == 1?'selected':''}}>男性</option>
													<option value="2" {{isset($user->profile->sex) && old('sex', $user->profile->sex) == 2?'selected':''}}>女性</option>
													<option value="3" {{isset($user->profile->sex) && old('sex', $user->profile->sex) == 3?'selected':''}}>末記入</option>
												</select>
												@if ($errors->has('sex'))
													<span class="help-block text-danger">
														<strong>{{ $errors->first('sex') }}</strong>
													</span>
												@endif
											</div>
										</div>
									</div>
								</div>
								<div class="row border">
									<div class="col-md-3 col-3 side_padding bg-dark">
										<p class="pt-3 side_title">電話番号 <span><img height="14px" src="{{Request::root()}}/assets/front/img/requir.png"></span></p>
									</div>
									<div class="col-md-9 col-9 ">
										<div class="row pt-2">
											<div class="col-md-6 col-10 p-0 ml-4">
												<input type="text" class="form-control phone" id="phone_no" placeholder="電話番号" name="phone_no" value="{{isset($user->profile->phone_no)? old('phone_no', $user->profile->phone_no):''}}" onclick="removealert('phone_error')">
												<span class="error_font" id="phone_error" style="color:red;"></span>
												@if ($errors->has('phone_no'))
													<span class="help-block text-danger">
														<strong>{{ $errors->first('phone_no') }}</strong>
													</span>
												@endif
											</div>
										</div>
									</div>
								</div>

								<div class="row border">
									<div class="col-md-3 col-3 side_padding bg-dark">
										<p class="pt-3 side_title ">住所 <span><img height="14px" src="{{Request::root()}}/assets/front/img/requir.png"></span></p>
									</div>
									<div class="col-md-9 col-9 ">
										<div class="row pt-2">
											<div class="col-md-6 col-10 p-0 ml-4">
												<input type="text" class="form-control"  id="postal_code" placeholder="郵便番号" name="postal_code" value="{{isset($user->profile->postal_code)? old('postal_code',$user->profile->postal_code):''}}" maxlength="7" onclick="removealert('postal_error')">
												<span class="error_font" id="postal_error" style="color:red;"></span>
												@if ($errors->has('postal_code'))
													<span class="help-block text-danger">
														<strong>{{ $errors->first('postal_code') }}</strong>
													</span>
												@endif
											</div>
										</div>
										<div class="row pt-2">
											<div class="col-md-3 col-10 p-0 ml-4">
												@include('user.layouts.prefectures')
												@if ($errors->has('prefectures'))
													<span class="help-block text-danger">
														<strong>{{ $errors->first('prefectures') }}</strong>
													</span>
												@endif
											</div>
										</div>
										<div class="row pt-2">
											<div class="col-md-6 col-10 p-0 ml-4">
												<input type="text" class="form-control" id="municipility" placeholder="市区町村" name="municipility" value="{{isset($user->profile->municipility)? old('municipility',$user->profile->municipility):''}}" onclick="removealert('municipility_error')">
												<span class="error_font" id="municipility_error" style="color:red;"></span>
												@if ($errors->has('municipility'))
													<span class="help-block text-danger">
														<strong>{{ $errors->first('municipility') }}</strong>
													</span>
												@endif
											</div>
										</div>
										<div class="row pt-2">
											<div class="col-md-6 col-10 p-0 ml-4">
												<input type="text" class="form-control" id="address" placeholder="それ以降の住所" name="address" value="{{isset($user->profile->address)? old('address',$user->profile->address):''}}">
												@if ($errors->has('address'))
													<span class="help-block text-danger">
														<strong>{{ $errors->first('address') }}</strong>
													</span>
												@endif
											</div>
										</div>
										<div class="row pt-2 pb-2">
											<div class="col-md-6 col-10 p-0 ml-4">
												<input type="text" class="form-control" id="room_no" placeholder="マンション名・部屋番号" name="room_no" value="{{isset($user->profile->room_no)? old('room_no',$user->profile->room_no):''}}">
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
									<div class="col-md-3 col-3 side_padding bg-dark">
										<p class="pt-3 side_title">URL </p>
									</div>
									<div class="col-md-9 col-9 ">
										<div class="row pt-2">
											<div class="col-md-6 col-10 p-0 ml-4">
												<input type="url" class="form-control" id="url" placeholder="URL" name="url" value="{{ (isset($user->profile->url) && $user->profile->url) ? old('url', $user->profile->url) : old('url')}}">
												@if ($errors->has('url'))
													<span class="help-block text-danger">
														<strong>{{ $errors->first('url') }}</strong>
													</span>
												@endif
											</div>
										</div>
									</div>
								</div>
								<div class="row border">
									<div class="col-md-3 col-3 side_padding bg-dark">
										<p class="pt-3 side_title">コメント </p>
									</div>
									<div class="col-md-9 col-9 ">
										<div class="row pt-2">
											<div class="col-md-10 col-10 p-0 ml-4">
												<textarea type="text" class="form-control" id="profile" rows="10" placeholder="プロフィール" name="profile">{{isset($user->profile->profile) ? old('profile', $user->profile->profile) : ''}}</textarea>
												@if ($errors->has('profile'))
													<span class="help-block text-danger">
														<strong>{{ $errors->first('profile') }}</strong>
													</span>
												@endif
												<br>
											</div>
										</div>
									</div>
								</div>
								<div class="row border">
									<div class="col-md-3 side_padding col-3 bg-dark">
										<p class="pt-3 side_title">アイコン画像 </p>
									</div>
									<?php
										$image = parse_url($user->pic);
										if(isset($image['host'])) $image = $user->pic;
										else $image = '/uploads/'.$user->pic;
									?>
									<div class="col-md-9 col-9 ">
										<div class="row pt-2">
											<div class="col-md-10 col-10 mb-2 ml-4 p-0" style="height: 200px; width: auto;">
												<img id="blah" src="{{$image}}" alt="your image" class="" style="max-width: 100%; max-height: 100%; object-fit: contain;"/>
											</div>
											<div class="col-md-12 col-10 p-0 ml-4 pb-3">
												<input type="file" onchange="readURL(this);" class="" id="pic" placeholder="アイコン画像" name="pic" accept=".jpg,.png,.jpeg">
											</div>
										</div>
									</div>
								</div>
								<div class="row p-5 justify-content-center">
									<div class="col-md-1 col-6">
										<input type="submit" name="" value="更新する >" class="btn btn-md btn-primary w6-18" id="submit">
									</div>
								</div>
								{!! Form::close() !!}
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<?php 
	$defaultDate = '';
?>

@stop

@section('custom_js')
	<script type="text/javascript">

		function removealert(name)
		{
			$('#'+name).html(' ');
		}

		$(document).ready(function(){
			$(document).on('click', '#submit', function(){
				var flag = 0;
				//Name validations
				if ($('input[name=first_name]').val() == '' || $('input[name=first_name]').val() == null){
					$('#firstname_error').html('氏名’性’を入力して下さい！');
					flag = 1;
				} 
				if($('input[name=last_name]').val() == '' || $('input[name=last_name]').val() == null){
					$('#lastname_error').html('氏名’名’を入力して下さい！');
					flag = 1;
				}

				//Katakana validation
				var code = 0;
				var katakana_first = $('input[name=phonetic]').val();
				if (katakana_first == '' || katakana_first == null){
					flag=1;
					$('#phonetic_error').html('フリガナ’セイ’を入力して下さい！');
				} else {	
					var each_val = katakana_first.split('');
					$.each(each_val, function (key, value) {
						code = value.charCodeAt();
						if (!(12449 <= code && code <= 12538)) {
							flag=1;
							$('#phonetic_error').html('フリかな’メイ’を入力して下さい！');
						}
					});
				}

				var code = 0;
				var katakana_second = $('input[name=phonetic2]').val();
				if (katakana_second == '' || katakana_second == null){
					flag=1;
					$('#phonetic2_error').html('フリガナ’セイ’を入力して下さい！');
				} else {	
					var each_val = katakana_second.split('');
					$.each(each_val, function (key, value) {
						code = value.charCodeAt();
						if (!(12449 <= code && code <= 12538)) {
							flag=1;
							console.log(code);
							$('#phonetic2_error').html('フリかな’メイ’を入力して下さい！');
						}
					});
				}

				//phone validations
				if ($('input[name=phone_no]').val() == '' || $('input[name=phone_no]').val() == null){
					$('#phone_error').html('電話番号を入力して下さい！');
					flag = 1;
				} else {
					var phone = $('input[name=phone_no]').val();
					var n = phone.length;
					if (n < 10){
						$('#phone_error').html('電話番号は10文字以上にする必要があります。');
						flag = 1;
					}
				}

				//postal code validation
				var postal = $('#postal_code').val();
				var reg = new RegExp('^\\d+$');
				if(!reg.test(postal)){
					$('#postal_error').html('数字のみ入力してください ');
					flag = 1
				}else if(postal.length > 7 || postal.length < 7){					
					$('#postal_error').html('郵便番号は７文字で入力して下さい。');
					flag = 1;
				}else{
					$('#postal_error').html('');
				}
				console.log(flag);

				//prefecture validations
				if ($('#prefectures').val() == '' || $('#prefectures').val() == null){
					$('#prefecture_error').html('都府県を選択して下さい！');
					flag = 1;
				} 
				console.log(flag);

				//municipility validations
				if ($('input[name=municipility]').val() == '' || $('input[name=municipility]').val() == null){
					$('#municipility_error').html('市区町村を入力して下さい！');
					flag = 1;
				} 
				console.log(flag);

				let birthYear = $( "#year option:selected" ).val();
				let birthMonth = $( "#month option:selected" ).val();
				let birthDay = $( "#day option:selected" ).val();
				$("#dob").val(birthYear+'-'+birthMonth+'-'+birthDay);

				if (flag == 1)
					return false;
				else{
					return true;
				}
			});

			$("form").submit(function() {
				$(this).find('input[type="submit"]').prop("disabled", true);
			});

			$( ".year" ).children('option').each(function( index ) {
				$( this ).text($( this ).text())
			});
		});

		function readURL(input) {
			if (input.files && input.files[0]) {
				var reader = new FileReader();
				reader.onload = function (e) {
					$('#blah')
						.attr('src', e.target.result)
						.width(150)
						.height(200);
					$('#blah').removeClass('hide');
				};
				reader.readAsDataURL(input.files[0]);
			}
		}

		$(function() { 
			$("input[name='phone_no']").on('input', function(e) { 
				$(this).val($(this).val().replace(/[^0-9]/g, '')); 
			}); 
			$("input[name='postal_code']").on('input', function(e) { 
				$(this).val($(this).val().replace(/[^0-9]/g, '')); 
			}); 
		});


		//date of birth datepicker and select previous date bydefault
		var parts = '{{empty($user->profile->dob)? null : $user->profile->dob}}';
		var selectedDay = 0;
		var selectedMonth = 0;
		var selectedYear = 0;
		if(parts){
			parts = parts.split('-');
			selectedDay = parts[2];
			selectedMonth = parts[1];
			selectedYear = parts[0];
		}

		(function () {
			var year_start = (new Date).getFullYear() - 18;
			var year_end =  year_start - 102;
			var selected_year = selectedYear;

			var option = '<option value="">年</option>';  //first option

			for (var i = year_start; i >= year_end; i--) {
				var selected = (i == selected_year) ? ' selected' : '';
				option += '<option value="' + i + '"'+selected+'>' + i + '</option>';
			}
			document.getElementById('year').innerHTML = option;
		})();

		(function () {
			var selected_month = selectedMonth; // 0 first option
			var option = '<option value="">月</option>';  //first option
			for (var i = 1; i < 13; i++) {
				var selected = (i == selected_month) ? ' selected' : '';
				var month = (i <= 9) ? '0'+i : i;

				option += '<option value="' + month + '"'+selected+'>' + i + '月</option>';
			}
			document.getElementById('month').innerHTML = option;
		})();

		(function () {
			var selected_day = selectedDay;
			var option = '<option value="">日</option>';
			for (var i = 1; i <= 31; i++) {
				var selected = (i == selected_day) ? ' selected' : '';
				var day = (i <= 9) ? '0'+i : i;

				option += '<option value="' + day + '"'+selected+'>' + day + '日</option>';
			}
			document.getElementById('day').innerHTML = option;
		})();
	</script>
@stop
