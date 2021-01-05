<div class="modal fade" aria-hidden="true" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"  >
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-body row justify-content-center">
				<div class="">
					<div class="col-md-12">
						@if (Auth::check())
							<div class="row well p-0 m-0 justify-content-center">
								<div class="col-md-10 offset-1 my-5">
									<h5 class="">Crofunで活動を行うために下記の情報を記載お願いします。</h5>
								</div>
								<div class="col-md-11 col-11 ">
									{!! Form::open(['route' => 'user-profile-update-action', 'method' => 'post', 'id'=> 'formID']) !!}
									<div class="row border">
										<div class="col-md-3 col-3 bg-dark">
											<p class="pt-3 ">氏名 <img height="14px" src="{{Request::root()}}/assets/front/img/requir.png"></p>
										</div>
										<div class="col-md-9 col-9 ">
											<div class="row pt-2">
												<div class="col-md-3 col-3 p-0 ml-5">
													<input type="text" class="form-control" id="first_name" placeholder="姓" value="{{$user->first_name}}" name="first_name" maxlength="10" onclick="removealert('firstname_error')">
													<span class="error_font" id="firstname_error" style="color:red;"></span>
													@if ($errors->has('first_name'))
														<span class="help-block text-danger">
															<strong>{{ $errors->first('first_name') }}</strong>
														</span>
													@endif
												</div>
												<div class="col-md-3 col-3 p-0 m-0">
													<input type="text" class="form-control mx-1" id="last_name"  placeholder="名" value="{{$user->last_name}}" name="last_name" required maxlength="10" onclick="removealert('lastname_error')">
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
										<div class="col-md-3 col-3 bg-dark">
											<p class="pt-3 ">フリガナ  <img height="14px" src="{{Request::root()}}/assets/front/img/requir.png"></p>
										</div>
										<div class="col-md-9 col-9 ">
											<div class="row pt-2">
												<div class="col-md-3 col-3 p-0 ml-5">
													<input type="text" class="form-control" id="phonetic" placeholder="セイ" value="{{old('phonetic')}}" name="phonetic" maxlength="10" onclick="removealert('phonetic_error')">
													<span class="error_font" id="phonetic_error" style="color:red;"></span>
													@if ($errors->has('phonetic'))
														<span class="help-block text-danger">
															<strong>{{ $errors->first('phonetic') }}</strong>
														</span>
													@endif
												</div>
												<div class="col-md-3 col-3 p-0 ml-1">
													<input type="text" class="form-control" id="phonetic2" placeholder="メイ" value="{{old('phonetic2')}}" name="phonetic2" maxlength="10" onclick="removealert('phonetic2_error')">
													<span class="error_font" id="phonetic2_error" style="color:red;"></span>
													@if ($errors->has('phonetic2'))
														<span class="help-block text-danger">
															<strong>{{ $errors->first('phonetic') }}</strong>
														</span>
													@endif
												</div>
											</div>
										</div>
									</div>
									<div class="row border">
										<div class="col-md-3 col-3 bg-dark">
											<p class="pt-3 ">生年月日</p>
										</div>
										<div class="col-md-9 col-9 ">
											<div class="pt-2 ml-5">
												<input  type="hidden" id="dob" name="dob">
											</div>
										</div>
									</div>
									<div class="row border">
										<div class="col-md-3 col-3 bg-dark">
											<p class="pt-3 ">性別</p>
										</div>
										<div class="col-md-9 col-9 ">
											<div class="row pt-2">
												<div class="col-md-6 col-6 p-0 ml-5">
													<select name="sex" class="form-control " >
														<option value="">選択してください</option>
														<option value="1" {{ old('sex') == 1 ? 'selected' : '' }}>男性</option>
														<option value="2" {{ old('sex') == 2 ? 'selected' : '' }}>女性</option>
														<option value="3" {{ old('sex') == 3 ? 'selected' : '' }}>末記入</option>
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
										<div class="col-md-3 col-3 bg-dark">
											<p class="pt-3 ">電話番号  <img height="14px" src="{{Request::root()}}/assets/front/img/requir.png"></p>
										</div>
										<div class="col-md-9 col-9 ">
											<div class="row pt-2">
												<div class="col-md-6 col-6 p-0 ml-5">
													<input type="text" class="form-control phone" id="phone_no" placeholder="電話番号" name="phone_no" value="{{old('phone_no')}}" onclick="removealert('phone_error')">
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
										<div class="col-md-3 col-3 bg-dark">
											<p class="pt-3 ">住所  <img height="14px" src="{{Request::root()}}/assets/front/img/requir.png"></p>
										</div>
										<div class="col-md-9 col-9 ">
											<div class="row pt-2">
												<div class="col-md-6 col-6 p-0 ml-5">
													<input type="text" class="form-control required" id="postal_code" placeholder="郵便番号" name="postal_code" value="{{old('postal_code')}}" maxlength="7" onclick="removealert('postal_error')">
													<span class="error_font" id="postal_error" style="color:red;"></span>
													@if ($errors->has('postal_code'))
														<span class="help-block text-danger">
															<strong>{{ $errors->first('postal_code') }}</strong>
														</span>
													@endif
												</div>
											</div>
											<div class="row pt-2">
												<div class="col-md-3 col-3 p-0 ml-5">
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
													<input type="text" class="form-control" id="municipility" placeholder="市区町村" name="municipility" value="{{old('municipility')}}" onclick="removealert('municipility_error')">
													<span class="error_font" id="municipility_error" style="color:red;"></span>
													@if ($errors->has('municipility'))
														<span class="help-block text-danger">
															<strong>{{ $errors->first('municipility') }}</strong>
														</span>
													@endif
												</div>
											</div>
											<div class="row pt-2">
												<div class="col-md-6 col-6 p-0 ml-5">
													<input type="text" class="form-control required" id="inputEmail3" placeholder="それ以降の住所" name="address" value="{{old('address')}}">
													@if ($errors->has('address'))
														<span class="help-block text-danger">
															<strong>{{ $errors->first('address') }}</strong>
														</span>
													@endif
												</div>
											</div>
											<div class="row pt-2 pb-2">
												<div class="col-md-6 col-6 p-0 ml-5">
													<input type="text" class="form-control " id="inputEmail3" placeholder="マンション名・部屋番号" name="room_no" value="{{old('room_no')}}">
													@if ($errors->has('room_no'))
														<span class="help-block text-danger">
															<strong>{{ $errors->first('room_no') }}</strong>
														</span>
													@endif
												</div>
											</div>
										</div>
									</div>
									<div class="row p-5">
										<div class="col-md-1 col-1 offset-5">
											<input type="submit" id="submit" name="submit" class="btn btn-md  text-white font-wight-bold w6-18" style="background-color: #575757" value="更新する">
										</div>
									</div>
									{!! Form::close() !!}
								</div>
							</div>
						@endif
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<?php 
	$defaultDate = old('dob');
