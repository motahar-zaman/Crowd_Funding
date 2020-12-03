@extends('admin.layouts.main')

@section('custom_css')
<style type="text/css">
		.wizard > .steps > ul > li {
		    width: 20%;
		}
		.body{

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
			background-color: #E4E4E4;
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
	.preview_area{
		padding-top: 20px;
		padding-bottom: 20px;
		border-bottom: 1px solid #ccc;
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
/* .content-inner-arrow:after{
	-webkit-clip-path: polygon(0 0, 100% 0, 100% 82%, 51% 100%, 0 82%);
	clip-path: polygon(0 0, 100% 0, 100% 82%, 51% 100%, 0 82%);
	display: block;
	height: 2px;
	background-color: #81ccff;
	content: "";
	width: 100%;
	margin: 0 auto;
	margin-top: 80px;
	margin-bottom: 0px;

} */
/* .arrow-down {
  width: 0;
  height: 0;
  border-left: 20px solid transparent;
  border-right: 20px solid transparent;

  border-top: 20px solid #f00;
} */

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
		margin-bottom: 25px !important;
	}
	.breadcrump{
		background-color: #F1F1F1;
	}
	.breadcrump li a{
		color: #000;

	}
	</style>
@stop

<?php
$budget = $project->budget;
$invested = $project->investment->where('status', true)->sum('amount');
$done = $invested*100/$budget;
$done = round($done);
?>

@section('content')


<div class="container-fluid">

@php

$start = strtotime(date('Y-m-d 23:59:59', strtotime($project->start)));
							$end = strtotime(date('Y-m-d 23:59:59', strtotime($project->end)));

$days_between = ceil(abs($end - $start) / 86400);
	//$timeDiff = $project->start - $project->end;		
	// var timeDiff = Math.abs(timeDiff);
	//var diffDays = Math.ceil(timeDiff / (1000 * 3600 * 24)); -->

@endphp




	<div class="mt20">
		<div class="row" style="margin-top: 30px;">
			<div class="col-12">
				<div class="row preview_area">
					<div class="col-3">基本情報入力</div>
				</div>
				<div class="row preview_area">
					<div class="col-3">プロジェクト名</div>
					<div class="col-9 ">{{$project->title}}</div>
				</div>
				<div class="row preview_area">
					<div class="col-3">カテゴリ</div>
					<div class="col-9 ">{{ $project->category->name }}</div>
				</div>
				<div class="row preview_area">
					<div class="col-3">画像</div>
					<div class="col-9 ">
						<img width="200" src="{{asset('uploads/projects/'. $project->featured_image)}}">
					</div>
				</div>
				<div class="row preview_area">
					<div class="col-3">プロジェクト概要</div>
					<div class="col-9">{!! nl2br(e($project->description)) !!}</div>
				</div>
				<div class="row preview_area">
					<div class="col-3">目的</div>
					<div class="col-9 ">{!! nl2br(e($project->purpose ))!!} </div>
				</div>
				<div class="row preview_area">
					<div class="col-3">目標金額</div>
					<div class="col-9"> {{App\Helpers\Number::number_format_short($budget)}} 円</div>
				</div>
				<div class="row preview_area">
					<div class="col-3">募集期間</div>
					<div class="col-9">{{str_limit($project->start, $limit = 11, $end = '')}} ~ {{str_limit($project->end, $limit = 11, $end = '')}}</div>
					{{--<div class="col-3">{{str_limit($days_between, $limit = 11, $end = '')}}</div>--}}
				</div>
				<div class="row preview_area">
					<div class="col-3">支援金受取人名</div>
					<div class="col-9 ">{!! nl2br(e($project->beneficiary)) !!}</div>
				</div>
				<div class="row preview_area">
					<div class="col-3">予算用途の内訳</div>
					<div class="col-9 ">{!! nl2br(e($project->budget_usage_breakdown)) !!}</div>
				</div>
				<div class="row preview_area">
					<div class="col-12">リターン情報入力</div>
				</div>
				@foreach ($project->reward->sortBy('amount') as $reward)
					<div class="row preview_area">
						<div class="col-3">金額</div>
						<div class="col-9 ">{{ $reward->amount }} 円</div>
					</div>
					<div class="row preview_area">
						<div class="col-3">Crofunポイント</div>
						<div class="col-9 ">{{ $reward->is_crofun_point }}  ポイント </div>
					</div>
					<div class="row preview_area">
						<div class="col-3">リターン品名</div>
						<div class="col-9 ">{{$reward->is_other}} </div>
					</div>
					<div class="row preview_area">
						<div class="col-3">内容</div>
						<div class="col-9 ">{!! nl2br(e($reward->other_description))!!} </div>
					</div>
					<div class="row preview_area">
						<div class="col-3">写真</div>
						<div class="col-9 ">
							<img src="{{ asset('uploads/projects/'. $reward->other_file) }}" alt="" class="" width="200px" height="200px">
						</div>
					</div>
				@endforeach
				<div class="row preview_area">
					<div class="col-12">追加情報入力</div>
				</div>
				@foreach ($details as $projectDetails)
				<div class="row preview_area">
						<div class="col-3">見出しタイトル</div>
						<div class="col-9 ">{{$projectDetails->details_title}} </div>
					</div>
					<div class="row preview_area">
						<div class="col-3">内容</div>
						<div class="col-9 ">{!! nl2br(e($projectDetails->details_description))!!} </div>
					</div>
					<div class="row preview_area">
						<div class="col-3">写真</div>
						<div class="col-9 ">
							<img src="{{ asset('uploads/projects/'. $projectDetails->draft_file) }}" alt="" class="" width="200px" height="200px">
						</div>
					</div>
				@endforeach
			</div>
		</div>













	

	
</div>


</div>





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
@stop
