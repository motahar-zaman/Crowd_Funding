<?php
	$categories = App\Models\ProjectCategory::where('status', 1)->get();
?>

<div class="">
	<div class="">
		<div class="">
			<ul class="list-inline project_category_data pt-4">
				{{-- <li class="list-inline-item">>Top ></a></li> --}}
				<li class="list-inline-item"> <a href="{{route('front-home')}}">TOP</a> &nbsp; > <a href="{{route('front-product-list')}}">カタログ一覧</a> &nbsp; > <a href="{{route('front-product-list', ['c' => $product->subCategory->category->id])}}">{{ $product->subCategory->category->name }}</a> &nbsp; > {{ $product->title }}</a></li>
			</ul>
		</div>
	</div>
</div>
