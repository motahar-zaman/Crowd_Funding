@extends('main_layout')
@section('title') 
商品詳細 | Crofun
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
</style>
@stop


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

                 
                        
                        <div class="">
                            <div class="row" style=>
                                <div class="col-12">
                                    <div class="row ">
                                        <div class="col-9"></div>
                                        <div class="col-3">
                                             <div class="row ">
                                                 @if($product->status !=0)
                                                    <div class="col-md-12 p-0">
                                                        <div class="div-radius1 text-right">
                                                            <a href="{{ route('user-product-edit', $product->id) }}" class="p-2 bg-dark text-white btn btn-secondary font-weight-bold" style="padding-left: 30px !important;padding-right: 30px !important;">編集する</a>
                                                        </div>
                                                    </div>
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
                                        <div class="col-3">商品名</div>
                                        <div class="col-9 product_title">{{$product->title}}</div>
                                    </div>
                                    <div class="row preview_area">
                                        <div class="col-3">カテゴリ</div>
                                        <div class="col-3 product_category">{{$product->subCategory->category->name}}</div>
                                        <div class="col-3">サブカテゴリ</div>
                                        <div class="col-3 product_subcategory">{{$product->subCategory->name}}</div>
                                    </div>
                                    <div class="row preview_area">
                                        <div class="col-3">販売金額</div>
                                        <div class="col-9 product_price">{!!number_format($product->price)!!}</div>
                                    </div>
                                    <div class="row preview_area">
                                        <div class="col-12">商品内容およびセールスポイント</div>
                                        {{--<div class="col-12 product_description">{!!nl2br(e($product->description))!!}</div>--}}
                                        <div class="col-12 product_description">{{$product->description}}</div>
                                    </div>
                                    <div class="row preview_area">
                                        <div class="col-12">商品写真</div>
                                        <div class="col-12 product_image">
                                            <img width="200" src="{{Request::root().'/uploads/products/'.$product->image}}">
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
                                        <div class="col-12">商品詳細（原材料・注意事項など）</div>
                                        <div class="col-12 product_details">{!! nl2br(e($product->explanation)) !!}</div>
                                    </div>
                                    <div class="row preview_area">
                                        <div class="col-3">掲載者情報</div>
                                        <div class="col-9 product_company_name">{{ $product->company_name }}</div>
                                    </div>
                                    <div class="row preview_area">
                                        <div class="col-12">掲載者情報(HPのURL、住所、お問い合わせ先など）</div>
                                        <div class="col-12 product_company_info">{!! nl2br(e($product->company_info)) !!}</div>
                                    </div>
                                    <div class="row preview_area">
                                        <div class="col-12">企業写真</div>
                                        <div class="col-12 product_company_image">
                                            <img width="200" src="{{Request::root().'/uploads/products/'.$product->company_info_image}}">
                                        </div>
                                    </div>
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
	$('.messageModal').on('click',function(){
		$('#edit-message').modal('show');
	});
</script>
@stop
