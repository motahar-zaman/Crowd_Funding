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
	</style>
@stop


@section('ecommerce')

@stop

@section('content')


<div class="container" id="new-project">


<div class="mt20">
	<div class="row">
		<div class="col-md-3">
			@include('user.layouts.profile')
		</div>
		<div class="col-md-9">


			<div class="card padding">

			@include('layouts.message')

			<form action="" method="POST" enctype="multipart/form-data">

				{{ csrf_field() }}

			    <div class="form-group row">
			      <label for="inputEmail3" class="col-sm-2 col-form-label">名</label>
			      <div class="col-sm-10">
			        <input type="text" class="form-control" id="inputEmail3" placeholder="姓" value="{{old('first_name' , $user->first_name)}}" name="first_name">
			        @if ($errors->has('first_name'))
                        <span class="help-block text-danger">
                            <strong>{{ $errors->first('first_name') }}</strong>
                        </span>
                    @endif
			      </div>
			    </div>
			    <div class="form-group row">
			      <label for="inputEmail3" class="col-sm-2 col-form-label">姓</label>
			      <div class="col-sm-10">
			        <input type="text" class="form-control" id="inputEmail3" placeholder="名" value="{{old('last_name', $user->last_name)}}" name="last_name">
			        @if ($errors->has('last_name'))
                        <span class="help-block text-danger">
                            <strong>{{ $errors->first('last_name') }}</strong>
                        </span>
                    @endif
			      </div>
			    </div>
			    <div class="form-group row">
			      <label for="inputEmail3" class="col-sm-2 col-form-label">フリガナ</label>
			      <div class="col-sm-10">
			        <input type="text" class="form-control" id="inputEmail3" placeholder="フリガナ" value="{{ isset($user->profile->phonetic) ? old('phonetic', $user->profile->phonetic) : ''}}" name="phonetic">
			        @if ($errors->has('phonetic'))
                        <span class="help-block text-danger">
                            <strong>{{ $errors->first('phonetic') }}</strong>
                        </span>
                    @endif
			      </div>
			    </div>
			    <div class="form-group row">
			      <label for="inputEmail3" class="col-sm-2 col-form-label">アイコン画像</label>
			      <div class="col-sm-10">
			        <input type="file" class="form-control" id="inputEmail3" placeholder="アイコン画像" name="pic">
			        @if ($errors->has('pic'))
                        <span class="help-block text-danger">
                            <strong>{{ $errors->first('pic') }}</strong>
                        </span>
                    @endif
			      </div>
			    </div>
			    <div class="form-group row">
			      <label for="inputEmail3" class="col-sm-2 col-form-label">URL</label>
			      <div class="col-sm-10">
			        <input type="text" class="form-control" id="inputEmail3" placeholder="URL" name="url" value="{{ (isset($user->profile->url) && $user->profile->url) ? old('url', $user->profile->url) : old('url')}}">
			        @if ($errors->has('url'))
                        <span class="help-block text-danger">
                            <strong>{{ $errors->first('url') }}</strong>
                        </span>
                    @endif
			      </div>
			    </div>
			    <div class="form-group row">
			      <label for="inputEmail3" class="col-sm-2 col-form-label">プロフィール</label>
			      <div class="col-sm-10">
			        <textarea type="text" class="form-control" id="inputEmail3" placeholder="プロフィール" name="profile">{{isset($user->profile->url) ? old('profile', $user->profile->url) : old('profile')}}</textarea>
			        @if ($errors->has('profile'))
                        <span class="help-block text-danger">
                            <strong>{{ $errors->first('profile') }}</strong>
                        </span>
                    @endif
			      </div>
			    </div>
			    <div class="form-group row">
			      <label for="inputEmail3" class="col-sm-2 col-form-label">生年月日</label>
			      <div class="col-sm-3">
			       	<select name="birth_year" class="form-co
							ntrol">
			       		<?php for($i=1917; $i<=date('Y'); $i++){?>
			       			<option value="{{$i}}" @if (isset($user->profile->dob) && $user->profile->dob)
			       				{{ date('Y', strtotime($user->profile->dob)) == $i?'selected':'' }}
									@else
									{{ 	$user->profile->dob = '' }}
			       			@endif>{{$i}}</option>
			       		<?php }?>
			       	</select>
			        @if ($errors->has('birth_year'))
                        <span class="help-block text-danger">
                            <strong>{{ $errors->first('birth_year') }}</strong>
                        </span>
                    @endif
			      </div>

			      <div class="col-sm-3">
			       	<select name="birth_month" class="form-control">
			       		<?php for($i=1; $i<=12; $i++){?>
			       			<option value="{{$i}}" {{date('m', strtotime($user->profile->dob)) == $i?'selected':'' }}>{{$i}}</option>
			       		<?php }?>
			       	</select>
			        @if ($errors->has('birth_month'))
                        <span class="help-block text-danger">
                            <strong>{{ $errors->first('birth_month') }}</strong>
                        </span>
                    @endif
			      </div>

			      <div class="col-sm-3">
			       	<select name="birth_day" class="form-control">
			       		<?php for($i=1; $i<=31; $i++){?>
			       			<option value="{{$i}}" {{date('d', strtotime($user->profile->dob)) == $i?'selected':'' }}>{{$i}}</option>
			       		<?php }?>
			       	</select>
			        @if ($errors->has('birth_day'))
                        <span class="help-block text-danger">
                            <strong>{{ $errors->first('birth_day') }}</strong>
                        </span>
                    @endif
			      </div>
			    </div>


			    <div class="form-group row">
			      <label for="inputEmail3" class="col-sm-2 col-form-label">住所</label>

			      <div class="col-sm-10">
			      	<div class="row">



				      <label for="inputEmail3" class="col-sm-3 col-form-label">郵便番号 :</label>
				      <div class="col-sm-9">
				        <input type="number" class="form-control" id="inputEmail3" placeholder="郵便番号" name="postal_code" value="{{old('postal_code',$user->profile->postal_code)}}">
				        @if ($errors->has('postal_code'))
	                        <span class="help-block text-danger">
	                            <strong>{{ $errors->first('postal_code') }}</strong>
	                        </span>
	                    @endif
				      </div>


				      <label for="inputEmail3" class="col-sm-3 col-form-label">都道府県 :</label>
				      <div class="col-sm-9">
				        <input type="text" class="form-control" id="inputEmail3" placeholder="都道府県" name="division" value="{{old('division',$user->profile->division)}}">
				        @if ($errors->has('division'))
	                        <span class="help-block text-danger">
	                            <strong>{{ $errors->first('division') }}</strong>
	                        </span>
	                    @endif
				      </div>

				      <label for="inputEmail3" class="col-sm-3 col-form-label">市区町村 :</label>
				      <div class="col-sm-9">
				        <input type="text" class="form-control" id="inputEmail3" placeholder="市区町村" name="municipility" value="{{old('municipility', $user->profile->municipility)}}">
				        @if ($errors->has('municipility'))
	                        <span class="help-block text-danger">
	                            <strong>{{ $errors->first('municipility') }}</strong>
	                        </span>
	                    @endif
				      </div>

				      <label for="inputEmail3" class="col-sm-3 col-form-label">それ以降の住所 :</label>
				      <div class="col-sm-9">
				        <input type="text" class="form-control" id="inputEmail3" placeholder="それ以降の住所" name="address" value="{{old('address',$user->profile->address)}}">
				        @if ($errors->has('address'))
	                        <span class="help-block text-danger">
	                            <strong>{{ $errors->first('address') }}</strong>
	                        </span>
	                    @endif
				      </div>

				      <label for="inputEmail3" class="col-sm-3 col-form-label">マンション名・部屋番号 :</label>
				      <div class="col-sm-9">
				        <input type="text" class="form-control" id="inputEmail3" placeholder="マンション名・部屋番号" name="room_no" value="{{old('room_no',$user->profile->room_no)}}">
				        @if ($errors->has('room_no'))
	                        <span class="help-block text-danger">
	                            <strong>{{ $errors->first('room_no') }}</strong>
	                        </span>
	                    @endif
				      </div>

			      	</div>
			      </div>
			    </div>

			    <div class="form-group row">
			      <label for="inputEmail3" class="col-sm-2 col-form-label">電話番号</label>
			      <div class="col-sm-10">
			        <input type="text" class="form-control" id="inputEmail3" placeholder="電話番号" name="phone_no" value="{{old('phone_no',$user->profile->phone_no)}}">
			        @if ($errors->has('phone_no'))
                        <span class="help-block text-danger">
                            <strong>{{ $errors->first('phone_no') }}</strong>
                        </span>
                    @endif
			      </div>
			    </div>



			    <div class="form-group row">
			      <label for="inputEmail3" class="col-sm-2 col-form-label">性別</label>
			      <div class="col-sm-10">

			      	<div class="row">
			        	<div class="col-sm-3">
					        <div class="form-check">
					          <label class="form-check-label">
					            <input class="form-check-input" type="radio" name="sex" id="gridRadios2" value="1" {{old('sex', $user->profile->sex) == 1?'checked':''}}>
					            男性
					          </label>
					        </div>
					    </div>
					    <div class="col-sm-3">
					        <div class="form-check">
					          <label class="form-check-label">
					            <input class="form-check-input" type="radio" name="sex" id="gridRadios3" value="2" {{old('sex', $user->profile->sex) == 2?'checked':''}}>
					            女性
					          </label>
					        </div>
					    </div>

			        </div>
			      </div>
			    </div>

			    <div class="form-group row">
			      <div class="offset-sm-2 col-sm-10">
			        <button type="submit" class="btn btn-primary">変更する</button>
			      </div>
			    </div>
			  </form>


			  </div>


		</div>
	</div>

</div>

</div>





@stop

@section('custom_js')

@stop
