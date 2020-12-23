<div class="project_item">
	<a href="{{  route('front-product-details', ['id' => $p->id])}}">
		<div  class="project_img" style="width:auto; background-color:#fff; background-image: url({{url('uploads/products/'.$p->image)}});background-repeat: no-repeat;
			background-position:center center; background-size:cover;">
		</div>
	</a>
	<div class="project_text">
		<ul class="project_tags list-inline project_category_items product_progress_height"  >
			<li class="list-inline-item">
				<i class="fa fa-tag"></i> 
				<a class="category-name" href="{{route('front-product-list', ['c' => $p->subCategory->category->id])}}">{{$p->subCategory->category->name}}</a>
				@if($p->is_featured)
					<p class="recommend_area">オススメ!</p>
				@endif
			</li>
		</ul>
		<h2 class="project_title" style="margin-bottom: 0px"><a title="{{$p->title}}" class="title Cdiv" href="{{route('front-product-details', ['id' => $p->id])}}">{{ str_limit($p->title, $limit = 25, $end = '...') }}</a></h2>
		<div class="row project_progress ">
			<div class="col-md-12">
				<span style="letter-spacing: 1px;" class="price-text"> <span style="font-size:18px;">{!!number_format($p->price)!!}</span>   円（税込) </span>
			</div>
		</div>
		<div class="row project_item_footer">
			<div class="col-12">
				<div class="Cdiv">{{ str_limit($p->company_name, $limit = 33, $end = '...') }}</div>
			</div>
		</div>
	</div>
</div>
