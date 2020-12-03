@extends('admin.layouts.main')

@section('custom_css')
<style type="text/css">
		.wizard > .steps > ul > li {
			width: 27%;
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
		.hide{
			display: none;
		}
		.bootstrap-tagsinput{
			width: 100%;
		}
		.bootstrap-tagsinput .tag{
			color: black !important;
		}
		.actions{
			text-align: center !important;
		}
		.page_title_product_register{
			padding-top: 10px;
			padding-bottom: 10px;
			font-size: 25px;
		}
		.form-control{
			width: 99.9%;
		}
		/*steps start*/
		.wizard>.steps .number{
			display: none !important;
		}
		.wizard>.steps .steptext{
			font-size: 18px;
			text-transform: uppercase;
		}
		.wizard>.steps .stepcount{
			font-size: 22px;
			font-weight: bold;
		}
		.wizard>.steps .stepinfo{
			font-size: 18px;
			display: block;
		}
		.wizard>.steps a, .wizard>.steps a:hover, .wizard>.steps a:active{
			padding: 15px;
			padding-top: 5px;
			padding-bottom: 5px;
			border-radius: 0px;
			position: relative;
		}
		.wizard>.steps .current a, .wizard>.steps .current a:hover, .wizard>.steps .current a:active{
			background-color: #FFBC00;
			padding-left: 42px;
			margin-left: -8px;
		}
		.wizard>.steps .current a:after{
			content: '';
			background: #FFBC00;
			height: 50px;
			width: 50px;
			position: absolute;
			top: 10px;
			right: -24px;
			transform: rotate(45deg);
			z-index: 9;
		}
		.wizard>.steps .disabled a, .wizard>.steps .disabled a:hover, .wizard>.steps .disabled a:active, .wizard>.steps .done a, .wizard>.steps .done a:hover, .wizard>.steps .done a:active{
			margin-left: -8px;
			padding-left: 42px;
			border: 2px solid #FFBC00;
			background-color: #ffffff;
			padding-top: 3px;
			padding-bottom: 3px;
			position: relative;
			border-right: none;
			/* border-left: none; */
		}
		.wizard>.steps .done a, .wizard>.steps .done a:hover, .wizard>.steps .done a:active{
			margin-left: -8px;
			border-left: 2px solid #FFBC00;
			color: #aaaaaa;
		}
		.wizard>.steps .disabled a:after, .wizard>.steps .done a:after{
			content: '';
			border-top: 2px solid #FFBC00;
			border-right: 2px solid #FFBC00;
			height: 50px;
			width: 50px;
			position: absolute;
			top: 8.9px;
			right: -24px;
			transform: rotate(45deg);
			z-index: 9;
			background-color: #ffffff;
		}
		.wizard>.steps ul li:first-child a{
			margin-left: 0px !important;
		}
		.wizard>.steps ul{
			margin-left: 14% !important;
			margin-top: 0px !important;
		}
		.wizard>.actions a, .wizard>.actions a:hover, .wizard>.actions a:active{
			background-color: #ffbc00;
		}
		/*steps end*/
		.error{
			color: red;
		}
		.add_color{
			background: transparent;
			color: #FFBC00;
			border: 2px solid #FFBC00;
			font-size: 18px;
		}
		.mt10{
			margin-top: 10px;
		}
		.preview_area{
			padding-top: 20px;
			padding-bottom: 20px;
			border-bottom: 1px solid #ccc;
		}
		.wizard>.actions{
			margin-top: 20px;
		}
		.error{
			color: red;
		}

		@media (max-width: 575.98px) {
			.wizard > .steps > ul > li{
				width: 93% !important;
			}
			.wizard>.steps a, .wizard>.steps a:hover, .wizard>.steps a:active{
				border-left: 2px solid #FFBC00 !important;
				margin-left: 0px !important;
			}
			.wizard>.steps ul{
				margin-left: 0px !important;
			}
		}


		/*
			class .row-preview area 
			old data and new data block 
			sperate design
		*/
		.preview_area {
			border-bottom: 1px solid #ccc !important;
			margin-right: 5px; /* this line for prevent border going to outside of block */
		}
		 
		 
		.block-one {
			border: 1px solid #ccc;
			padding-left: 20px;
			padding-top: 20px;
		}
		.block-two {
			border: 1px solid #ccc;
			padding-left: 20px;
			padding-top: 20px;
		}
		.approve-reject-button-align {
			padding-top: 20px;
		}
	
		.full-block-align {
			margin-left: -170px;
		}

		@media (max-width: 1735px) {
			.full-block-align {
			   margin-left: 0px !important;
		    }	
		}


	</style>

<link rel="stylesheet" type="text/css" href="{{Request::root()}}/bootstrap-tagsinput-latest/dist/bootstrap-tagsinput.css">
@stop


@section('content')


<div class="container">
	<div class="mt20 full-block-align">	
		@php 
		  $oldColordif = [];
		  $oldTypedif = [];
		  $newColordif = [];
		  $newTypedif = [];
		  if (count($oldProductColorData) > 0 ) {
			  foreach($oldProductColorData as $op ) {
				$oldColordif[] = $op->color;
				$oldTypedif[] = $op->type;
			  }				  
		  }
		  if (count($productColor) > 0 ) {
			  foreach($productColor as $np ) {
				$newColordif[] = $np->color;
				$newTypedif[] = $np->type;
			  }				  
		  }


		   
		  //print_r($oldColordif);
		  //print_r($oldTypedif);
		  //echo '=====<br/>';
		  //print_r($newColordif);
		  //print_r($newTypedif);
		  
		  $colorDif = array_diff($oldColordif, $newColordif);
		  $typeDif = array_diff($oldTypedif, $newTypedif);
		@endphp 
		@if($oldProductData != null && $product->no_of_time_added >1)
		<div class="row" style="margin-top: 30px;">
			<div class="col-lg-6 col-md-6 col-sm-12 ">
				<div class="block-one">
				<h2>編集前</h2>			
				
						<div class="row preview_area">
							<div class="col-3">商品名 
							 
							 </div>
							<div class="col-9 product_title">{{$oldProductData->title}}</div>
						</div>
						<div class="row preview_area">
							<div class="col-3">カテゴリ
						
							</div>
							<div class="col-3 product_category">{{$oldProductData->subCategory->category->name}}</div>
							<div class="col-3">サブカテゴリ
						
							</div>
							<div class="col-3 product_subcategory">{{$oldProductData->subCategory->name}}</div>
						</div>
						<div class="row preview_area">
							<div class="col-3">販売金額
						 
							</div>
							<div class="col-9 product_price">{{$oldProductData->price}}</div>
						</div>
						<div class="row preview_area">
							<div class="col-12">商品内容およびセールスポイント
							
							</div>
							<div class="col-12 product_description">{!!nl2br(e($oldProductData->description))!!}</div>
						</div>
						<div class="row preview_area">
							<div class="col-12">商品写真</div>
							<div class="col-12 product_image">
							   @if($oldProductData->image)
								<img width="200" src="{{Request::root().'/uploads/products/'.$oldProductData->image}}">
							   @endif	
							</div>
						</div>
						<!-- <div class="row preview_area">
							<div class="col-3">カラー・サイズ</div>
							<div class="col-9 product_color_size"></div>
						</div> -->
						<div class="row preview_area">
							<div class="col-3">カラー</div>
							<div class="col-9 product_color_preview">
							@if (count($oldProductColorData) > 0)
								@foreach($oldProductColorData as $color)
								<span>{{$color->color}} &nbsp;</span>
								@endforeach
							@endif	
							</div>
						</div>
						<div class="row preview_area">
							<div class="col-3">サイズ</div>
							<div class="col-9 product_size_preview">	
								@if (count($oldProductColorData) > 0)
								@foreach($oldProductColorData as $color)
								<span>{{$color->type}} &nbsp;</span>
								@endforeach
								@endif
							</div>
						</div>
						<div class="row preview_area">
							<div class="col-12">商品詳細（原材料・注意事項など）
							
							</div>
							<div class="col-12 product_details">{!! nl2br(e($oldProductData->explanation)) !!}</div>
						</div>
						<div class="row preview_area">
							<div class="col-3">
							掲載者情報
							</div>
							<div class="col-9 product_company_name">{{ $oldProductData->company_name }}</div>
						</div>
						<div class="row preview_area">
							<div class="col-12">掲載者情報(HPのURL、住所、お問い合わせ先など）							
							</div>
							<div class="col-12 product_company_info">{!! nl2br(e($oldProductData->company_info)) !!}</div>
						</div>
						<div class="row preview_area">
							<div class="col-12">企業写真
						
							</div>
							<div class="col-12 product_company_image">
							@if($oldProductData->company_info_image)
								<img width="200" src="{{Request::root().'/uploads/products/'.$oldProductData->company_info_image}}">
							@endif	
							</div>
						</div>
				</div>
			</div>

			<div class="col-lg-6 col-md-6 col-sm-12">	
			    <div class="block-two">		
				<h2>編集後</h2>
						<div class="row preview_area">
							<div class="col-3">商品名
							@if($oldProductData->title != $product->title)
								<span style="color: #ff0000;">*</span>
							@endif
							</div>
							<div class="col-9 product_title">{{$product->title}}</div>
						</div>
						<div class="row preview_area">
							<div class="col-3">カテゴリ
							@if($oldProductData->subCategory->category->name != $product->subCategory->category->name)
								<span style="color: #ff0000;">*</span>
							@endif
							</div>
							<div class="col-3 product_category">{{$product->subCategory->category->name}}</div>
							<div class="col-3">サブカテゴリ
							@if($oldProductData->subCategory->name != $product->subCategory->name)
								<span style="color: #ff0000;">*</span>
							@endif
							</div>
							<div class="col-3 product_subcategory">{{$product->subCategory->name}}</div>
						</div>
						<div class="row preview_area">
							<div class="col-3">販売金額
							@if($oldProductData->price != $product->price)
								<span style="color: #ff0000;">*</span>
							@endif
							</div>
							<div class="col-9 product_price">{{$product->price}}</div>
						</div>
						<div class="row preview_area">
							<div class="col-12">商品内容およびセールスポイント
							
							@if($oldProductData->description != $product->description)
								<span style="color: #ff0000;">*</span>
							@endif
							</div>
							<div class="col-12 product_description">{!!nl2br(e($product->description))!!}</div>
						</div>
						<div class="row preview_area">
							<div class="col-12">商品写真</div>
							<div class="col-12 product_image">
							@if($product->image)
								<img width="200" src="{{Request::root().'/uploads/products/'.$product->image}}">
							@endif	
							</div>
						</div>
						<!-- <div class="row preview_area">
							<div class="col-3">カラー・サイズ</div>
							<div class="col-9 product_color_size"></div>
						</div> -->
						<div class="row preview_area">
							<div class="col-3">カラー
								@if(count($colorDif) > 0  || count($oldColordif) != count($newColordif) )
								<span style="color: #ff0000;">*</span>
								@endif
							</div>
							<div class="col-9 product_color_preview">
								@foreach($productColor as $color)
								<span>{{$color->color}} &nbsp;</span>
								@endforeach
							</div>
						</div>
						<div class="row preview_area">
							<div class="col-3">サイズ 
								@if (count($typeDif) > 0 || count($newTypedif) != count($oldTypedif)) 
								<span style="color: #ff0000;">*</span>
								@endif
							</div>
							<div class="col-9 product_size_preview">																
								@foreach($productColor as $color)
								<span>{{$color->type}} &nbsp;</span>
								@endforeach
							</div>
						</div>
						<div class="row preview_area">
							<div class="col-12">商品詳細（原材料・注意事項など）
							@if($oldProductData->explanation != $product->explanation)
								<span style="color: #ff0000;">*</span>
							@endif
							</div>
							<div class="col-12 product_details">{!! nl2br(e($product->explanation)) !!}</div>
						</div>
						<div class="row preview_area">
							<div class="col-3">掲載者情報
							@if($oldProductData->company_name != $product->company_name)
								<span style="color: #ff0000;">*</span>
							@endif
							</div>
							<div class="col-9 product_company_name">{{ $product->company_name }}</div>
						</div>
						<div class="row preview_area">
							<div class="col-12">掲載者情報(HPのURL、住所、お問い合わせ先など）
							@if($oldProductData->company_info != $product->company_info)
								<span style="color: #ff0000;">*</span>
							@endif
							</div>
							<div class="col-12 product_company_info">{!! nl2br(e($product->company_info)) !!}</div>
						</div>
						<div class="row preview_area">
							<div class="col-12">企業写真
							@if($oldProductData->company_info_image != $product->company_info_image)
								<span style="color: #ff0000;">*</span>
							@endif
							</div>
							<div class="col-12 product_company_image">
							@if($product->company_info_image)
								<img width="200" src="{{Request::root().'/uploads/products/'.$product->company_info_image}}">
							@endif	
							</div>
						</div>

				</div>		
			</div>
		</div>	
		@else 
		<div class="row" style="margin-top: 30px;">
			<div class="col-lg-12 col-md-12 col-sm-12">			
				
						<div class="row preview_area">
							<div class="col-3">商品名
							
							</div>
							<div class="col-9 product_title">{{$product->title}}</div>
						</div>
						<div class="row preview_area">
							<div class="col-3">カテゴリ
							
							</div>
							<div class="col-3 product_category">{{$product->subCategory->category->name}}</div>
							<div class="col-3">サブカテゴリ
							 
							</div>
							<div class="col-3 product_subcategory">{{$product->subCategory->name}}</div>
						</div>
						<div class="row preview_area">
							<div class="col-3">販売金額
							 
							</div>
							<div class="col-9 product_price">{{$product->price}}</div>
						</div>
						<div class="row preview_area">
							<div class="col-12">商品内容およびセールスポイント
							
							 
							</div>
							<div class="col-12 product_description">{!!nl2br(e($product->description))!!}</div>
						</div>
						<div class="row preview_area">
							<div class="col-12">商品写真</div>
							<div class="col-12 product_image">
							@if($product->image)
								<img width="200" src="{{Request::root().'/uploads/products/'.$product->image}}">
							@endif	
							</div>
						</div>
						<!-- <div class="row preview_area">
							<div class="col-3">カラー・サイズ</div>
							<div class="col-9 product_color_size"></div>
						</div> -->
						<div class="row preview_area">
							<div class="col-3">カラー</div>
							<div class="col-9 product_color_preview">
								@foreach($productColor as $color)
								<span>{{$color->color}} &nbsp;</span>
								@endforeach
							</div>
						</div>
						<div class="row preview_area">
							<div class="col-3">サイズ</div>
							<div class="col-9 product_size_preview">	
								@foreach($productColor as $color)
								<span>{{$color->type}} &nbsp;</span>
								@endforeach
							</div>
						</div>
						<div class="row preview_area">
							<div class="col-12">商品詳細（原材料・注意事項など）
							 
							</div>
							<div class="col-12 product_details">{!! nl2br(e($product->explanation)) !!}</div>
						</div>
						<div class="row preview_area">
							<div class="col-3">掲載者情報
							 
							</div>
							<div class="col-9 product_company_name">{{ $product->company_name }}</div>
						</div>
						<div class="row preview_area">
							<div class="col-12">掲載者情報(HPのURL、住所、お問い合わせ先など）
							 
							</div>
							<div class="col-12 product_company_info">{!! nl2br(e($product->company_info)) !!}</div>
						</div>
						<div class="row preview_area">
							<div class="col-12">企業写真
							 
							</div>
							<div class="col-12 product_company_image">
							@if($product->company_info_image)
								<img width="200" src="{{Request::root().'/uploads/products/'.$product->company_info_image}}">
							@endif	
							</div>
						</div>
			</div>



		</div>	
		@endif

		@if ($product->status == 0 )
		<div class="row" >
			<div class="col-md-12 col-lg-12 col-xs-12">
				<div class="pull-right approve-reject-button-align">
					<a href="{{ url('/admin/product/status-change/'.$product->id .'/1'  ) }}" class="btn btn-sm btn-success inline">承認する</a> 
					<a href="{{ url('/admin/product/status-change/'. $product->id .'/4') }}" class="btn btn-sm btn-danger inline">拒否する</a> 
				</div>
			</div>
		</div>
		@endif
	</div>
</div>
@stop

@section('custom_js')
@stop