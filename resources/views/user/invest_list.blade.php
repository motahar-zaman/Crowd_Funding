@extends('main_layout')
@section('title') 
支援プロジェクト | Crofun
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
		.invest_font{
			font-size: 17px;
		}
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
			.invest-text{
				font-size: 17px!important;
			}
			.invest_font{
				font-size: 15px;
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
			.invest-text{
				font-size: 17px!important;
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
				font-size: 11px !important;
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
			.invest-text{
				font-size: 17px!important;
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
			.invest-text{
				font-size: 16px!important;
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
			.invest-text{
				font-size: 16px!important;
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
			.invest-text{
				font-size: 15px!important;
			}
		}
		@media (max-width: 980px) {
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
			.box-height-invest{
				height: 63px !important;
				width: 63px !important;
			}
			.font{
				font-size: 15px !important;
			}
			.invest-text{
				font-size: 15px!important;
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
				height: 61px !important;
				width: 57px !important;
			}
			.font{
				font-size: 16px !important;
			}
			.invest-text{
				font-size: 13px!important;
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
			.invest-text{
				font-size: 12px!important;
			}
		}

		@media (max-width: 575.73px) {
			.edit-button{
				min-width: 145px;
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
				font-size: 12px !important;
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
		.progress{
			background-color: #cccccc !important;
		}
	</style>
@stop

@section('ecommerce')
@stop

@section('content')

@include('user.layouts.tab')

<div class="container">
	<div class="row container_div">
		<div class="col-md-12 col-12">
			<div class="mt20">
				<div class="row">
					<div class="col-md-3">
						@include('user.layouts.profile')
					</div>
					<div class="col-md-9 project-details-block-padding">
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
								<div class="row inner">
									<div class="col-md-12 col-12 pt-3">
										<h4 class="heading">現在支援中のプロジェクト</h4>
									</div>
								</div>
							</div>
						</div>
						@if ($investments)
							@foreach ($investments as $investment)
								<?php
									$budget = $investment->budget;
									$invested = $investment->investment()->where('investments.status', 1)->sum('investments.amount');
									$done = $invested*100/$budget;
									$done = round($done);

									$start = strtotime("now");
									$end = strtotime(date('Y-m-d 23:59:59', strtotime($investment->end)));
									$days_between = ceil(abs($end - $start) / 86400);
									$hours_between = round((strtotime(date('Y-m-d 23:59:59', strtotime($investment->end))) - strtotime("now"))/3600);
									$days_between = $hours_between <= 24?$hours_between:$days_between;
									$days_between = $days_between<0?0:$days_between;
								?>
								<div class="row horizontal">
									<div class="col-md-12 col-12">
										<div class="row inner">
											<div class="col-md-12 col-12">
												<div class="row inner_inner">
													<div class="col-md-5">
														<div class="row">
															<div class="col-md-12 project-item">
																<a href="{{ route('front-project-details', ['id' => $investment->id] )}}">
																	<div class="frame">
																		<span class="helper"></span>
																		<img src="{{$investment->featured_image ?  asset('uploads/projects/'.$investment->featured_image) : asset('uploads/projects/1615154785167836.jpeg')}}" style="max-height:242px;margin-left:-5px" alt="" class="img-fluid imageResize">
																	</div>
																</a>
																<div class="project_status {{ $days_between <= 0 ? 'status_3' : ($done >= 100?'status_2':'status_1')}}"><span>{{ $days_between <= 0 ? '終了' : ($done >= 100?'達成':'募集中')}}</span></div>
															</div>
														</div>
													</div>
													<div class="col-md-7 margin_top">
														<div class="row ">
															<div class="col-md-7 col-7">
																<h6 class="category-name" style="color:#bfc5cc;">
																	<span style="color:#bfc5cc;">
																		<i class="fa fa-tag"></i>
																		<a href="/?c={{ $investment->category->id }} ">{{$investment->category->name}}@if(!empty($investment->sub_category)) @endif</a>
																	</span>
																</h6>
															</div>
														</div>
														<div class="row mt-1">
															<div class="col-md-12">
																<a href="{{ route('front-project-details', ['id' => $investment->id] )}}">
																	<h5 style="font-size:20px;" class="font-weight-bold fontTitle">{{$investment->title}}</h5>
																</a>
															</div>
														</div>

														<div class="row mt-1">
															<div class="col-md-12">
																<h5 class="priceTitle" style="font-size:17px; letter-spacing:2px;"><span class="fontSize">現在</span>{{number_format($invested)}} 円 </h5>
																<div class="progress">
																	<div class="progress-bar bg-primary" role="progressbar" aria-valuenow="{{$done}}" aria-valuemin="0" aria-valuemax="100" style="width:{{$done}}%">
																		&nbsp;{{$done}}%
																	</div>
																</div>
															</div>
														</div>
														<div class="row  mt-3">
															<div class="col-md-12">
																<h5 class="priceTitle" style="font-size:17px; letter-spacing:2px;"><span class="fontSize">目標</span> {{number_format($budget)}} 円</h5>
															</div>
														</div>
														<div class="row mt-3">
															<div class="col-md-offset-2 mr-0 div-radius ml-3  box-height-invest" style="height:80px; width:80px;">
																<p class="text-center pt-2">
																	<span class="pt-2 text-center" style="font-size:11px;">応援者</span>
																	<br>
																	<span class="p-0 m-0 text-cente font" style="font-size:21px;">{{ $investment->investment()->where('investments.status', 1)->count() }}人</span>
																</p>
															</div>
															<?php
																$start = strtotime("now");
																$end = strtotime(date('Y-m-d 23:59:59', strtotime($investment->end)));
																$days_between = ceil(abs($end - $start) / 86400);
																$hours_between = round((strtotime(date('Y-m-d 23:59:59', strtotime($investment->end))) - strtotime("now"))/3600);
																$days_between = $hours_between <= 24?$hours_between:$days_between;
															?>
															<div class="col-md-offset-2 div-radius ml-2  box-height-invest" style="height:80px; width:80px;">
																@if($end< strtotime("now"))
																	<div class="text-center my-auto " style="padding:35% 0 30% 0">終了</div>
																@else
																<p class="text-center pt-2"><span class=" pt-2 text-center" style="font-size:11px;">残り日数</span>
																	<br>
																	<span class="p-0 m-0 text-center font" style="font-size:21px;">{{ $days_between }}{{$hours_between <= 24? '時間':'日'}}  </span>
																	</p>
																@endif
															</div>
															<div class="edit-button offset-0">
																<p style="font-size:15px;" class="user-title">起案者: {{$investment->user->first_name}} {{$investment->user->last_name}}</p>
																<div class="bg-dark div-radius1">
																	<button class="p-2 text-white message-button btn btn-md btn-block w6-14 msg_send_btn btn-default" data-user_id="{{ $investment->user->id }}" data-project_username="{{ $investment->user->first_name.' '.$investment->user->last_name }}" style="cursor:pointer; color:#fff;"> <span style="color:#fff !important;"> <i class="fa fa-envelope"></i> </span>メッセージを送る</button>
																</div>
															</div>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
									@foreach($investments_history as $investment_history)
									@if($investment_history->project_id==$investment->id)
										<div class="col-md-12">
											<p class="pt-3 invest-text" >
												支援日 : {{date('Y/m/d', strtotime($investment_history->created_at))}}　
												利用ポイント : {{number_format($investment_history->point) }}ポイント <br>
												選択したリターン : {{ number_format($investment_history->amount) }} コース ; {{$investment_history->reward[0]->is_other}}<br>
											</p>
											<hr>
										</div>
									@endif
								@endforeach
								</div>
							@endforeach
						@endif
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
</div>
@include('user.layouts.message_modal', ['modal_title' => 'プロジェクト起案者へのメッセージ'])
@include('user.layouts.profileModal')
@stop

@section('custom_js')
	<script type="text/javascript">
		$(document).ready(function(){
			$('.msg_send_btn').on('click', function(e){
				var user_id = $(this).attr('data-user_id');
				var user_name = $(this).attr('data-project_username');
				$('#to_id').val(user_id);
				$('#project_user_name').val(user_name);
				$('#send-message').modal('show');
			});
		});
		var error = $('#getError').val();
		$(window).on('load',function(){
			console.log('error = ' + error);
				if (error == 1) {
					$('#myModal').modal('show');
				}
		});
	</script>
@stop