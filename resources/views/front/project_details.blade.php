@extends('main_layout')
@section('title') 
{{$title}}
@stop
@section('custom_css')
	<style type="text/css">
		.wizard > .steps > ul > li {
		    width: 20%;
		}
		#body{
			padding-bottom: 10px;
			margin-bottom: 0px
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
			background-color: #efefef;
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
	.project_status{
		/* position: absolute;
	    top: 15px;
	    left: -15px;
	    width: auto;
	    padding: 5px;
	    padding-left: 15px;
	    padding-right: 15px;
	    text-align: center; */
		position: absolute;
		top: 15px;
		left: 1px !important;
		width: auto;
		padding: 5px;
		padding-left: 15px;
		padding-right: 15px;
		text-align: center;
		background-color: #ff6540;
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
	.bg-white{
		background-color:#fff;
	}
	.content-inner-blue:before{
		display: block;
		height: 2px;
		background-color: #81ccff;
		content: "";
		width: 100%;
		margin: 0 auto;
		margin-top: 0px;
		margin-bottom: 0px;
	}
	
		.content-inner-arrow{
			/*-webkit-clip-path: polygon(0 0, 100% 0, 100% 82%, 51% 100%, 0 82%);
			clip-path: polygon(0 0, 100% 0, 100% 82%, 51% 100%, 0 82%);*/

		}
		.bg-blue{
			background-color: #0099ff;
		}
		.no-container {
		margin-left: 0 !important;
		margin-right: 0 !important;
		}




		@media (min-width: 1360px) {
			.margin_div{
				margin-top:70px;
			}
		}
	
		@media (min-width: 1210px) {
			.project_button_area{
				display:flex;
				
			}
			.project_button_area_hidden{
				display:none;		
			}
		}
		@media (max-width: 1210px) {
			.project_button_area{
				display:none;
			}
			.project_button_area_hidden{
				display:flex;
			}
		}





		@media (max-width: 575.98px){
			.project_main_image{
				object-fit:contain;
			}
			.project_main_image_margin{
				margin-bottom:0.5rem;
			}
			.button{
				max-width: 100%;
			}
			.image_margin{
				width:100% !important;
				margin:0px!important;
				height:210px !important;
			}
			.name_padding{
				padding:0px 25px;
			}
			.py-3 {
				margin-left: -3px !important;
			}
		} 


	.mt40{
		margin-top: 40px !important;
	}
	#shareIcons{
		padding-bottom: 20px;
	}
	#shareIcons a{
		text-decoration: none;
		padding-top: 5px;
		padding-bottom: 5px;
	}
	.details_btm_arrow{
		position: relative;
		margin-bottom: 15px !important;
	}
	.breadcrump{
		background-color: #F1F1F1;
	}
	.breadcrump li a{
		color: #000;

	}
	.img-fluid{
		border: 1px solid #efefef;
	}
	.padding20px{
		padding:20px 20px 4px 20px;
	}
	.marginBottom2rem{
		margin-bottom: 2rem;
	}
	.frame {
		height: 275px;      /* equals max image height */
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
	/* .frame img{
		height: 100%;
		width: 100%;
	} */
	.progress{
		background-color: #cccccc !important;
	}


	.image-wrapper {
		border: 1px solid #ccc;
		height: 0;
		position: relative;
		padding-bottom:74.04%; /* 1.35:1 */
	}
	.image-wrapper .image {
		object-fit:contain;
		height: 100%;
		left: 0;	  
		position: absolute;
		top: 0;	
		width: 100%;	
	}
	.possition_div {
		height: 0;
		position: relative;
		padding-bottom:74.04%; /* 1.35:1 */
	}
	.possition_div .respon {
		object-fit:contain;
		height: 100%;
		left: 0;	  
		position: absolute;
		top: 0;	
		width: 100%;	
	}

	.shrink{
		-webkit-transform:scale(1);
		-moz-transform:scale(1);
		-ms-transform:scale(1);
		transform:scale(1);
	}

	.category_favourite > h6 > span > a:hover {
		text-decoration: none;
	}
	.category_favourite > a:hover {
		text-decoration: none;
	}
	.fornt-weight-bold > a:hover {
		text-decoration: none;
	}
	</style>
@stop


<?php
	$budget = $project->budget;
	$invested = $project->investment->where('status', true)->sum('amount');
	$done = $invested*100/$budget;
	$done = round($done);
?>


@section('ecommerce')

@stop



@section('content')
	{{-- @include('front.layouts.project-details-breadcrump') --}}
	<div class="row breadcrump p-0 m-0 project_sorting">
		<div class="container">
			<div class="container_div row">
				<div class="col-md-9  col-sm-12 ">
					<div class="">
						@include('front.layouts.project-details-breadcrump')
					</div>
				</div>
				<div class="col-md-3 col-sm-12 ">
					<div class="py-3 ">
						@include('front.layouts.search')
					</div>
				</div>
			</div>
		</div>
	</div>

	

<div class="container">
	<div class="row">
		<div class="col-md-12 container_div col-sm-12 project_details_area" style="margin:40px auto;">
			<div class="row">
				<div class="col-md-5 col-sm-12 project_main_image_margin">
					<div class="row">
						<div class="col-12">
							<div class="image-wrapper">
								<img src="{{ asset('uploads/projects/'. $project->featured_image) }}" alt=""  style="" class="image">
							</div>

							<?php
								$start = strtotime("now");
								$end = strtotime(date('Y-m-d 23:59:59', strtotime($project->end)));
								$days_between = ceil(abs($end - $start) / 86400);
								$hours_between = round((strtotime(date('Y-m-d 23:59:59', strtotime($project->end))) - strtotime("now"))/3600);
								$days_between = $hours_between <= 24 ? $hours_between : $days_between;
								$days_between = $days_between < 0 ? 0 : $days_between;

								//====== for badge showing
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
							{{-- <div class="project_status status_1 text-white" >募集中</div> --}}
							{{-- <div class="project_status {{strtotime($project->end) > strtotime(date('Y--d H:i:s')) ? 'status_1' : 'status_2'}}"><span>{{strtotime($project->end) > strtotime(date('Y-m-d H:i:s')) ? '募集中' : '達成！'}}</span></div> --}}

							<!-- <div class="project_status {{$days_between <= 0 ? 'status_3' : ($done >= 100?'status_2':'status_1')}}"> -->
							<div class="project_status {{$proStatus}}">
								<span>{{ $proMsg }}</span>
							<!-- <span>{{$days_between <= 0  ? '終了' : ($done >= 100?'達成':'募集中')}}</span>  -->
							</div>

						</div>
					</div>
				</div>
				<div class="col-md-7 col-sm-12 mt-1" >
					<div class="">
						<div class="row">
							<div class="col-md-8 col-sm-6 category_favourite">
								<h6 class="category-name" style="color:#bfc5cc;"> <span style="color:#bfc5cc;"> 	<i class="fa fa-tag"></i> <a href="{{route('front-project-list', ['c' => $project->category->id])}} ">{{  $project->category->name }} </a>
								</h6>
							</div>
							@php
								$fav = 0;
							@endphp
							@foreach ($project->favourite as $f)
								@if (Auth::check())
									@if ($f->user_id == Auth::user()->id)
										@php
											$fav = 1;
										@endphp
									@endif
								@endif
							@endforeach
							@if(Auth::check())
								@if($project->user_id==Auth::user()->id)
									<div class="col-md-4 col-sm-6 category_favourite"></div>
								@elseif($project->end < date("Y-m-d", strtotime('now')))
									<div class="col-md-4 col-sm-6 category_favourite">
										@if ($fav == 0)
											<div href="" class="pull-right category_favourite" style="font-size:14px;"><span style="color:#555;"> <i class="fa fa-heart-o"></i> </span>お気に入りに追加</div>
										@else
											<span class="pull-right category_favourite" style="font-size:14px;"><span style="color:#ed49b6"> <i class="fa fa-heart"></i> </span>お気に入り</span>
										@endif
									</div>
								@else
									@if (empty($isFavourite))
										<div class="col-md-4 col-sm-6 category_favourite">
											@if ($fav == 0)
												<a href="{{ route('user-favourite-add-project', $project->id) }}" class="pull-right category_favourite" style="font-size:14px;"><span style="color:#555 ;"> <i class="fa fa-heart-o"></i> </span>お気に入りに追加</a>
											@else
												<a href="{{ route('user-favourite-remove-project', $project->id) }}" class="pull-right category_favourite" style="font-size:14px;"><span style="color:#ed49b6"> <i class="fa fa-heart"></i> </span> お気に入り</a>
											@endif
										</div>
									@else
										<div class="col-md-4 col-sm-6 category_favourite">
											@if ($fav == 0)
												<a href="{{ route('user-favourite-add-project', $project->id) }}" class="pull-right category_favourite" style="font-size:14px;"><span style="color:#555 ;"> <i class="fa fa-heart-o"></i> </span>お気に入りに追加</a>
											@else
												<a href="{{ route('user-favourite-remove-project', $project->id) }}" class="pull-right category_favourite" style="font-size:14px;"><span style="color:#ed49b6"> <i class="fa fa-heart"></i> </span> お気に入り</a>
											@endif
										</div>
									@endif
								@endif
							@else
								@if($project->end < date("Y-m-d", strtotime('now')))
									<span class="pull-right category_favourite" style="font-size:14px;"><span style="color:#555"> <i class="fa fa-heart-o"></i> </span>お気に入り</span>
								@else
									<a title="" href="{{route('front-project-details-login', ['id' => $project->id])}}"><span class="pull-right category_favourite" style="font-size:14px;"><span style="color:#555"> <i class="fa fa-heart-o"></i> </span>お気に入り</span></a>
								@endif
							@endif
							{{-- @if (empty($isFavourite))
								<div class="col-md-4 col-sm-6 category_favourite">
									@if ($fav == 0)
									<div class="">1 {{$fav}}</div>
										<a href="{{ route('user-favourite-add-project', $project->id) }}" class="pull-right" style="font-size:14px;"><span style="color:#ed49b6;"> <i class="fa fa-heart-o"></i> </span>お気に入りに追加</a>
									@else
									<div class="">2 {{$fav}}</div>
										<span class="pull-right" style="font-size:14px;"><span style="color:#ed49b6"> <i class="fa fa-heart"></i> </span>お気に入り</span>
									@endif
								</div>
							@endif
							{{ $project->Investment->isFavourite() }} --}}
						</div>
						<div class="row mt-1">
							<div class="col-12">
								<h5 style="font-size:24px;margin-top:10px;" class="font-weight-bold">{{$project->title}}</h5>
							</div>
						</div>
						@php
							$budget = $project->budget;
							$investment = $project->investment->where('status', true)->sum('amount');
							$done = $investment*100/$budget;
							$done = round($done);
							// print(strtotime($p->end) < strtotime(date('Y-m-d H:i:s')));
						@endphp
						<div class="row mt-3">
							<div class="col-12">
								<span style="font-size:18px; letter-spacing:2px;">現在 </span><span style="font-size:30px; letter-spacing:1px; font-weight: 600;"> {{ number_format($investment)}} 円 </span>
								<div class="progress" style="margin-top: 10px;">
									<div class="progress-bar bg-primary" role="progressbar" aria-valuenow="{{$done}}" aria-valuemin="0" aria-valuemax="100" style="width:{{$done}}%;"> &nbsp;{{$done}}%</div>
								</div>
							</div>
						</div>
						<div class="row mt-1" style="margin-bottom: 15px;">
							<div class="col-12">
								{{--<h5 class="text-right" style="font-size:18px; letter-spacing:2px;">目標 {{App\Helpers\Number::number_format_short($budget)}} 円</h5>--}}
								<h5 class="text-right" style="font-size:18px; letter-spacing:2px;">目標 {{number_format($budget)}} 円</h5>
							</div>
						</div>
						<div class="row mt-0">
							<input type="hidden" name="" id="linkUrl" value="{{ asset('project-details/'.$project->id) }}">
							{{-- <div class="col-md-2  p-2 ml-2">
								<a href="#" class="btn btn-sm btn-block text-white" style="background:#4267b2; font-size:10px;"> <span class="fa fa-facebook" style="color:#fff;"></span> facebook</a>
							</div>
							<div class="col-md-2 p-2">
								<a href="#" class="btn btn-sm btn-block text-white" style="background:#4267b2; font-size:10px;"> <span class="fa fa-facebook" style="color:#fff;"></span> facebook</a>
							</div>
							<div class="col-md-2 p-2">
								<a href="#" class="btn btn-sm btn-block text-white" style="background:#4267b2; font-size:10px;"> <span class="fa fa-facebook" style="color:#fff;"></span> facebook</a>
							</div>
							<div class="col-md-2 p-2">
								<a href="#" class="btn btn-sm btn-block text-white" style="background:#4267b2; font-size:10px;"> <span class="fa fa-facebook" style="color:#fff;"></span> facebook</a>
							</div> --}}
							<div class="ml-md-3" id="shareIcons">

							</div>
						</div>
						<div class="row project_button_area margin_div" >
							<div class="col-md-5 col-sm-12  mr-0 ml-3 p-0 assist_project_btn_area button">
								@if(Auth::check())
									@if(($user->profile->phonetic) == null  ||($user->profile->phonetic2) == null ||($user->profile->phone_no) == null||($user->profile->postal_code) == null||($user->profile->prefectures) == null||($user->profile->municipility) == null ||($user->first_name) == null ||($user->last_name) == null )				
										<div  id= "" title="" href="" class="bg-blue text-white btn btn-lg btn-block profileModal buttonFont " name="button" style=" height:80px;">プロジェクトを <br> 支援する</div>
									@else
										@if($project->start > date("Y-m-d", strtotime('tomorrow')))
											<a  id= "not_started" title="<?php echo $project->start > date("Y-m-d 23:59:59", strtotime('-1days'))?'Payment receive not started':'invest';?>" href="" class="bg-blue text-white btn btn-lg btn-block buttonFont" name="button" style=" height:80px;">プロジェクトを <br> 支援する</a>
										@elseif($project->end < date("Y-m-d", strtotime('now')))
											<div   title="" href="" class="bg-blue text-white btn btn-lg btn-block buttonFont" name="button" style=" height:80px;background-color:#cccccc;">プロジェクトを <br> 支援する</div>
										@else
											@if($project->user_id==$user_profile->id)
												<div  title="" href="" class="bg-blue text-white btn btn-lg btn-block buttonFont" name="button" style=" height:80px;;background-color:#cccccc;">プロジェクトを <br> 支援する</div>
											@else
												<a title="" href="{{route('user-invest', ['id' => $project->id])}}" class="bg-blue text-white btn btn-lg btn-block buttonFont" name="button" style=" height:80px;">プロジェクトを <br> 支援する</a>
											@endif
										@endif
									@endif
								@else
									@if($project->end < date("Y-m-d", strtotime('now')))
										<div title="<?php echo $project->start > date("Y-m-d", strtotime('tomorrow'))?'Payment receive not started':'invest';?>" href="" class="bg-blue text-white btn btn-lg btn-block buttonFont" name="button" style=" height:80px;background-color:#cccccc;">プロジェクトを <br> 支援する</div>
									@else
										<a title="<?php echo $project->start > date("Y-m-d", strtotime('tomorrow'))?'Payment receive not started':'invest';?>" href="{{route('front-project-details-login', ['id' => $project->id])}}" class="bg-blue text-white btn btn-lg btn-block buttonFont" name="button" style=" height:80px;">プロジェクトを <br> 支援する</a>
									@endif
								@endif
							</div>
							<div class="col-md-3 col-sm-6 div-radius ml-2 project_details_info project_details_info_1">
									<p class="text-center p-2"><span class="fontsizeday" style="font-size:11px;">応援者 </span> <br>
								<span class="fontsizeper" style="font-size:20px;">{{$supports}} 人</span></p>
							</div>
							@php
								$start = strtotime("now");
								$end = strtotime(date('Y-m-d 23:59:59', strtotime($project->end)));
								$days_between = ceil(abs($end - $start) / 86400);
								$hours_between = round((strtotime(date('Y-m-d 23:59:59', strtotime($project->end))) - strtotime("now"))/3600);
								$days_between = $hours_between <= 24?$hours_between:$days_between;
								$days_between = $days_between < 0 ? 0:$days_between;
							@endphp
							<div class="col-md-3 col-sm-6 div-radius ml-2 project_details_info">
								@if($end< strtotime("now"))
									<p class="text-center pt-3 hours_end_block p-2"><span class="hours_end" style="font-size:26px;"> 終了 </span></p>
								@else
									<p class="text-center p-2 p-12"><span  class="fontsizeday" style="font-size:11px;">残り日数 </span> <br>
									<span class="fontsizeper" style="font-size:20px;">{{ $days_between }}{{$hours_between <= 24?'時間':'日'}}</span></p>
								@endif
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="row mt-2 project_button_area_hidden" >
				<div class="col-md-5 col-sm-12  mr-0 ml-3 p-0 assist_project_btn_area button">
					@if(Auth::check())
						@if(($user->profile->phonetic) == null  ||($user->profile->phonetic2) == null ||($user->profile->phone_no) == null||($user->profile->postal_code) == null||($user->profile->prefectures) == null||($user->profile->municipility) == null ||($user->first_name) == null ||($user->last_name) == null )				
							<div  id= "" title="" href="" class="bg-blue text-white btn btn-lg btn-block profileModal buttonFont " name="button" style=" height:80px;">プロジェクトを <br> 支援する</div>
						@else
							@if($project->start > date("Y-m-d", strtotime('tomorrow')))
								<a  id= "not_started" title="<?php echo $project->start > date("Y-m-d 23:59:59", strtotime('-1days'))?'Payment receive not started':'invest';?>" href="" class="bg-blue text-white btn btn-lg btn-block buttonFont" name="button" style=" height:80px;">プロジェクトを <br> 支援する</a>
							@elseif($project->end < date("Y-m-d", strtotime('now')))
								<div   title="" href="" class="bg-blue text-white btn btn-lg btn-block buttonFont" name="button" style=" height:80px;background-color:#cccccc;">プロジェクトを <br> 支援する</div>
							@else
								@if($project->user_id==$user_profile->id)
									<div  title="" href="" class="bg-blue text-white btn btn-lg btn-block buttonFont" name="button" style=" height:80px;;background-color:#cccccc;">プロジェクトを <br> 支援する</div>
								@else
									<a title="" href="{{route('user-invest', ['id' => $project->id])}}" class="bg-blue text-white btn btn-lg btn-block buttonFont" name="button" style=" height:80px;">プロジェクトを <br> 支援する</a>
								@endif
							@endif
						@endif
					@else
						@if($project->end < date("Y-m-d", strtotime('now')))
							<div title="<?php echo $project->start > date("Y-m-d", strtotime('tomorrow'))?'Payment receive not started':'invest';?>" href="" class="bg-blue text-white btn btn-lg btn-block buttonFont" name="button" style=" height:80px;background-color:#cccccc;">プロジェクトを <br> 支援する</div>
						@else
							<a title="<?php echo $project->start > date("Y-m-d", strtotime('tomorrow'))?'Payment receive not started':'invest';?>" href="{{route('front-project-details-login', ['id' => $project->id])}}" class="bg-blue text-white btn btn-lg btn-block buttonFont" name="button" style=" height:80px;">プロジェクトを <br> 支援する</a>
						@endif
					@endif
				</div>
				<div class="col-md-3 col-sm-6 div-radius ml-md-3 project_details_info project_details_info_1">
						<p class="text-center p-2"><span class="fontsizeday" style="font-size:11px;">応援者 </span> <br>
					<span class="fontsizeper" style="font-size:20px;">{{$supports}} 人</span></p>
				</div>
				@php
					$start = strtotime("now");
					$end = strtotime(date('Y-m-d 23:59:59', strtotime($project->end)));
					$days_between = ceil(abs($end - $start) / 86400);
					$hours_between = round((strtotime(date('Y-m-d 23:59:59', strtotime($project->end))) - strtotime("now"))/3600);
					$days_between = $hours_between <= 24?$hours_between:$days_between;
					$days_between = $days_between < 0 ? 0:$days_between;
				@endphp
				<div class="col-md-3 col-sm-6 div-radius ml-md-3 project_details_info">
					@if($end< strtotime("now"))
						<p class="text-center pt-3 hours_end_block p-2"><span class="hours_end" style="font-size:26px;"> 終了 </span></p>
					@else
						<p class="text-center p-2 p-12"><span  class="fontsizeday" style="font-size:11px;">残り日数 </span> <br>
						<span class="fontsizeper" style="font-size:20px;">{{ $days_between }}{{$hours_between <= 24?'時間':'日'}}</span></p>
					@endif
				</div>
			</div>
		</div>
	</div>
</div>

@include('front.layouts.200-1')

@include('user.layouts.profileModal')
@if (Auth::check())
	@include('user.layouts.message_modal', ['modal_title' => '起案者へのメッセージ'])
@endif


@stop

@section('custom_js')
	<script type="text/javascript">
			$(document).ready(function(){
				$('.msg_send_btn').on('click', function(e){
					var user_id = $(this).attr('data-user_id');
					var user_name = $(this).attr('data-project_username');
					console.log(user_id);

					$('#id').val(user_id);
					$('#to_id').val(user_id);
					$('#get_vendor_name').html('宛先 : ' + ' ' + user_name);
					$('#send-message').modal('show');
					//$('#send-message').addClass('show');
				});
			});
	</script>

	<script type="text/javascript">
		$('.profileModal').on('click',function(){
			$('#myModal').modal('show');
		});
	</script>

	<script type="text/javascript">

			$(function() {
				var linkurl  = $('#linkUrl').val();
				$('#shareIcons').jsSocials({
					url : linkurl,
					text : 'laravel for social sharing',
					showLabel : true,
					showCount : false,
					shareIn : "popup",
					shares : ["facebook", "twitter", "line"]
				});
			});
	</script>
	<script type="text/javascript">
			$(document).ready(function(){
				$('#not_started').on('click', function(e){
					alert('募集期間はまだ始まってません！');
					return false;
				});
			});
	</script>
	
	<script type="text/javascript">
		$(document).ready(function(){
			var description = [];
			var description_details=[];
			var description_details1=[];
			var description_details_extend=[];
			var description_details_extend2=[];
			$('.description').attr('data-description').split('\n').map(function(item,i){
				description.push(item);
			})
			if(description.length==1){
				if(description[0].length>160){
					$('.description').html(description[0].substring(0,160))
					$('.description_extend').html(description[0].substring(160))
				}else{
					$('.description').html(description[0].substring(0,160))
					$('.description_extend').html()
				}
			}else{
				for(var j=4;j<description.length;j++)
				{
					description_details_extend.push(description[j])
				}
				description_details.push(description[0])
				description_details.push(description[1])
				description_details.push(description[2])
				description_details.map(function(item){
					// console.log(item)
					description_details1.push('<div>'+item+'</div>')
				})
				description_details_extend.map(function(item){
					description_details_extend2.push('<div>'+item+'</div>')
				})
				$('.description').html(description_details1);
				$('.description_extend').html(description_details_extend2)
			}
		});
	</script>
	<script type="text/javascript">
		$('.details_description_all').ready(function(){

				// console.log($(this).data(details-description))

				console.log($('.details_description').attr('data-details-description'));

				// console.log($('.details_description').attr('data-details-description'));


			// var details_description = [];
			// var details_description_details=[];
			// var details_description_details1=[];
			// var details_description_details_extend=[];
			// var details_description_details_extend2=[];
			// $('.details_description[data-description]').each(function(){
			// 	// console.log($(this).attr('data-details_description'));
			// })
			// // console.log()
			// // console.log($('.details_description').attr('data-details_description'));
			// $('.details_description').each(function(item,key) {
			// 	// console.log( $(this).attr('data-details_description'));
			// });
			// console.log(details_description)
			// .split('\n').map(function(item,i){
			// 	console.log(item)
			// 	details_description.push(item);
			// })
			// 	if(details_description.length==1){
			// 		if(details_description[0].length>160){
			// 			$('.details_description').html(details_description[0].substring(0,160))
			// 			$('.details_description_extend').html(details_description[0].substring(160))
			// 		}else{
			// 			$('.details_description').html(details_description[0].substring(0,160))
			// 			$('.details_description_extend').html()
			// 		}
			// 	}else{
			// 		for(var j=4;j<details_description.length;j++)
			// 		{
			// 			details_description_details_extend.push(details_description[j])
			// 		}
			// 		details_description_details.push(details_description[0])
			// 		details_description_details.push(details_description[1])
			// 		details_description_details.push(details_description[2])
			// 		details_description_details.map(function(item){
			// 			// console.log(item)
			// 			details_description_details1.push('<div>'+item+'</div>')
			// 		})
			// 		details_description_details_extend.map(function(item){
			// 			console.log(item)
			// 			details_description_details_extend2.push('<div>'+item+'</div>')
			// 		})
			// 		$('.description').html(details_description_details1);
			// 		$('.description_extend').html(details_description_details_extend2)
			// 	}
		});
		// };
	</script>




@stop
