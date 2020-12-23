@extends('main_layout')
@section('title') 
プロジェクト詳細 | Crofun
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
        .preview_area{
            padding-top: 20px;
            padding-bottom: 20px;
            border-bottom: 1px solid #ccc;
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
		.btn-dark{
			background-color: #575757;
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
				font-size: 18px !important;
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
				font-size: 16px !important;
				font-weight: 500;
				margin-left: 20px;
				padding-bottom: 5px;
				font-family: w3;
			}
			.first_tabs ul li a {
				color: #333333;
				text-decoration: none;
				font-size: 12px;
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
				font-size: 13px !important;
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
				font-size: 8px;
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
		
		@media (max-width: 1000px) {
            .edit-title{
                font-size: 14px
            }
            .edit-description{
                font-size: 13px
            }
		}
		@media (max-width: 900px) {
            .edit-title{
                font-size: 12px
            }
            .edit-description{
                font-size: 12px
            }
		}
		@media (max-width: 850px) {
            .edit-title{
                font-size: 11px
            }
            .edit-description{
                font-size: 11px
            }
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

@include('user.layouts.tab')


<div class="container">
	<div class="row">
	  	<div class="offset-md-1 col-md-10 col-12">
			<div class="mt20">
				<div class="row">
					<div class="col-md-0">
						{{--@include('user.layouts.profile')--}}
					</div>
                    <div class="col-md-10">

                    @php

                    $start = strtotime(date('Y-m-d 23:59:59', strtotime($project->start)));
                    $end = strtotime(date('Y-m-d 23:59:59', strtotime($project->end)));
                    $days_between = ceil(abs($end - $start) / 86400);
                    @endphp
                        <div class="mt20">
                            <div class="row" style="margin-top: 30px;">
                                <div class="col-12">
                                    <div class="row ">
                                        <div class="col-9"></div>
                                            <div class="col-3">
                                             <div class="row ">
                                                 @if(($project->status == 1)||($project->status == 3))
                                                    @if(strtotime($project->end) < strtotime(date('Y-m-d H:i:s')))
                                                        <div class="col-md-12 p-0"></div>
                                                    @else
                                                        <div class="col-md-12 p-0">
                                                            <div class="div-radius1 text-right">
                                                                <a href="{{ route('user-project-edit', $project->id) }}" class="p-2 bg-dark text-white btn btn-secondary font-weight-bold" style="padding-left: 30px !important;padding-right: 30px !important;">追加する</a>
                                                            </div>
                                                        </div>
                                                    @endif
                                                @else
                                                    <div class="col-md-12 p-0">
                                                        <div class="div-radius1 text-right">
                                                            <div href="" class="p-2 bg-dark text-white btn btn-secondary font-weight-bold messageModal" style="padding-left: 30px !important;padding-right: 30px !important;">編集する</div>
                                                        </div>
                                                    </div>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row preview_area">
                                        <div class="col-3 edit-title">基本情報入力</div>
                                    </div>
                                    <div class="row preview_area">
                                        <div class="col-3 edit-title">プロジェクト名</div>
                                        <div class="col-9 edit-description">{{$project->title}}</div>
                                    </div>
                                    <div class="row preview_area">
                                        <div class="col-3 edit-title">カテゴリ</div>
                                        <div class="col-9 edit-description">{{ $project->category->name }}</div>
                                    </div>
                                    <div class="row preview_area">
                                        <div class="col-3 edit-title">画像</div>
                                        <div class="col-9 ">
                                            <img width="200" src="{{asset('uploads/projects/'. $project->featured_image)}}">
                                        </div>
                                    </div>
                                    <div class="row preview_area">
                                        <div class="col-3 edit-title">プロジェクト概要</div>
                                        <div class="col-9 edit-description" style="word-wrap:break-word">{!! nl2br(e($project->description)) !!}</div>
                                    </div>
                                    <div class="row preview_area">
                                        <div class="col-3 edit-title">目的</div>
                                        <div class="col-9 edit-description">{!!nl2br(e($project->purpose))!!} </div>
                                    </div>
                                    <div class="row preview_area">
                                        <div class="col-3 edit-title">目標金額</div>
                                        <div class="col-9 edit-description"> {{number_format($budget)}} 円</div>
                                    </div>
                                    <div class="row preview_area">
                                        <div class="col-3 edit-title">募集期間</div>
                                        <div class="col-9">{{str_limit($project->start, $limit = 11, $end = '')}} ~ {{str_limit($project->end, $limit = 11, $end = '')}}  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  {{str_limit($days_between, $limit = 11, $end = '')}} 日 </div>
                                        {{--<div class="col-0">{{str_limit($days_between, $limit = 11, $end = '')}}</div>--}}
                                    </div>
                                    <div class="row preview_area">
                                        <div class="col-3 edit-title">支援金受取人名</div>
                                        <div class="col-9 edit-description"style="word-wrap:break-word">{!! nl2br(e($project->beneficiary)) !!}</div>
                                    </div>
                                    <div class="row preview_area">
                                        <div class="col-3 edit-title">予算用途の内訳</div>
                                        <div class="col-9 edit-description"style="word-wrap:break-word">{!! nl2br(e($project->budget_usage_breakdown)) !!}</div>
                                    </div>
                                    <div class="row preview_area">
                                        <div class="col-12 edit-title">リターン情報入力</div>
                                    </div>
                                    @foreach ($project->reward->sortBy('amount') as $reward)
                                        <div class="row preview_area">
                                            <div class="col-3 edit-title">金額</div>
                                            <div class="col-9 ">{{ number_format($reward->amount) }} 円</div>
                                        </div>
                                        <div class="row preview_area">
                                            <div class="col-3 edit-title">Crofunポイント</div>
                                            <div class="col-9 ">{{ number_format($reward->is_crofun_point) }}  ポイント </div>
                                        </div>
                                        <div class="row preview_area">
                                            <div class="col-3 edit-title">リターン品名</div>
                                            <div class="col-9 edit-description">{{$reward->is_other}} </div>
                                        </div>
                                        <div class="row preview_area">
                                            <div class="col-3 edit-title">内容</div>
                                            <div class="col-9 edit-description"style="word-wrap:break-word">{!! nl2br(e($reward->other_description))!!} </div>
                                        </div>
                                        <div class="row preview_area">
                                            <div class="col-3 edit-title">写真</div>
                                            <div class="col-9 ">
                                                <img src="{{ asset('uploads/projects/'. $reward->other_file) }}" alt="" class="" width="200px" height="200px">
                                            </div>
                                        </div>
                                    @endforeach
                                    <div class="row preview_area">
                                        <div class="col-12 edit-title">追加情報入力</div>
                                    </div>
                                    @foreach ($details as $projectDetails)
                                        <div class="row preview_area">
                                            <div class="col-3 edit-title">見出しタイトル</div>
                                            <div class="col-9 edit-description">{{$projectDetails->details_title}} </div>
                                        </div>
                                        <div class="row preview_area">
                                            <div class="col-3 edit-title">内容</div>
                                            <div class="col-9 edit-description"style="word-wrap:break-word">{!! nl2br(e($projectDetails->details_description))!!} </div>
                                        </div>
                                        <div class="row preview_area">
                                            <div class="col-3 edit-title">写真</div>
                                            <div class="col-9 ">
                                                <img src="{{ asset('uploads/projects/'. $projectDetails->draft_file) }}" alt="" class="" width="200px" height="200px">
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


@include('user.layouts.edit_message_modal')

@stop

@section('custom_js')
	<script type="text/javascript">
			$(document).ready(function(){
				$('.msg_send_btn').on('click', function(e){
					var user_id = $(this).attr('data-user_id');
					var user_name = $(this).attr('data-project_username');


					$('#to_id').val(user_id);
					$('#get_vendor_name').html('宛先 : ' + ' ' + user_name);
					$('#send-message').modal('show');
					//$('#send-message').addClass('show');
				});
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
        $('.messageModal').on('click',function(){
            $('#edit-message').modal('show');
        });
    </script>
@stop

