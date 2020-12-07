@extends('main_layout')
@section('title') 
お気に入り | Crofun
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
			background-color: #c6c6c6;
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
			margin-top: 10px;
			margin-bottom: 45px;
		}
		.bg-danger{
			/* opacity: 0.9 !important; */
			background-color: #ffe3da !important;
		}

	.project_status {
    position: absolute;
    top: 15px;
    left: 3px;
    width: auto;
    padding: 5px;
    padding-left: 15px;
    padding-right: 15px;
    text-align: center;
		background-color: #ff6540;
	}
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

		@media (min-width: 1250px) {
			.edit-button{
				min-width: 182px;
				padding:0px 15px;
			}
		}
		@media (max-width: 1320px) {
			.favfont{
				font-size: 13px !important;
			}
			.fontSize{
				font-size: 13px !important;
			}
			.message-button{
				font-size: 14px !important;
			}
			.user-title{
				font-size: 13px !important;
			}
		}
		@media (max-width: 1260px) {
			.message-button{
				font-size: 14px !important;
			}
			.user-title{
				font-size: 12px !important;
			}
		}
		
		@media (max-width: 1250px) {
			.edit-button{
				min-width: 172px;
				max-width: 172px;
				padding:0px 15px;
			}
			.fontSize{
				font-size: 13px !important;
			}
			.box-height{
				height: 77px !important;
			}
			.favfont{
				font-size: 12px !important;
			}
			
		}
		@media (max-width: 1210px) {
			.edit-button{
				min-width: 152px;
				padding:0px 10px;
			}
			.font{
				font-size: 18px !important;
			}
			.favfont{
				font-size: 11px !important;
			}
			.user-title{
				font-size: 10px !important;
			}
			.message-button{
				font-size: 12px !important;
			}
			.box-height-invest{
				height: 69px !important;
			}
			.pt-2{
				padding-top: 0.25rem !important;
			}
			.frame {
				height: 232px !important;      /* equals max image height */
				width: auto ;
				border: 1px solid #cccccc;
				white-space: nowrap;
				text-align: center;
			}
			.imageResize{
				max-height: 232px !important;
			}
		}
		@media (max-width: 1150px) {
			.edit-button{
				min-width: 142px;
				padding:0px 10px;
			}
			.fontSize{
				font-size: 12px !important;
			}
			.box-height-invest{
				height: 69px !important;
				width: 69px !important;
			}
			.message-button{
				font-size: 11px !important;
			}
			.font{
				font-size: 17px !important;
			}
		}
		@media (max-width: 1115px) {
			.edit-button{
				min-width: 132px;
				padding:0px 10px;
			}
			.fontSize{
				font-size: 12px !important;
			}
			.favfont{
				font-size: 10px !important;
			}
			.message-button{
				font-size: 11px !important;
			}
			.font{
				font-size: 16px !important;
			}
		}
		@media (max-width: 1085px) {
			.edit-button{
				min-width: 130px;
				padding:0px 10px;
			}
			.fontSize{
				font-size: 11px !important;
			}
			.message-button{
				font-size: 10px !important;
			}
			.font{
				font-size: 15px !important;
			}
			.box-height{
				height: 77px !important;
				width: 73px !important;
			}
			.fontTitle{
				font-size:18px !important;
			}

		}
		@media (max-width: 930px) {
			.edit-button{
				min-width: 103px;
				padding:0px 10px;
			}
			.fontSize{
				font-size: 11px !important;
			}
			.message-button{
				font-size: 10px !important;
			}
			.font{
				font-size: 14px !important;
			}
			.box-height-invest{
				height: 64px !important;
				width: 64px !important;
			}
			.font{
				font-size: 18px !important;
			}
			.fontTitle{
				font-size:16px !important;
			}
			.priceTitle{
				font-size:16px !important;
			}
		}
		@media (max-width: 830px) {
			.edit-button{
				min-width: 103px;
				max-width:130px;
				padding:0px 10px;
			}
			.fontSize{
				font-size: 9px !important;
			}
			.message-button{
				font-size: 10px !important;
			}
			.box-height-invest{
				height: 60px !important;
				width: 50px !important;
			}
			.comp_font{
				font-size: 12px !important;
			}
			.box-height{
				height: 70px !important;
				width: 60px !important;
			}
			.font{
				font-size: 13px !important;
			}
			.favfont{
				font-size: 8px !important;
			}
			.user-title{
				font-size: 9px !important;
			}
			.title{
				font-size: 18px!important;
			}
			.fontTitle{
				font-size:14px !important;
			}
			.priceTitle{
				font-size:14px !important;
			}
		}
		@media (max-width: 575.73px) {
			.edit-button{
				min-width: 170px;
				max-width:170px;
				padding:0px 10px;
			}
			.fontSize{
				font-size: 10px !important;
			}
			.message-button{
				font-size: 10px !important;
			}
			.box-height-invest{
				height: 70px !important;
				width: 80px !important;
			}
			.comp_font{
				font-size: 12px !important;
			}
			.box-height{
				height: 70px !important;
				width: 80px !important;
			}
			.font{
				font-size: 13px !important;
			}
			.favfont{
				font-size: 12px !important;
			}
			.user-title{
				font-size: 9px !important;
			}
			.title{
				font-size: 18px!important;
			}
			.fontTitle{
				font-size:18px !important;
			}
			.priceTitle{
				font-size:14px !important;
			}
			.margin_top{
				margin-top:1rem;
			}
			.editbtn{
				margin-top:0px;
			}
			.padding_mobile{
				padding:0px 15px !important;
			}
		}
		.frame {
			height: 245px;      /* equals max image height */
			width: auto;
			border: 1px solid #cccccc;
			white-space: nowrap;
			text-align: center;
		}
		.helper {
			display: inline-block;
			height: 100%;
			vertical-align: middle;
		}

	</style>
