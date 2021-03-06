@extends('main_layout')

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
			background-color: #C6C6C6;
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
			margin-top: 30px;
			margin-bottom: 30px;
		}
		.bg-danger{
			/* opacity: 0.9 !important; */
			background-color: #ffe3da !important;
		}

	/* .project_status {
    position: absolute;
    top: 15px;
    left: 3px;
    width: auto;
    padding: 5px;
    padding-left: 15px;
    padding-right: 15px;
    text-align: center;
		background-color: #ff6540;
	} */
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
	.heading2:after{
		background-color: #FFBC00;
	}
	.btn{
		font-size:16px;
		padding: 11px;
	}



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
				font-size: 9px;
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
		}


	</style>
@stop

@section('ecommerce')

@stop

@section('content')

@include('user.layouts.tab')

<div class="container">
	<div class="row">
		<div class="offset-md-1 col-md-10 col-12">
			<div class="mt20">
				<div class="row">
					<div class="col-md-3">
						@include('user.layouts.profile')
					</div>
					<div class="col-md-9 project-details-block-padding">
						<div class="row">							
							<div class="col-md-12 col-12 pt-3">
								<h4 class="heading">Heading first</h4>
							</div>
						</div>
						@foreach ($products as $product)
							<div class="row inner mb-5">
								<div class="col-md-12 col-12">
									<div class="row inner_inner">
										<div class="col-md-6">
											<div class="row">
												<div class="col-md-12 project-item">
													<img src="{{ asset('uploads/products/'.$product->profile_info_image) }}" alt="" class="img-fluid">
													<div class="project_status text-white" >?????????</div>
												</div>
											</div>
										</div>
										<div class="col-md-6">
											<div class="row ">
												<div class="col-md-8">
													<h6 class="" style="font-size:14px; color:#bfc5cc;"> <span style="color:#bfc5cc;">?????????????????????????????????</h6>
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
												@if (empty($isFavourite))
													<div class="col-md-4 col-sm-6 category_favourite">
														@if ($fav == 0)
															<a href="{{ route('user-favourite-add-project', $product->id) }}" class="pull-right" style="font-size:14px;"><span style="color:#ed49b6;"> <i class="fa fa-heart"></i> </span>????????????????????????</a>
														@else
															<span class="pull-right" style="font-size:14px;"><span style="color:#555"> <i class="fa fa-heart-o"></i> </span>???????????????</span>

														@endif
													</div>

												@endif
											</div>
											<div class="row mt-1">
												<div class="col-md-12">
													<h5 style="font-size:16px;" class="font-weight-bold">{{$product->title}}</h5>
												</div>
											</div>
											<div class="row mt-3">
												<div class="col-md-9">
													<h5 style="font-size:21px; letter-spacing:2px;">1,900 ????????????</h5>
												</div>
											</div>
											<div class="row  mt-2">
												<div class="col-md-9">
													<h5 style="font-size:15px; letter-spacing:2px;">1??? ??? ??? ??? L ???</h5>
												</div>
											</div>
											<div class="row  mt-2">
												<div class="col-md-9">
													<h5 style="font-size:15px; letter-spacing:2px;">????????????2018???10???1???</h5>
												</div>
											</div>
											<div class="row  mt-2">
												<div class="col-md-9">
													<h5 style="font-size:13px; letter-spacing:2px;">??????????????????????????????</h5>
												</div>
											</div>
											<div class="row mt-3">
												<div class="col-md-6 pr-md-1">
														<button type="button" class="bg-dark text-white btn btn-lg btn-block w6-14"><span style="color:#fff !important; "> <i class="fa fa-envelope"></i> </span> ????????????????????????</button>
												</div>
												<div class="col-md-6 pl-md-1">
														<button type="button" class="editbtn text-white btn btn-lg btn-block w6-14 btn-warning" data-toggle="modal" data-target="#star">?????????  ?????????????????????</button>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						@endforeach
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@include('user.layouts.star-rating')
@stop

@section('custom_js')

@stop
