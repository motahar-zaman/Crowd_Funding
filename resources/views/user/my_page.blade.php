@extends('main_layout')
@section('title') 
マイページ | Crofun
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
					<div class="col-md-9 small-device-my-page-right-side-align">
						<!-- @php 
							$message = '申請中は編集できません。<br/>
							編集が必要な場合はお問い合わせよりお問い合わせください。<br/>
							お問い合わせはこちら '; 
						@endphp -->
						@include('user.layouts.notifications')
						{{--@include('front.displaymodal')--}}
						<div class="row">
							<div class="col-md-12 col-12">
								<div class="row inner">
									<div class="col-md-12 col-12 pt-3">
										<h4 class="heading">現在起案中のプロジェクト</h4>
									</div>
								</div>
							</div>
						</div>
						@if($projects)
						@foreach ($projects as $project)
							<?php
								$budget = $project->budget;
								$invested = $project->investment()->where('investments.status', true)->sum('investments.amount');
								$done = $invested*100/$budget;
								$done = round($done);
							?>

							<?php
								$start = strtotime("now");
								$end = strtotime(date('Y-m-d 23:59:59', strtotime($project->end)));
								$days_between = ceil(abs($end - $start) / 86400);
								$hours_between = round((strtotime(date('Y-m-d 23:59:59', strtotime($project->end))) - strtotime("now"))/3600);
								$days_between = $hours_between <= 24?$hours_between:$days_between;
								$days_between = $days_between<0?0:$days_between;
							?>

							<div class="row horizontal">
							<div class="col-md-12 col-12">


								<div class="row ">
									<div class="col-md-12 col-12">
										<div class="row ">
											<div class="col-md-5">
												<div class="row">
													<div class="col-md-12 project-item">
														<div class="frame">
															<span class="helper"></span>	
															@php 
															   $gapTxt = "";
															   
															   if(mb_strlen($project->title) > 34){
																$cssStyle = 'max-height:245px;height:243px; margin-left:-5px';
																	
															   }else{
																$cssStyle = 'max-height:245px;height:238px; margin-left:-5px';
																 for($i=1;$i<= 34-mb_strlen($project->title); $i++ ) {
																    $gapTxt .= "&nbsp;";		
																 }
															   }
															@endphp														
															<img src="{{$project->featured_image ?  asset('uploads/projects/'.$project->featured_image) : asset('uploads/projects/1615154785167836.jpeg')}}"  style="max-height:242px; margin-left:-5px" alt="" class="img-fluid imageResize">
														</div>

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
														



														<div class="project_status {{$proStatus}}"><span>{{  $proMsg }}</span></div>

														
													</div>
												</div>
											</div>
											<div class="col-md-7 margin_top">
												<div class="row">
													<div class="col-md-7 col-7">
														<h6 class="category-name" style="color:#bfc5cc;"> <span style="color:#bfc5cc;"> 	<i class="fa fa-tag"></i> <a href="{{route('front-project-list-bycat',['c'=> $project->category->id,'s' => 'd'])}}">{{$project->category->name}}</a>
												</span></h6>
													</div>
													<div class="col-md-5 col-5">
													{{--@php
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



														@if ($fav == 0)
															<a  href="{{ route('user-favourite-add-project', $project->id) }}" class="pull-right favfont" style="font-size:14px;"><span style="color:#ed49b6;"> <i class="fa fa-heart"></i> </span> お気に入りに追加 </a>
														@else
															<span class="pull-right favfont" style="font-size:14px;"><span style="color:#555"> <i class="fa fa-heart-o"></i> </span>お気に入り</span>
														@endif--}}
													</div>
												</div>
												<div class="row mt-1">
													<div class="col-md-12">													
														<h5 style="font-size:20px;" class="font-weight-bold fontTitle">{!!$project->title!!}{!! $gapTxt !!}</h5>
													</div>
												</div>
												<?php
														// $budget = $project->budget;
														// $invested = $project->investment()->sum('amount');
														// $done = $invested*100/$budget;
														// $done = round($done);
													 ?>
												
												 
												<div class="row mt-2">												
													<div class="col-md-12">
														<h5 class="priceTitle" style="font-size:17px; letter-spacing:2px;"><span class="fontSize">現在 </span> {!!number_format($invested)!!} 円 </h5>
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
												<!-- <div class="row mt-2"> -->
													<div class="col-md-offset-2 mr-0 div-radius ml-3 box-height" style="height:80px; width:80px ">
														<p class="text-center pt-2"><span class="pt-2 text-center" style="font-size:11px;">応援者</span>
															<br><span  style="font-family: w6;font-size: 21px;" class="p-0 m-0 text-center font investment-amount-number-text">{{ $project->investment()->where('investments.status', true)->count() }}人</span>
														</p>
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
															<div class="text-center my-auto" style="font-family:w3;padding:35% 0 30% 0">終了</div>
														@else
															<p class="text-center pt-2"><span class="pt-2 text-center" style="font-family: w3;font-size:11px;">残り日数</span>
															<br>
															<span class="p-0 m-0 text-center font" style="font-family: w6;font-size:21px;">{{ $days_between }}{{$hours_between <= 24? '時間':' 日'}}  </span>
															</p>
														@endif
													</div>
													<div class=" offset-0  edit-button ml-2">
														{{--@if($project->status != 0)--}}
															<div class="bg-dark div-radius1">
																<a href="{{ route('user-project-details', $project->id) }}" class="p-2 fontSize text-white btn btn-md btn-block font-weight-bold see-details-link-btn my_project_list_see_more_button">詳細をみる</a>
															</div>
														{{--@else
															<div class="bg-dark div-radius1">
																<a href="#" class="p-2  text-white btn btn-md btn-block font-weight-bold notyet see-details-link-btn my_project_list_see_more_button">詳細をみる</a>
															</div>
														@endif--}}
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
						<div class="row mb-5">
							<div class="col-md-12 col-12">
								<div class="row inner">
									<div class="col-md-12 col-12 pt-3">
										<h4 class="heading">現在支援中のプロジェクト</h4>
									</div>
								</div>
							</div>
						</div>

						@if($invested_projects)
						@foreach ($invested_projects as $invested_project)
							<?php
								$budget = $invested_project->budget;
								$invested = $invested_project->investment()->where('investments.status', 1)->sum('investments.amount');
								$done = $invested*100/$budget;
								$done = round($done);
							?>
							<?php
								$start = strtotime("now");
								$end = strtotime(date('Y-m-d 23:59:59', strtotime($invested_project->end)));
								$days_between = ceil(abs($end - $start) / 86400);
								$hours_between = round((strtotime(date('Y-m-d 23:59:59', strtotime($invested_project->end))) - strtotime("now"))/3600);
								$days_between = $hours_between <= 24?$hours_between:$days_between;
								$days_between = $days_between<0?0:$days_between;
							?>
							<div class="row mb-5">
							<div class="col-md-12 col-12">
								{{-- <div class="row inner">
									<div class="col-md-12 col-12 pt-3">
										<h4 class="heading">現在支援中のプロジェクト</h4>
									</div>
								</div> --}}

								<div class="row inner">
									<div class="col-md-12 col-12">
										<div class="row inner_inner">
											<div class="col-md-5">
												<div class="row">
													<div class="col-md-12 project-item">
													<div class="frame">
															<span class="helper"></span>
														<img src="{{$invested_project->featured_image ?  asset('uploads/projects/'.$invested_project->featured_image) : asset('uploads/projects/1615154785167836.jpeg')}}"   style="max-height:245px;height:243px;margin-left:-5px;" alt="" class="img-fluid imageResize">
													</div>
														<div class="project_status {{$days_between <= 0 ? 'status_3' : ($done >= 100?'status_2':'status_1')}}"><span>{{ $days_between <= 0 ? '終了' : ($done >= 100?'達成':'募集中')}}</span></div>
													</div>
												</div>
											</div>
											<div class="col-md-7 margin_top">
												<div class="row">
													<div class="col-md-7 col-7">
														<h6 style="font-family: w3;font-size:11px; color:#bfc5cc;">
															<span class="category-name" style="color:#bfc5cc;"> 	
														 		<i class="fa fa-tag"></i> 
														 		<a href="/?c={{ $invested_project->category->id }} ">{{$invested_project->category->name}}</a>
															</span>
														</h6>
													</div>
													<div class="col-md-5 col-5">
													{{--@php
															$fav = 0;
														@endphp
														@foreach ($invested_project->favourite as $f)
															@if ($f->user_id == Auth::user()->id)
																@php
																	$fav = 1;
																@endphp
															@endif
														@endforeach
														@if(Auth::check())
															@if($invested_project->user_id==Auth::user()->id)
																<div class="col-md-4 col-sm-6 category_favourite"></div>
															@elseif($invested_project->end < date("Y-m-d", strtotime('now')))
																@if ($fav == 0)
																	<div href="" class="pull-right favfont" ><span style="color:#555 ;"> <i class="fa fa-heart-o"></i> </span>お気に入りに追加</div>
																@else
																	<span class="pull-right favfont" ><span style="color:#ed49b6"> <i class="fa fa-heart"></i> </span>お気に入り</span>
																@endif
															@else
																@if ($fav == 0)
																	<a href="{{ route('user-favourite-add-project', $invested_project->id) }}" class="pull-right favfont" ><span style="color:#555;"> <i class="fa fa-heart-o"></i> </span>お気に入りに追加</a>
																@else
																	<a href="{{ route('user-favourite-remove-project', $invested_project->id) }}" class="pull-right favfont" ><span style="color:#ed49b6"> <i class="fa fa-heart"></i> </span> お気に入り</a>
																@endif
															@endif
														@endif
														@if ($fav == 0)
															<a  href="{{ route('user-favourite-add-project', $invested_project->id) }}" class="pull-right favfont" ><span style="color:#ed49b6;"> <i class="fa fa-heart"></i> </span>お気に入りに追加</a>
														@else
															<span class="pull-right favfont" ><span style="color:#555"> <i class="fa fa-heart-o"></i> </span>  お気に入り</span>
														@endif--}}
													</div>
												</div>
												<div class="row mt-1">
													<div class="col-md-12">
														<h5 style="font-size:18px;" class="font-weight-bold ">{{$invested_project->title}}</h5>
													</div>
												</div>

												<div class="row mt-2">
													<div class="col-md-9">
														<h5 style="font-size:17px; letter-spacing:2px;"><span class="fontSize">現在</span> {!!number_format($invested)!!} 円 </h5>
														<div class="progress">
															<div class="progress-bar bg-primary" role="progressbar" aria-valuenow="{{$done}}" aria-valuemin="0" aria-valuemax="100" style="width:{{$done}}%">
																&nbsp;{{$done}}%
															</div>
														</div>
													</div>
												</div>
												<div class="row  mt-2">
													<div class="col-md-9">
														<h5 style="font-size:17px; letter-spacing:2px;"><span class="fontSize">目標 </span> {!!number_format($budget)!!} 円</h5>
													</div>
												</div>
												<div class="row mt-2">
													<div class="col-md-offset-2 mr-0 div-radius ml-3  box-height-invest"  style="height:80px; width:80px ;">
															<p class="text-center pt-2"><span class="pt-2 text-center" style="font-family:w3;font-size:11px;">応援者</span>
															<br><span class="p-0 m-0 text-center font" style="font-family:w6;font-size:12px;">{{ $invested_project->investment()->where('investments.status', 1)->count() }}人</span><p/>
													</div>
													@php
													// $start = strtotime("now");
													// $end = strtotime($invested_project->end);
													// $days_between = ceil(abs($end - $start) / 86400);
													// $datediff = round($datediff / (60 * 60 * 24));


													$start = strtotime("now");
													$end = strtotime(date('Y-m-d 23:59:59', strtotime($invested_project->end)));
													$days_between = ceil(abs($end - $start) / 86400);
													$hours_between = round((strtotime(date('Y-m-d 23:59:59', strtotime($invested_project->end))) - strtotime("now"))/3600);
													$days_between = $hours_between <= 24?$hours_between:$days_between;

													@endphp
													<div class="col-md-offset-2 div-radius ml-2   box-height-invest" style="height:80px; width:80px ;">
														@if($end< strtotime("now"))
															<p class="text-center pt-3 p-2"><span class=" font p-0 m-0 text-center" style="font-family: w3;">終了</span></p>
														@else
															<p class="text-center pt-2"><span class=" pt-2 text-center" style="font-family:w3;font-size:11px;">残り日数</span>
															<br>
															<span class="p-0 m-0 text-center font" style="font-family:w6;font-size:12px;">{{ $days_between }} {{$hours_between <= 24? '時間':'日'}}  </span>
															</p>
														@endif
													</div>
													<div class="edit-button  offset-0">
														<p style="font-size:15px;" class="user-title">起案者：{{$invested_project->user->first_name}} {{$invested_project->user->last_name}}</p>
														<div class="bg-dark div-radius1">
															<button class="p-2 text-white message-button btn btn-md btn-block w6-14 msg_send_btn btn-default" data-user_id="{{ $invested_project->user->id }}" data-project_username="{{ $invested_project->user->first_name.' '.$invested_project->user->last_name }}" style="cursor:pointer; color:#fff; font-family: w6; font-size: 18px;">
															 <span style="color:#fff !important;"> <i class="fa fa-envelope"></i> </span>メッセージを送る</button>
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
						<div class="row">
							<div class="col-md-12 col-12">
								<div class="row inner">
									<div class="col-md-12 col-12 pt-3">
										<h4 class="heading">掲載商品</h4>
									</div>
								</div>
							</div>
						</div>
						@if($products)
						@foreach ($products as $product)
							<div class="row mb-5">
								<div class="col-md-12 col-12">
															

									<div class="row inner">
										<div class="col-md-12 col-12">
											<div class="row inner_inner">
												<div class="col-md-5">
													<div class="row">
														<div class="col-md-12 project-item">
														<div class="frame">
															<span class="helper"></span>
															@php 
															   if(mb_strlen($project->title) <= 34){
																	$cssStyle = 'max-height:245px;height:238px; margin-left:-5px';
															   }else{
																	$cssStyle = 'max-height:245px;height:243px; margin-left:-5px';
															   }
															@endphp
															<img src="{{$product->image ?  asset('uploads/products/'.$product->image) : asset('uploads/projects/1615154785167836.jpeg')}}"   style="{{ $cssStyle }}" alt="" class="img-fluid imageResize">
															{{-- <div class="project_status {{strtotime($product->end) > strtotime(date('Y-m-d H:i:s')) ? 'status_1' : 'status_2'}}"><span>{{strtotime($product->end) > strtotime(date('Y-m-d H:i:s')) ? '募集中' : '達成！'}}</span></div> --}}
														</div>
														</div>
													</div>
												</div>
												<div class="col-md-7 margin_top">
													<div class="row">
														<div class="col-md-12 col-12 category-name">
															<h6 class="comp_font" style="color:#bfc5cc;"> 
															<i class="fa fa-tag"></i><a href="{{route('front-product-list', ['c' => $product->subCategory->category->id])}}">{{ $product->subCategory->category->name }}</a>
															</h6>
														</div>
														<div class="col-md-0 col-0">
															@php
																$fav = 0;
															@endphp
															@foreach ($product->favourite as $f)
																@if ($f->user_id == Auth::user()->id)
																	@php
																		$fav = 1;
																	@endphp
																@endif
															@endforeach
															@if(Auth::check())
																@if($product->user_id==Auth::user()->id)
																	<div class="col-md-4 col-sm-6 category_favourite"></div>
																
																@else
																	@if ($fav == 0)
																		<a href="{{ route('user-favourite-add-product',$product->id) }}" class="pull-right favfont" ><span style="color:#ed49b6;"> <i class="fa fa-heart"></i> </span>お気に入りに追加</a>
																	@else
																		<a href="{{ route('user-favourite-remove-product', $product->id) }}" class="pull-right favfont" ><span style="color:#555"> <i class="fa fa-heart-o"></i> </span>お気に入り</a>
																	@endif
																@endif
															@endif
															{{--@if ($fav == 0)
																<a  href="{{ route('user-favourite-add-product', $product->id) }}" class="pull-right favfont" ><span style="color:#ed49b6;"> <i class="fa fa-heart"></i> </span>お気に入りに追加 </a>
															@else
																<span class="pull-right favfont" ><span style="color:#555"> <i class="fa fa-heart-o"></i> </span>お気に入り</span>
															@endif--}}
														</div>
													</div>
													<div class="row mt-1">
														<div class="col-md-12">
															<h5  class="font-weight-bold product-title-text">{{$product->title}}</h5>
														</div>
													</div>
													<div class="row mt-3">
														<div class="col-md-12">
															<h5  class="title" style="font-size:21px; letter-spacing:2px;">{!!number_format($product->price)!!} ポイント</h5>
														</div>
													</div>
													<div class="row  mt-3">
														<div class="col-md-12">
															<h5  style="font-size:15px; letter-spacing:2px;">カラー：
																<?php
																	$colors = [];
																	foreach ($product->color as $pt){
																		if ($pt->color != null && $pt->color != ''){
																			array_push($colors, $pt->color);
																		}
																	}
																	$color = implode(',',$colors);
																?>
																{{ $color }}
															</h5>
														</div>
													</div>
													<div class="row  mt-3">
														<div class="col-md-12">
															<h5 class="font" style="font-size:15px; letter-spacing:2px;">サイズ：
																<?php
																	$types = [];
																	foreach ($product->color as $pt){
																		if ($pt->type != null && $pt->type != ''){
																			array_push($types, $pt->type);
																		}
																	}
																	$type = implode(',',$types);
																?>
																{{ $type }}
															</h5>
														</div>
													</div>
													<div class="row mt-3">
														<div class="col-md-12">
															<div class="div-radius1">
																{{--<a href="{{ route('user-product-edit', $product->id) }}" class="p-2 bg-dark text-white btn btn-secondary font-weight-bold" style="padding-left: 30px !important;padding-right: 30px !important;">編集する</a>--}}
																<a style="font-family: w6; font-size: 18px;" href="{{ route('user-product-details', $product->id) }}" class="p-2 bg-dark text-white btn btn-secondary font-weight-bold">詳細をみる</a>
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
								<a href="" class="btn btn-warning">商品を登録する</a>
							</div>
						</div>
					@else
						<div class="row" style="margin-top: 30px;margin-bottom: 30px;">
							<div class="col-12 text-center">
								<a href="{{ route('user-product-add') }}" class="btn btn-warning">商品を登録する</a>
							</div>
						</div>
					@endif
						<div class="row">
							<div class="col-md-12 col-12">
								<div class="row inner">
									<div class="col-md-12 col-12 pt-3">
										<h4 class="heading">購入済み商品</h4>
									</div>
								</div>
							</div>
						</div>
						@if($OrderDetails)
							@foreach($OrderDetails as $orderDetail)
								<div class="row mb-5">
									<div class="col-md-12 col-12">

										<div class="row inner">
											<div class="col-md-12 col-12">
												<div class="row inner_inner">
													<div class="col-md-5">
														<div class="row">
															<div class="col-md-12 project-item">
															<div class="frame">
															<span class="helper"></span>
																<img src="{{$orderDetail->product->image ?  asset('uploads/products/'.$orderDetail->product->image) : asset('uploads/projects/1615154785167836.jpeg')}}"   style="max-height:242px;height:243px; margin-left:-5px" alt="" class="img-fluid imageResize">
															</div>
															</div>
														</div>
													</div>
													<div class="col-md-7 margin_top">
														<div class="row">
															<div class="col-md-7 col-7">
																<h6 class="category-name" style="color:#bfc5cc;"> <span style="color:#bfc5cc;"> <i class="fa fa-tag"></i> {{ $orderDetail->product->subCategory->category->name }}</h6>
															</div>
															<div class="col-md-5 col-5">
															{{--@php
																	$fav = 0;
																@endphp
																@foreach ($orderDetail->product->favourite as $f)
																	@if ($f->user_id == Auth::user()->id)
																		@php
																			$fav = 1;
																		@endphp
																	@endif
																@endforeach
																@if(Auth::check())
																	@if($orderDetail->product->user_id==Auth::user()->id)
																		<div class="col-md-4 col-sm-6 category_favourite"></div>
																	@else
																		@if ($fav == 0)
																			<a href="{{ route('user-favourite-add-product',$orderDetail->product->id) }}" class="pull-right favfont" style="font-size:14px;"><span style="color:#555 ;"> <i class="fa fa-heart-o"></i> </span>お気に入りに追加</a>
																		@else
																			<a href="{{ route('user-favourite-remove-product', $orderDetail->product->id) }}" class="pull-right favfont" style="font-size:14px;"><span style="color:#ed49b6"> <i class="fa fa-heart"></i> </span>お気に入り</a>
																		@endif
																	@endif
																@endif
																@if ($fav == 0)
																	<a  href="{{ route('user-favourite-add-product', $orderDetail->id) }}" class="pull-right favfont" style="font-size:14px;"><span style="color:#ed49b6;"> <i class="fa fa-heart"></i> </span>お気に入りに追加</a>
																@else
																	<span class="pull-right favfont" style="font-size:14px;"><span style="color:#555"> <i class="fa fa-heart-o"></i> </span> お気に入り</span>
																@endif--}}
															</div>
														</div>
														<div class="row mt-1">
															<div class="col-md-9">
																<h5  style="font-size:20px;" class="font-weight-bold">{{$orderDetail->product->title}}</h5>
															</div>
														</div>
														<div class="row mt-2">
															<div class="col-md-9">
																<h5 class="title" style="font-size:21px; letter-spacing:2px;">{{$orderDetail->product->price}} ポイント</h5>
															</div>
														</div>
														<div class="row  mt-2">
															<div class="col-md-9">
																<?php
																	$specification = '';
																	if($orderDetail->qty){
																		$specification .= $orderDetail->qty.'個';
																		if($orderDetail->product->color){
																			$specification .= '/';
																		}
																	}
																	if($orderDetail->color){
																		$specification .= $orderDetail->color;
																		if($orderDetail->size){
																			$specification .= '/';
																		}
																	}
																	if($orderDetail->size){
																		$specification .= $orderDetail->size;
																	}
																
																?>
																<h5 class="message-button" style="font-size:15px; letter-spacing:2px;">{{$specification}}</h5>
															</div>
														</div>
														<div class="row  mt-2">
															<div class="col-md-9">
																<h5 class="message-button" style="font-size:15px; letter-spacing:2px;">購入日：2018年10月1日</h5>
															</div>
														</div>
														<div class="row  mt-2">
															<div class="col-md-9">
																<h5 class="message-button" style="font-size:13px; letter-spacing:2px;">商品提供者：{{$orderDetail->product->user->first_name}} {{$orderDetail->product->user->last_name}}</h5>
															</div>
														</div>
														<div class="row mt-3">
															<div class="col-md-6 col-6 pr-1 pr-md-1">
																<button style="" class="p-2 text-white btn btn-md message-button btn-block w6-14 msg_send_btn btn-default" data-user_id="{{ $orderDetail->product->user->id }}" data-project_username="{{ $orderDetail->product->user->first_name.' '.$orderDetail->product->user->last_name }}" style="cursor:pointer; color:#fff;">
																	<span style="color:#fff !important;"> <i class="fa fa-envelope"></i> </span>メッセージを送る
																</button>
															</div>
															@php $my_rating = 0; @endphp
															@foreach ($orderDetail->product->ratings as $rating)
																@if ($rating->user_id == Auth::user()->id)

															@php
																		$my_rating = $rating->user_rating
																	@endphp
																@endif
															@endforeach

															<div class="col-md-6 col-6 pl-1 pl-md-1">
																<button type="button" style="" class="p-2  message-button text-white btn btn-md btn-block w6-14 btn-warning rating_btn" data-toggle="modal" data-target="#star" data-my-rate="{{ $my_rating }}" data-product-id = {{ $orderDetail->product_id }}>★★★  レビューを書く</button>
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
@include('user.layouts.star-rating')
@include('user.layouts.message_modal')



