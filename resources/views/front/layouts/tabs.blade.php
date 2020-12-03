<?php
	$categories = App\Models\ProjectCategory::where('status', 1)->get();
?>

<div class="row">
	<div class="col-md-10 col-12 offset-md-1">
		<ul class="list-inline project_category_data">
			<li class="list-inline-item"><a href="{{route('front-project-list-bycat', ['s' => 'd'])}}" class="active">ALL</a></li>
			 <li class="list-inline-item"><a href="{{route('front-project-list-rank', ['s' => 'r'])}}" class="">ランキング</a></li>
			<?php foreach($categories as $c){?>
				<li class="list-inline-item"><a style="font-family: w6;font-size: 14px;" href="{{route('front-project-list-bycat',['c'=> $c->id,'s' => 'd'])}}">{{$c->name}}</a></li>
			<?php }?>
		</ul>
		<select class="project_category_sm_data form-control">
			<option value="{{route('front-project-list')}}">ALL</option>
			<?php foreach($categories as $c){?>
				<option value="{{route('front-project-list')}}?c={{$c->id}}">{{$c->name}}</option>
			<?php }?>
		</select>
	</div>
</div>
