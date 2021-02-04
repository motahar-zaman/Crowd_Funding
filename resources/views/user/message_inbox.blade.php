@extends('main_layout')
@section('title') 
メッセージ | Crofun
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
		  border-color: #343a40 !important;
		}
	  	.form-control{
	    	border-radius: none !important;
	  	}
	  	.text-center {
	  		text-align: center !important;
	 	}
	 	a{
			color: #000000;
	 	}
		a:hover{
			text-decoration: none;
			color: #000000;
		}
		.bold{
			font-weight: bold;
		}

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
		@media (max-width: 830px) {
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


	</style>
@stop

@section('ecommerce')

@stop

@section('content')

@include('user.layouts.tab')

<div class="container">
	<div class="row container_div">
		<div class="col-md-12 col-sm-12 col-12">
			<div class="mt20" style="min-height: 550px">
				<div class="row">
					<div class="col-md-3">
						@include('user.layouts.message')
					</div>
					<div class="col-md-9">
          	 			<div class="">
            				<div class="col-md-12 col-12">
              					<div class="row border bg-light">
									<div class="col-md-1 col-1">
										<input type="checkbox" name=""  value="1" id="markAll"  class="mt-4">
									</div>
									<div class="col-md-6 col-6">
										<p class="pt-3">件名</p>
									</div>
									{{--<div class="col-md-2 col-2">
										<p class="pt-3">差出人</p>
									</div>--}}
									<div class="col-md-3 col-3">
										<p class="pt-3">名前</p>
									</div>
									<div class="col-md-2 col-2">
										<p class="pt-3">日付</p>
									</div>
              	 				</div>
								 {!! Form::open(['route' => 'user-delete-multiple-message', 'method' => 'post']) !!}
								 <!-- previous work -->

								 <!-- edited by sabik -->
								 <?php //$current_user = Auth::user()->id; ?>
									@if($threads)
										@foreach ($threads as $t)
											<a href="{{ route('show-message', $t->id) }}">
												<div class="row border">
													<div class="col-md-1 col-1">
														<input type="checkbox" name="delete[]" value="{{$t->id}}"  class="mt-4 msg">
													</div>
													<div class="col-md-6 col-6">
														@if($t->side1 == $current_user)
															<p class="pt-3 {{($t->read_status_side1 == 2)?'':'bold'}}">{{$t->title}}</p>
														@else
															<p class="pt-3 {{($t->read_status_side2 == 2)?'':'bold'}}">{{$t->title}}</p>
														@endif
													</div>
												
													@if($t->side_1 == 0 || $t->side_2 == 0)
														<div class="col-md-3 col-3">
															<p class="pt-3 {{($t->read_status_side2 == 2)?'':'bold'}}">Admin</p>
														</div>
													@else
														<div class="col-md-3 col-3">
															@if($t->side1->id == $current_user->id)
																<p class="pt-3 {{($t->read_status_side1 == 2)?'':'bold'}}">{{$t->side2->first_name}}{{$t->side2->last_name}}</p>
															@else
																<p class="pt-3 {{($t->read_status_side2 == 2)?'':'bold'}}">{{$t->side1->first_name}}{{$t->side1->last_name}}</p>
															@endif
														</div>
													@endif
													<div class="col-md-2 col-2">
														@if($t->side1 == $current_user)
															<p class="pt-3 {{($t->read_status_side1 == 2)?'':'bold'}}">{{ $t->last_message_time}}</p>
														@else
															<p class="pt-3 {{($t->read_status_side2 == 2)?'':'bold'}}">{{ $t->last_message_time}}</p>
														@endif
													</div>
												</div>
											</a>
										@endforeach
									@endif
									<div class="msg_delete">
										@if (!$threads->isEmpty())
											<button type="submit" class="msg_delete_btn"><i class="fa fa-trash-o" aria-hidden="true"></i></button>
										@else
											<button type="button" class="msg_delete_btn"><i class="fa fa-trash-o" aria-hidden="true"></i></button>
										@endif
									</div>
							 </form>
						 </div>

					 </div>
				 </div>
				 	{{--@php
						$error = 0;
						if (empty($user->first_name) || empty($user->last_name) || empty($user->profile->phonetic) ||  empty($user->profile->phonetic2) ||  empty($user->profile->postal_code) || empty($user->profile->prefectures) || empty($user->profile->phone_no) || empty($user->profile->municipility)) {
							$error = 1;
						}
					@endphp
					<input type="hidden" name="getError" id="getError" value="{{ $error }}">--}}
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
			$('#markAll').on('change', function(e){
				if ($(this).is(':checked')) {
					$('.msg').prop('checked', true);

			   } else {
					 $('.msg').prop('checked', false);

			   }
			});
		});
	</script>

	<script type="text/javascript">
	    // var error = document.getElementById('getError').value;
			// var error = $('#getError').val();

			// // error = 1;
			// 	$(window).on('load',function(){
			// 		console.log('error = ' + error);
			// 			if (error == 1) {
			// 				$('#myModal').modal('show');
			// 			}
			// 	});




			// $('#myModal').modal({
    	// 	backdrop: 'static',
    	// 	keyboard: false  // to prevent closing with Esc button (if you want this too)
			// });
	</script>

@stop