@stop

@section('custom_js')
	<script type="text/javascript">
	    // var error = document.getElementById('getError').value;
			var error = $('#getError').val();

			// error = 1;
				$(window).on('load',function(){
					console.log('error = ' + error);
						if (error == 1) {
							$('#myModal').modal('show');
						}
				});




			// $('#myModal').modal({
    	// 	backdrop: 'static',
    	// 	keyboard: false  // to prevent closing with Esc button (if you want this too)
			// });
	</script>


		<script type="text/javascript">
				$(document).ready(function(){
					$('.msg_send_btn').on('click', function(e){
						var user_id = $(this).attr('data-user_id');
						var user_name = $(this).attr('data-project_username');


						$('#to_id').val(user_id);
						$('#project_user_name').val(user_name);
						$('#send-message').modal('show');
						//$('#send-message').addClass('show');
					});




				$('.rating_btn').on('click', function(){
					var product_id = $(this).attr('data-product-id');
						var my_rate = parseInt($(this).attr('data-my-rate'));
					// console.log(product_id);
					$('#get_product_id').val(product_id);
					$('#get_my_rate').val(my_rate);

					if (my_rate == 1) {
						$('#one').addClass('active');
						$('#two').removeClass('active');
						$('#three').removeClass('active');
						$('#four').removeClass('active');
						$('#five').removeClass('active');
					}else if (my_rate == 2) {
						$('#one').removeClass('active');
						$('#two').addClass('active');
						$('#three').removeClass('active');
						$('#four').removeClass('active');
						$('#five').removeClass('active');
					}else if (my_rate == 3) {
						$('#one').removeClass('active');
						$('#two').removeClass('active');
						$('#three').addClass('active');
						$('#four').removeClass('active');
						$('#five').removeClass('active');
					}else if (my_rate == 4) {
						$('#one').removeClass('active');
						$('#two').removeClass('active');
						$('#three').removeClass('active');
						$('#four').addClass('active');
						$('#five').removeClass('active');

					}else if (my_rate == 5) {
						$('#one').removeClass('active');
						$('#two').removeClass('active');
						$('#three').removeClass('active');
						$('#four').removeClass('active');
						$('#five').addClass('active');
					}

				});

				$('.rating').on('click', function(){
					var rate = $(this).attr('data-rating');
					$('#get_rating').val(rate);
					// console.log($('#get_rating').val());
					// $(this).addClass('active');
					var getId = $(this).attr('id');
					console.log(getId);
					if (getId == 'one') {
						$('#one').addClass('active');
						$('#two').removeClass('active');
						$('#three').removeClass('active');
						$('#four').removeClass('active');
						$('#five').removeClass('active');
					}else if (getId == 'two') {
						$('#one').removeClass('active');
						$('#two').addClass('active');
						$('#three').removeClass('active');
						$('#four').removeClass('active');
						$('#five').removeClass('active');
					}else if (getId == 'three') {
						$('#one').removeClass('active');
						$('#two').removeClass('active');
						$('#three').addClass('active');
						$('#four').removeClass('active');
						$('#five').removeClass('active');
					}else if (getId == 'four') {
						$('#one').removeClass('active');
						$('#two').removeClass('active');
						$('#three').removeClass('active');
						$('#four').addClass('active');
						$('#five').removeClass('active');
					}else if (getId == 'five') {
						$('#one').removeClass('active');
						$('#two').removeClass('active');
						$('#three').removeClass('active');
						$('#four').removeClass('active');
						$('#five').addClass('active');
					}

				});
				});
		</script>

@stop
