<?php
	$budget = $p->budget;
	$investment = $p->investment->where('status', true)->sum('amount');
	$done = $investment*100/$budget;
	$done = round($done);
	// print(strtotime($p->end) < strtotime(date('Y-m-d H:i:s')));
?>
<?php
	// $running_projects = App\Models\Projects::where('status', 1)->get();
	$start = strtotime("now");
	$end = strtotime(date('Y-m-d 23:59:59', strtotime($p->end)));
	$days_between = ceil(abs($end - $start) / 86400);
	$hours_between = round((strtotime(date('Y-m-d 23:59:59', strtotime($p->end))) - strtotime("now"))/3600);
	$days_between = $hours_between <= 24 ? $hours_between : $days_between;
	$days_between = $days_between < 0 ? 0 : $days_between;
?>
<div class="project_item" >
	<a href="{{route('front-project-details', ['id' => $p->id])}}">
		<div  class="project_img" style=" background-color:#fff; background-image: url({{url('uploads/projects/'.$p->featured_image)}});background-repeat: no-repeat;
			background-position: center center; background-size: cover;">
			@if($days_between <= 0)
				<div class="project_status status_3"><span>終了</span></div>
			@else
				@if($done >= 100)
					<div class="project_status status_2"><span>達成</span></div>
				@else
					@if($p->starting_status == 1)
						<div class="project_status status_1"><span>募集中</span></div>
					@else
						<div class="project_status status_1"><span>募集前</span></div>
					@endif
				@endif
			@endif
			{{--<div class="project_status {{$days_between <= 0 ? 'status_3' : ($done >= 100?'status_2':'status_1')}}"><span>{{$days_between <= 0 ? '終了' : ($done >= 100?'達成':'募集中')}}</span></div>--}}
		</div>
	</a>
	<div class="project_text">
		<ul class="project_tags list-inline project_category_items">
			<li class="list-inline-item">
				<i class="fa fa-tag"></i> <a class="category-name" href="{{ route('front-project-list', ['c' => $p->category->id]) }}" class="category">{{$p->category->name}}</a>
			</li>
		</ul>
		<h2 class="project_title"><a title="{{$p->title}}" class="title Cdiv" href="{{route('front-project-details', ['id' => $p->id])}}">{{ $p->title }}</a></h2>
		<div class="row project_progress project_progress_height">
			<div class="col-12">
				<div class="progress project_progress">
					<div class="progress-bar bg-primary w-{{ $done }}" style="width:{{ $done }}%;" role="progressbar" aria-valuenow="{{ $done }}" aria-valuemin="0" aria-valuemax="100">
							<p style="margin: 0px !important;color: white;">&nbsp;{{ $done }}%</p>
					</div>
				</div>
			</div>
		</div>
		<div class="row project_item_footer" >
			<div class="col-7 price_text">
				<div>現在 {{ number_format($investment) }} 円</div>
			</div>
			<div class="col-5 price_text">
				<div class="text-right">応援者 {{$p->investment->where('status', true)->count()}} 人</div>
			</div>
		</div>
	</div>
</div>