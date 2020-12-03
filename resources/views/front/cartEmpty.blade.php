@extends('main_layout')
@section('title') 
カート | Crofun
@stop
@section('custom_css')
	<style type="text/css">
		
	</style>
@stop


@section('ecommerce')

@stop

@section('content')
{{-- @include('user.layouts.tab') --}}

<div class="row breadcrump p-0 m-0 project_sorting first_tabs">
	<div class="col-md-8 col-sm-12">
		<div class="offset-1">
			<div class="container">
				<div class="col-md-10 col-12">
					@foreach(Cart::content() as $p)
						@php
						//dd($p);
						$product = App\Models\Product::find($p->id)
						@endphp
                        @if($product  <= 0)
                            <ul class="list-inline project_category_data pt-4">
                                {{-- <li class="list-inline-item">>Top ></a></li> --}}
                                <li class="list-inline-item">TOP ＞  <a style="color:#292b2c" href="{{route('front-product-list')}}">カタログ一覧</a> ＞ <a style="color:#292b2c" href="{{route('front-product-list', ['c' => $product->subCategory->category->id])}}">{{ $product->subCategory->category->name }}</a> ＞ <a style="color:#292b2c" href="{{route('front-product-details', ['id' => $product->id])}}">{{ $product->title }}</a> </li>
                            </ul>
                        @endif
					@endforeach
				</div>
			</div>
		</div>
	</div>
	<div class="col-md-0 ">
		<div class="py-3 ">
			{{-- @include('front.layouts.search') --}}
		</div>
	</div>
</div>






<div class="container" id="new-project">
	<div class="card commonError hide offset-md-1 mt-3">
		<h4 class='p-3' style="color:red;">正しく入力されてない項目があります。メッセージをご確認の上、もう一度入力ください。</h4>
	</div>
	@if (session('error_message'))
		<div class="mt-5">
			<div class="row justify-content-center">
				<div class="col-md-11">
					 <h4 class="bg-info text-danger p-4">{{ session('error_message') }}</h4>
				</div>
			</div>
		</div>
	@endif
	<div class="mt20">
		<div class="row justify-content-center">
			<div class="col-md-10">
				@if (Auth::check())
					@if(Cart::count() <= 0)
						<div class="text-center" style="font-weight:bold;min-height:300px">カートに商品はありません</div>
					@endif
				@endif
			</div>
		</div>
	</div>
</div>





{{-- @include('user.layouts.add-project') --}}
@stop

@section('custom_js')

@stop
