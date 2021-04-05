@extends('main_layout')
@section('title')
{{$title}}
@stop
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
  
		@media (max-width: 575.73px) {
			.side_padding{
				padding:0px 8px!important;
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
						<div class="row">
							<div class="col-md-12">
								@if (session('success_message'))
									<h4 class="py-2 p-2 bg-success text-white">{{session('success_message')}}</h4>
								@elseif (session('error_message'))
									<h4 class="py-2 p-2 bg-danger text-white">{{session('error_message')}}</h4>
								@endif
							</div>
						</div>

						<div class="">
							@if($user->facebook_id != null || $user->google_id != null || $user->twitter_id !=null || $user->facebook_id != '' || $user->google_id != '' || $user->twitter_id != '')
                  				<h4 class="py-2">パスワード変更 <span style="font-size:10px;color:red">* SNSを使用してログイン中です!</span></h4>
							@else
                  				<h4 class="py-2">パスワード変更</h4>	
							@endif
                  			<div class="col-md-12 col-12">
                  				<form action="{{ route('user-change-password-action') }}" method="POST" enctype="multipart/form-data">
									{{ csrf_field() }}
									<div class="row border">
										<div class="col-md-3 side_padding col-3 bg-dark">
											<p class="pt-3 change_title">現在のパスワード</p>
										</div>
										<div class="col-md-9 col-9  pt-2">
											@if($user->facebook_id != null || $user->google_id != null || $user->twitter_id !=null || $user->facebook_id != '' || $user->google_id != '' || $user->twitter_id != '')
												<input type="password" class="form-control" id="inputEmail3" placeholder="" name="current_password" value="" readonly>
											@else
												<input type="password" class="form-control" id="inputEmail3" placeholder="" name="current_password" value="">
											@endif
									        @if ($errors->has('current_password'))
						                        <span class="help-block text-danger">
						                            <strong>{{ $errors->first('current_password') }}</strong>
						                        </span>
						                    @endif
										</div>
									</div>

									<div class="row border">
										<div class="col-md-3 side_padding col-3 bg-dark">
											<p class="pt-3 change_title">新しいパスワード</p>
										</div>
										<div class="col-md-9 col-9  pt-2">
											@if($user->facebook_id != null || $user->google_id != null || $user->twitter_id !=null || $user->facebook_id != '' || $user->google_id != '' || $user->twitter_id != '')
												<input type="password" class="form-control" id="inputEmail3" placeholder="" name="password" value="" readonly>
											@else
												<input type="password" class="form-control" id="inputEmail3" placeholder="" name="password" value="">
											@endif
									        @if ($errors->has('password'))
						                        <span class="help-block text-danger">
						                            <strong>{{ $errors->first('password') }}</strong>
						                        </span>
						                    @endif
										</div>
									</div>

									<div class="row border">
										<div class="col-md-3 side_padding col-3 bg-dark">
											<p class="pt-3 change_title">新しいパスワード確認</p>
										</div>
										<div class="col-md-9 col-9  pt-2">
											@if($user->facebook_id != null || $user->google_id != null || $user->twitter_id !=null || $user->facebook_id != '' || $user->google_id != '' || $user->twitter_id != '')
												<input type="password" class="form-control" id="inputEmail3" placeholder="" name="password_confirmation" value="" readonly>
											@else
												<input type="password" class="form-control" id="inputEmail3" placeholder="" name="password_confirmation" value="">
											@endif
									        @if ($errors->has('password_confirmation'))
						                        <span class="help-block text-danger">
						                            <strong>{{ $errors->first('password_confirmation') }}</strong>
						                        </span>
						                    @endif
										</div>
									</div>

									<div class="row p-5">
					                  <div class="col-md-12 col-12">
					                    <h4 class="text-center"><button type="submit" class="btn btn-md btn-bottom w6-18">更新する</a></h4>
					                  </div>
					                </div>
			                    </form>
                  			</div>

							<div class="align-items-center">
								<div class="col-md-12 my-auto text-center">
									@if($user->facebook_id != null || $user->google_id != null || $user->twitter_id !=null || $user->facebook_id != '' || $user->google_id != '' || $user->twitter_id != '')
									
									@else
										<a class="btn btn-link" style="padding-bottom: 0px; color: #007bff" onclick="kickUserOut()">
											パスワードをお忘れの方
										</a>
										<!-- <a class="btn btn-link" href="{{ route('password.request') }}" style="padding-bottom: 0px; ">
											パスワードをお忘れの方
										</a> -->
									@endif
								</div>
							</div>
                  		</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>





@stop

@section('custom_js')
<script>
	function kickUserOut(){
		window.location.href = "{{route('user-reset-password')}}";
	}
</script>
@stop