@stop


@section('ecommerce')

@stop

@section('content')

@include('user.layouts.tab')


<div class="container">
	<div class="row container_div">
		<div class=" col-md-12 col-12">
			<div class="mt20">
				<div class="row">
					<div class="col-md-3">
						@include('user.layouts.profile')
					</div>
					<div class="col-md-9">
						<div class="row">
							<div class="col-md-12 col-12">
								<div class="row inner">
									<div class="col-md-12 col-12 ">
										<div class="px-2 pt-3">
										</div>
									</div>
								</div>
							</div>
						</div>

						<div class="row">
							<div class="col-md-12 col-12">
								<ul class="nav nav-tabs" role="tablist">
									<li class="nav-item">
										<a class="nav-link {{Route::currentRouteName()=='user-favourite-project-list'?'active':''}}" href="{{route('user-favourite-project-list')}}">プロジェクト</a>
									</li>
									<li class="nav-item">
										<a class="nav-link {{Route::currentRouteName()=='user-favourite-product-list'?'active':''}}" href="{{route('user-favourite-product-list')}}">カタログ商品</a>
									</li>
								</ul>
								<div class="tab-content">
									<div id="home" class="tab-pane active row  mt-5">
										@foreach ($projects as $p)
											<?php
												$budget = $p->project->budget;
												$invested = $p->project->investment->where('status', true)->sum('amount');
												$done = $invested*100/$budget;
												$done = round($done);
											?>
											<?php
												$start = strtotime("now");
												$end = strtotime(date('Y-m-d 23:59:59', strtotime($p->project->end)));
												$days_between = ceil(abs($end - $start) / 86400);
												$hours_between = round((strtotime(date('Y-m-d 23:59:59', strtotime($p->project->end))) - strtotime("now"))/3600);
												$days_between = $hours_between <= 24?$hours_between:$days_between;
												$days_between = $days_between<0?0:$days_between;
											?>
											<div class="col-md-12 col-12 padding_mobile p-0 m-0 horizontal ">
												<div class="row inner_inner ml-md-3">
													<div class="col-md-5 ">
														<div class="row">
															<div class="col-md-12 project-item">
																<div class="frame">
																	<span class="helper"></span>
																	<img src="{{Request::root()}}/uploads/projects/{{$p->project->featured_image}}" style="max-height:242px;margin-left:-5px" alt="" class="img-fluid imageResize">
																</div>
																<div class="project_status {{$days_between <= 0 ? 'status_3' : ($done >= 100?'status_2':'status_1')}}"><span>{{$days_between <= 0 ? '終了' : ($done >= 100?'達成':'募集中')}}</span></div>
															</div>
														</div>
													</div>
													<div class="col-md-7 margin_top">
														<div class="row ">
															<div class="col-md-7 col-7">
																<h6 class="category-name" style="font-size:11px; color:#bfc5cc;">
																	<span style="color:#bfc5cc;"> 	<i class="fa fa-tag"></i>
																		<a href="/?c={{ $p->project->category->id }} ">{{$p->project->category->name}}</a>
																	</span>
																</h6>
															</div>
															<div class="col-md-5 col-5">
																<a href="{{route('user-favourite-remove-project', ['id' => $p->project->id])}}" class="pull-right favfont" style="font-size:14px;"><span style="color:#ed49b6;"> <i class="fa fa-heart"></i> </span>お気に入り削除</a>
															</div>
														</div>
														<div class="row mt-1">
															<a class="col-md-12" href="{{route('front-project-details', ['id' => $p->project->id])}}">
																<h5 style="font-size:20px;" class="font-weight-bold fontTitle">{{$p->project->title}}</h5>
															</a>
														</div>
														<?php
															$budget = $p->project->budget;
															$invested = $p->project->investment->where('status', true)->sum('amount');
															$done = $invested*100/$budget;
															$done = round($done);
														?>
														<div class="row mt-3">
															<div class="col-md-12">
																<h5 class="priceTitle" style="font-size:17px; letter-spacing:2px;"><span class="fontSize">現在</span> {{$invested}}円 </h5>
																<div class="progress">
																	<div class="progress-bar bg-primary" role="progressbar" aria-valuenow="{{ $done }}%" aria-valuemin="0" aria-valuemax="100" style="width:{{$done}}%">
																		&nbsp;{{ $done }}%
																	</div>
																</div>
															</div>
														</div>
														<div class="row  mt-3">
															<div class="col-md-12">
																<h5 class="priceTitle" style="font-size:17px; letter-spacing:2px;"><span class="fontSize">目標 </span>{{$budget}} 円</h5>
															</div>
														</div>
														<div class="row mt-2">
															<div class="col-md-offset-2 mr-0 div-radius ml-3 box-height-invest" style="height:75px; width:75px ">
																<p class="text-center pt-1"><span class="pt-2 text-center" style="font-size:11px;">応援者</span><br>
																	<span class="p-0 m-0 text-center font" style="font-size:21px;">{{ $p->project->investment->where('status', true)->count() }}人</span>
																</p>
															</div>
															<div class="col-md-offset-2 div-radius ml-2 box-height-invest" style="height:75px; width:75px ">
																@php
																	$start = strtotime("now");
																	$end = strtotime(date('Y-m-d 23:59:59', strtotime($p->project->end)));
																	$days_between = ceil(abs($end - $start) / 86400);
																	$hours_between = round((strtotime(date('Y-m-d 23:59:59', strtotime($p->project->end))) - strtotime("now"))/3600);
																	$days_between = $hours_between <= 24?$hours_between:$days_between;
																@endphp
																@if($end< strtotime("now"))
																<div class="text-center my-auto " style="padding:35% 0 30% 0">終了</div>
																@else
																	<p class="text-center pt-1"><span class=" pt-2 text-center" style="font-size:11px;">残り日数</span>
																	<br>
																	<span class="p-0 m-0 text-center font" style="font-size:21px;">{{ $days_between }} {{$hours_between <= 24? '時間':'日'}}  </span>
																	</p>
																@endif
															</div>
															<div class=" edit-button p-md-0 ml-md-2">
																<div style="font-size:15px;"  class="user-title">起案者：{{$p->project->user->first_name}} {{$p->project->user->last_name}}</div>
																@if($end< strtotime("now"))
																	<a class="noHover p-2 text-white message-button btn btn-md btn-block font-weight-bold" style="background-color:#cccccc; padding:12px !important; margin-top: 5px;">プロジェクトを支援する</a>
																@else
																	<a href="{{route('front-project-details', ['id' => $p->project->id])}}" class=" bg-primary p-2 text-white message-button btn btn-md btn-block font-weight-bold" style="padding:12px !important; margin-top: 5px;">プロジェクトを支援する</a>
																@endif
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

			</div>
	  </div>
	</div>
</div>
@include('user.layouts.profileModal')

@stop

@section('custom_js')

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
