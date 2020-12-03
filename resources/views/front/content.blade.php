@extends('main_layout')
@section('title')
{{$title}}
@stop
@section('custom_css')
	<style>
	</style>
@stop

@section('content')
<div class="row breadcrump p-0 m-0 project_sorting">
	<div class="container">
		<div class="row container_div">
			<div class="col-md-12 col-12 ">
				<ul class="list-inline project_category_data pt-4">
					<li class="list-inline-item">TOP &gt; {{ isset($content->title) ? $content->title : '' }}</li>
				</ul>
			</div>
		</div>
	</div>
</div>

<div class="container" style="min-height: 700px">
	<div class="mt20"></div>
	<div class="row container_div">
		<div class="col-md-12 col-12">
			{{--<h3>{{  isset($content->title) ? $content->title : '' }}</h3>--}}
			<p>
				{!!  html_entity_decode($content->description) !!}
			</p>
		</div>
	</div>
</div>

@stop

@section('custom_js')
@stop