?>

<script src="https://cdn.jsdelivr.net/npm/jquery-dropdown-datepicker@1.2.2/dist/jquery-dropdown-datepicker.min.js"></script>
	<script type="text/javascript">
    function removealert(name)
		{
			$('#'+name).html(' ');
		}
		$(document).ready(function(){
      	
      $("#dob").dropdownDatepicker({

        // Populate the widget with a default date.
        defaultDate: '{{ old('dob') }}',

        // The format of the date string provided to defaultDate
        defaultDateFormat: "yyyy-mm-dd",

        // Specify the order in which the dropdown fields should be rendered.
        displayFormat: "ymd",

        // Specify the format the submitted date should take.
        submitFormat: "yyyy-mm-dd",

        // Indicates the minimum age the widget will accept.
        minAge: 18,

        // Indicates the maximum age the widget will accept.
        maxAge: 120,

        // The lowest year option that will ba available.
        minYear: null,

        // The highest year option that will be available.
        maxYear: null,

        // Specify the name attribute for the hidden field that will contain the formatted date for submission.
        submitFieldName: "date",

        // Specify a classname to add to the widget wrapper.
        wrapperClass: "row",

        // Set custom classes on generated dropdown elements
        dropdownClass: 'col-md-3 form-control',

        // Indicates whether day numbers should include their suffixes when displayed to the user
        daySuffixes: true,
        monthSuffixes: false,

        // Specify the format dates should be in when presented to the user
        monthFormat: "short",

        // Whether the required html5 attribute should be applied to the generated select elements
        required: false,

        // Identifies the "Day" dropdown
        dayLabel: '日',

        // Identifies the "Month" dropdown
        monthLabel: '月',

        // Identifies the "Year" dropdown
        yearLabel: '年',

        // Long month dropdown values (can be overridden for internationalisation purposes)
        monthLongValues: ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'],

        // Short month dropdown values (can be overridden for internationalisation purposes)
        // monthShortValues: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
				monthShortValues: ['1月', '2月', '3月', '4月', '5月', '6月', '7月', '8月', '9月', '10月', '11月', '12月'],

        // Initial dropdown values (can be overridden for internationalisation purposes)
        initialDayMonthYearValues: ['Day', 'Month', 'Year'],

        // Ordinal indicators (can be overridden for internationalisation purposes)
        // daySuffixValues: ['st', 'nd', 'rd', 'th']
				daySuffixValues: ['日', '日', '日', '日']
        });

        
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

				//prefecture validations
				if ($('#prefectures').val() == '' || $('#prefectures').val() == null){
					$('#prefecture_error').html('都府県を選択して下さい！');
					flag = 1;
				}

				//municipility validations
				if ($('input[name=municipility]').val() == '' || $('input[name=municipility]').val() == null){
					$('#municipility_error').html('市区町村を入力して下さい！');
					flag = 1;
				}

				if (flag == 1)
					return false;
				else{
					return true;
				}
			});
      $( ".year" ).children('option').each(function( index ) {
				$( this ).text($( this ).text())
      });

      $("form").submit(function() {
					$(this).find('input[type="submit"]').prop("disabled", true);
			});
		});
	</script>
	<script type="text/javascript">
		$(function() { 
			$("input[name='phone_no']").on('input', function(e) { 
				$(this).val($(this).val().replace(/[^0-9]/g, '')); 
			}); 
			$("input[name='postal_code']").on('input', function(e) { 
				$(this).val($(this).val().replace(/[^0-9]/g, '')); 
			}); 
		});
	</script>