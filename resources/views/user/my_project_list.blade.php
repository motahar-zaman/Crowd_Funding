@extends('main_layout')
@section('title') 
起案プロジェクト | Crofun
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
	.project_status_black {
		position: absolute;
		top: 15px;
		left: 3px;
		width: auto;
		padding: 5px;
		padding-left: 15px;
		padding-right: 15px;
		text-align: center;
		background-color: #575757;
		color:#fff;
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
		@media only screen and (min-width: 575.98px) {
		.flex_cont {
			display: flex;
			align-items: stretch;
			overflow: auto;
			overflow-y: hidden;
			min-width: 890px;
			flex-shrink: 0;
			}
		.flex_cont_tab {
			display: flex;
			align-items: stretch;
			overflow: auto;
			overflow-y: hidden;
			min-width: 1090px;
			flex-shrink: 0;
			}
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
							<div class="col-md-12 col-12 pt-3">
								<h4 class="heading">現在起案中のプロジェクト</h4>
							</div>
						</div>
						@if($projects)

						@foreach ($projects as $project)
							<?php
								$budget = $project->budget;
								$invested = $project->investment->where('status', true)->sum('amount');
								$done = $invested*100/$budget;
								$done = round($done);
							?>
							<div class="row horizontal">
								<div class="col-md-12 col-12">
									<div class="row inner">
										<div class="col-md-12 col-12">
											<div class="row inner_inner">
												<div class="col-md-5">
													<div class="row">
														<div class="col-md-12 project-item">
															<a href="{{route("front-project-details",['id'=>$project->id])}}">
																<div class="frame">
																	<span class="helper"></span>
																	<img src="{{$project->featured_image ?  asset('uploads/projects/'.$project->featured_image) : asset('uploads/projects/1615154785167836.jpeg')}}" style="max-height:242px; margin-left:-5px" alt="" class="img-fluid imageResize">
																</div>
															</a>
															<?php
																$start = strtotime("now");
																$end = strtotime(date('Y-m-d 23:59:59', strtotime($project->end)));
																$days_between = ceil(abs($end - $start) / 86400);
																$hours_between = round((strtotime(date('Y-m-d 23:59:59', strtotime($project->end))) - strtotime("now"))/3600);
																$days_between = $hours_between <= 24 ? $hours_between : $days_between;
																$days_between = $days_between < 0 ? 0 : $days_between;
															?>
															<?php
																if ($days_between <= 0) {
																	$proStatus = 'status_3';
																	$proMsg = '終了';
																} else {
																	if ($done >= 100) {
																		$proStatus = 'status_2';
																		$proMsg = '達成';
																	} else{
																		if ($project->starting_status == 1) {
																			$proStatus = 'status_1';
																			$proMsg = '募集中';
																		} else {
																			$proStatus = 'status_1';
																			$proMsg = '募集前';
																		}
																	}
																}
															?>
															<div class="project_status {{$proStatus}}">
																<span>{{  $proMsg }}</span>
															</div>
														</div>
													</div>
												</div>
												<div class="col-md-7 margin_top">
													<div class="row ">
														<div class="col-md-7">
															<h6 class="category-name" style="color:#bfc5cc;"> <span style="color:#bfc5cc;"> 	<i class="fa fa-tag"></i> <a href="/?c={{ $project->category->id }} ">{{$project->category->name}}</a>
															</span></h6>
															</div>
														<div class="col-md-5">
															@php
																$fav = 0;
															@endphp
															@foreach ($project->favourite as $f)
																@if ($f->user_id == Auth::user()->id)
																	@php
																		$fav = 1;
																	@endphp
																@endif
															@endforeach
															@if(Auth::check())
																@if($project->user_id==Auth::user()->id)
																	<div class="col-md-4 col-sm-6 category_favourite"></div>
																@elseif($project->end < date("Y-m-d", strtotime('now')))
																	@if ($fav == 0)
																		<div href="" class="pull-right favfont" style="font-size:14px;"><span style="color:#555;"> <i class="fa fa-heart-o"></i> </span>お気に入りに追加</div>
																	@else
																		<span class="pull-right favfont" style="font-size:14px;"><span style="color:#ed49b6"> <i class="fa fa-heart"></i> </span>お気に入り</span>
																	@endif
																@else
																	@if ($fav == 0)
																		<a href="{{ route('user-favourite-add-project', $project->id) }}" class="pull-right favfont" style="font-size:14px;"><span style="color:#ed49b6;"> <i class="fa fa-heart"></i> </span>お気に入りに追加</a>
																	@else
																		<a href="{{ route('user-favourite-remove-project', $project->id) }}" class="pull-right favfont" style="font-size:14px;"><span style="color:#555"> <i class="fa fa-heart-o"></i> </span>お気に入り</a>
																	@endif
																@endif
															@endif
														</div>
													</div>
													<div class="row mt-1">
														<div class="col-md-12">
															<h5 style="font-size:20px;" class="font-weight-bold fontTitle">{{$project->title}}</h5>
														</div>
													</div>

													<div class="row mt-2">
														<div class="col-md-12">
															<h5 class="priceTitle" style="font-size:17px; letter-spacing:2px;"><span class="fontSize">現在 </span>{!!number_format($invested)!!} 円 </h5>
															<div class="progress">
																<div class="progress-bar bg-primary" role="progressbar" aria-valuenow="{{$done}}" aria-valuemin="0" aria-valuemax="100" style="width:{{$done}}%">
																	&nbsp;{{$done}}%
																</div>
															</div>
														</div>
													</div>
													<div class="row  mt-3">
														<div class="col-md-12">
															<h5 class="priceTitle" style="font-size:17px; letter-spacing:2px;"><span class="fontSize">目標</span> {!!number_format($budget)!!} 円</h5>
														</div>
													</div>
													<div class="row mt-2">
														<div class="col-md-offset-2 mr-0 div-radius ml-3 box-height" style="height:80px; width:80px ">
																<p class="text-center pt-2"><span class="pt-2 text-center" style="font-size:11px;">応援者</span>
																<br><span class="p-0 m-0 text-center font" style="font-size:21px;">{{$project->investment->where('status', true)->count()}}人</span><p>
														</div>
														@php
															$start = strtotime("now");
															$end = strtotime(date('Y-m-d 23:59:59', strtotime($project->end)));
															$days_between = ceil(abs($end - $start) / 86400);
															$hours_between = round((strtotime(date('Y-m-d 23:59:59', strtotime($project->end))) - strtotime("now"))/3600);
															$days_between = $hours_between <= 24?$hours_between:$days_between;
														@endphp

														<div class="col-md-offset-2 div-radius ml-2 box-height" style="height:80px; width:80px ">
															@if($end< strtotime("now"))
																<div class="text-center my-auto " style="padding:35% 0 30% 0">終了</div>
															@else
																<p class="text-center pt-2"><span class="pt-2 text-center" style="font-size:11px;">残り日数</span>
																<br>
																<span class="p-0 m-0 text-center font" style="font-size:21px;">{{ $days_between }}{{$hours_between <= 24? '時間':'日'}}</span>
																</p>
															@endif
														</div>
														<div class="edit-button offset-0 ml-2">
															<div class="bg-dark div-radius1">
																<a href="{{ route('user-project-details', $project->id) }}" class="p-2 fontSize text-white btn btn-md btn-block font-weight-bold my_project_list_see_more_button">詳細をみる</a>
															</div>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						@endforeach
						@endif
						@if(($user->profile->phonetic) == null ||($user->profile->phonetic2) == null ||($user->profile->phone_no) == null||($user->profile->postal_code) == null||($user->profile->prefectures) == null||($user->profile->municipility) == null ||($user->first_name) == null ||($user->last_name) == null )
							<div class="row" style="margin-top: 30px;margin-bottom: 30px;">
								<div class="col-12 text-center">
									<a href="" class="btn btn-primary">プロジェクトを起案申請する</a>
								</div>
							</div>
						@else
							<div class="row" style="margin-top: 30px;margin-bottom: 30px;">
								<div class="col-12 text-center">
									<a href="{{ route('user-project-add') }}" class="btn btn-primary">プロジェクトを起案申請する</a>
								</div>
							</div>
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
@include('user.layouts.profileModal')
@stop

@section('custom_js')
	<script type="text/javascript">
		var error = $('#getError').val();

		$(window).on('load',function(){
			console.log('error = ' + error);
				if (error == 1) {
					$('#myModal').modal('show');
				}
		});
	</script>
@stop
