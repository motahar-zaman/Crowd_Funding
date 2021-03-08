<?php
	$categories = App\Models\ProjectCategory::where('status', 1)->get();
?>

<div class="row">
	<div class="">
		<div class="col-12">
			<ul class="list-inline project_category_data pt-4">
				{{-- <li class="list-inline-item">>Top ></a></li> --}}
				<li class="list-inline-item"> <a href="{{route('front-home')}}">TOP</a>> <a href="{{route('front-project-list-bycat', ['s' => 'd'])}}">プロジェクト一覧</a> > <a href="{{route('front-project-list-bycat', ['c' => $project->category->id, 's' => 'd'])}}">{{ $project->category->name }}</a> >  {{ $project->title }}</a></li>
			</ul>
		</div>
	</div>
</div>
