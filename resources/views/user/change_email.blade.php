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
/*   
  @media (max-width: 1370px) {
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
				padding:0px 8px!important;
			}
			.side_title{
				font-size:7px;
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
					{{-- @include('user.layouts.tab') --}}
					{{-- @include('user.layouts.message_modal') --}}
					@include('layouts.message')
						<div class="">
							@if($user->facebook_id != null || $user->google_id != null || $user->twitter_id !=null || $user->facebook_id != '' || $user->google_id != '' || $user->twitter_id != '')
								<h4 class="py-2">メールアドレス変更 <span style="font-size:10px;color:red">* SNSを使用してログイン中です!</span></h4>
							@else
								<h4 class="py-2">メールアドレス変更</h4>
							@endif
							<div class="col-md-12 col-12">
								{!! Form::open(['route' => 'user-email-update-action', 'method' => 'post']) !!}

								<div class="row border">
									<div class="col-md-4 side_padding col-3 bg-dark">
									
										<p class="pt-3 side_title">現在のメールアドレス</p>
									</div>
									<div class="col-md-8 col-9 pt-2">
										<input type="email" class="form-control" id="inputEmail3" placeholder="" name="currentemail" value="{{$user->email}}" readonly>
										@if ($errors->has('email'))
											<span class="help-block">
												<strong>{{ $errors->first('email') }}</strong>
											</span>
										@endif
									</div>
								</div>

								<div class="row border">
									<div class="col-md-4 side_padding col-3 bg-dark">
										<p class="pt-3 side_title">変更メールアドレス</p>
									</div>
									<div class="col-md-8 col-9 pt-2">
										@if($user->facebook_id != null || $user->google_id != null || $user->twitter_id !=null || $user->facebook_id != '' || $user->google_id != '' || $user->twitter_id != '')
											<input type="email" class="form-control" id="inputEmail3" placeholder="" name="email" value="{{old('email')}}"  readonly>
										@else
											<input type="email" class="form-control" id="inputEmail3" placeholder="" name="email" value="{{old('email')}}" required>
										@endif
										@if ($errors->has('email'))
											<span class="help-block">
												<strong>{{ $errors->first('email') }}</strong>
											</span>
										@endif
									</div>
								</div>

								<div class="row border">
									<div class="col-md-4 side_padding col-3 bg-dark">
										<p class="pt-3 side_title">変更メールアドレス確認</p>
									</div>
									<div class="col-md-8 col-9 pt-2">
										@if($user->facebook_id != null || $user->google_id != null || $user->twitter_id !=null || $user->facebook_id != '' || $user->google_id != '' || $user->twitter_id != '')
											<input type="email" class="form-control" id="inputEmail3" placeholder="" name="email_confirmation" value="" readonly>
										@else
											<input type="email" class="form-control" id="inputEmail3" placeholder="" name="email_confirmation" value="" required>
										@endif
										@if ($errors->has('email_confirmation'))
											<span class="help-block">
												<strong>{{ $errors->first('email_confirmation') }}</strong>
											</span>
										@endif
									</div>
								</div>
							</div>
						</div>

						<div class="row p-5">
							<div class="col-md-1 offset-md-5 col-sm-2
							 text-center">
								<button type="submit" class="btn btn-md btn-bottom w6-18">更新する</button>
							</div>
						</div>
					</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

@stop

@section('custom_js')

@stop
