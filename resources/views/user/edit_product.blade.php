@extends('main_layout')
@section('title') 
商品編集 | Crofun
@stop
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

		
		@media (max-width: 1370px) {
			.first_tabs ul li a {
				color: #333333;
				text-decoration: none;
				font-size: 15px;
				font-weight: 500;
				font-weight: bold;
				padding-top: 10px;
				padding-bottom: 10px;
				display: inline-block;
			}
		}

		@media (max-width: 1295px) {
			.top_menu li a {
				color: #333333;
				text-decoration: none;
				font-size: 17px !important;
				font-weight: 500;
				margin-left: 20px;
				padding-bottom: 5px;
				font-family: w3;
			}
			.first_tabs ul li a {
				color: #333333;
				text-decoration: none;
				font-size: 13px;
				font-weight: 500;
				font-weight: bold;
				padding-top: 10px;
				padding-bottom: 10px;
				display: inline-block;
			}
		}
		
		@media (max-width: 1170px) {
			.top_menu li a {
				color: #333333;
				text-decoration: none;
				font-size: 15px !important;
				font-weight: 500;
				margin-left: 20px;
				padding-bottom: 5px;
				font-family: w3;
			}
			.first_tabs ul li a {
				color: #333333;
				text-decoration: none;
				font-size: 11px;
				font-weight: 500;
				font-weight: bold;
				padding-top: 10px;
				padding-bottom: 10px;
				display: inline-block;
			}
		}
		@media (max-width: 1080px) {
			.top_menu li a {
				color: #333333;
				text-decoration: none;
				font-size: 12px !important;
				font-weight: 500;
				margin-left: 20px;
				padding-bottom: 5px;
				font-family: w3;
			}
			.first_tabs ul li a {
				color: #333333;
				text-decoration: none;
				font-size: 9px;
				font-weight: 500;
				font-weight: bold;
				padding-top: 10px;
				padding-bottom: 10px;
				display: inline-block;
			}
		}
		@media (max-width: 930px) {
			.top_menu li a {
				color: #333333;
				text-decoration: none;
				font-size: 11px !important;
				font-weight: 500;
				margin-left: 20px;
				padding-bottom: 5px;
				font-family: w3;
			}
			.first_tabs ul li a {
				color: #333333;
				text-decoration: none;
				font-size: 8px;
				font-weight: 500;
				font-weight: bold;
				padding-top: 10px;
				padding-bottom: 10px;
				display: inline-block;
			}
		}
		@media (max-width: 870px) {
			.top_menu li a {
				color: #333333;
				text-decoration: none;
				font-size: 10px !important;
				font-weight: 500;
				margin-left: 20px;
				padding-bottom: 5px;
				font-family: w3;
			}
			.first_tabs ul li a {
				color: #333333;
				text-decoration: none;
				font-size: 7px;
				font-weight: 500;
				font-weight: bold;
				padding-top: 10px;
				padding-bottom: 10px;
				display: inline-block;
			}
		}
		@media (max-width: 870px) {
			.top_menu li a {
				color: #333333;
				text-decoration: none;
				font-size: 9px !important;
				font-weight: 500;
				margin-left: 20px;
				padding-bottom: 5px;
				font-family: w3;
			}
			.first_tabs ul li a {
				color: #333333;
				text-decoration: none;
				font-size: 6px;
				font-weight: 500;
				font-weight: bold;
				padding-top: 10px;
				padding-bottom: 10px;
				display: inline-block;
			}
		}


		@media (max-width: 1300px) {
			.wizard>.steps .stepinfo{
				font-size: 14px;
				display: block;
			}
			.wizard>.steps .disabled a:after, .wizard>.steps .done a:after{
				content: '';
				border-top: 2px solid #FFBC00;
				border-right: 2px solid #FFBC00;
				height: 43px;
				width: 45px;
				position: absolute;
				top: 8.9px;
				right: -24px;
				transform: rotate(45deg);
				z-index: 9;
				background-color: #ffffff;
			}
			.wizard>.steps .current a:after {
				content: '';
				background: #FFBC00;
				height: 43px;
				width: 45px;
				position: absolute;
				top: 10px;
				right: -24px;
				transform: rotate(45deg);
				z-index: 9;
			}
		}
		@media (max-width: 1200px) {
			.wizard>.steps .stepinfo{
				font-size: 10px;
				display: block;
			}
			.wizard>.steps .disabled a:after, .wizard>.steps .done a:after{
				content: '';
				border-top: 2px solid #FFBC00;
				border-right: 2px solid #FFBC00;
				height: 41px;
				width: 41px;
				position: absolute;
				top: 6.9px;
				right: -20px;
				transform: rotate(48deg);
				z-index: 9;
				background-color: #ffffff;
			}
			.wizard>.steps .current a:after {
				content: '';
				background: #FFBC00;
				height: 41px;
				width: 41px;
				position: absolute;
				top: 7px;
				right: -20px;
				transform: rotate(48deg);
				z-index: 9;
			}
		}
		@media (max-width: 1100px) {
			.wizard>.steps .stepinfo{
				font-size: 10px;
				display: block;
			}
			.wizard>.steps .disabled a:after, .wizard>.steps .done a:after{
				content: '';
				border-top: 2px solid #FFBC00;
				border-right: 2px solid #FFBC00;
				height: 36px;
				width: 36px;
				position: absolute;
				top: 5.9px;
				right: -19px;
				transform: rotate(45deg);
				z-index: 9;
				background-color: #ffffff;
			}
			.wizard>.steps .current a:after {
				content: '';
				background: #FFBC00;
				height: 36px;
				width: 36px;
				position: absolute;
				top: 6px;
				right: -19px;
				transform: rotate(45deg);
				z-index: 9;
			}
			.wizard>.steps .stepcount {
				font-size: 18px;
				font-weight: bold;
			}
			.wizard>.steps .steptext {
				font-size: 16px;
				text-transform: uppercase;
			}
			.page_title_product_register {
				padding-top: 10px;
				padding-bottom: 10px;
				font-size: 23px;
			}
			
		}
		@media (max-width: 1000px) {
			.page_title_product_register {
				padding-top: 10px;
				padding-bottom: 10px;
				font-size: 22px;
			}
			.wizard>.steps .stepinfo{
				font-size: 8px;
				display: block;
			}
			.wizard>.steps .disabled a:after, .wizard>.steps .done a:after{
				content: '';
				border-top: 2px solid #FFBC00;
				border-right: 2px solid #FFBC00;
				height: 32px;
				width: 32px;
				position: absolute;
				top: 4.9px;
				right: -16px;
				transform: rotate(45deg);
				z-index: 9;
				background-color: #ffffff;
			}
			.wizard>.steps .current a:after {
				content: '';
				background: #FFBC00;
				height: 32px;
				width: 32px;
				position: absolute;
				top: 5px;
				right: -16px;
				transform: rotate(45deg);
				z-index: 9;
			}
			.wizard>.steps .stepcount {
				font-size: 16px;
				font-weight: bold;
			}
			.wizard>.steps .steptext {
				font-size: 14px;
				text-transform: uppercase;
			}
			
		}
		@media (max-width: 900px) {
			.page_title_product_register {
				padding-top: 10px;
				padding-bottom: 10px;
				font-size: 21px;
			}
			.wizard>.steps .stepinfo{
				font-size: 6px;
				display: block;
			}
			.wizard>.steps .disabled a:after, .wizard>.steps .done a:after{
				content: '';
				border-top: 2px solid #FFBC00;
				border-right: 2px solid #FFBC00;
				height: 30px;
				width: 30px;
				position: absolute;
				top: 4.9px;
				right: -15px;
				transform: rotate(45deg);
				z-index: 9;
				background-color: #ffffff;
			}
			.wizard>.steps .current a:after {
				content: '';
				background: #FFBC00;
				height: 30px;
				width: 30px;
				position: absolute;
				top: 7px;
				right: -18px;
				transform: rotate(45deg);
				z-index: 9;
			}
			.wizard>.steps .stepcount {
				font-size: 16px;
				font-weight: bold;
			}
			.wizard>.steps .steptext {
				font-size: 14px;
				text-transform: uppercase;
			}
			.wizard>.steps .current a, .wizard>.steps .current a:hover, .wizard>.steps .current a:active{
				background-color: #FFBC00;
				padding-left: 37px;
				margin-left: -8px;
			}
			.wizard>.steps .disabled a, .wizard>.steps .disabled a:hover, .wizard>.steps .disabled a:active, .wizard>.steps .done a, .wizard>.steps .done a:hover, .wizard>.steps .done a:active{
				margin-left: -8px;
				padding-left: 34px;
				border: 2px solid #FFBC00;
				background-color: #ffffff;
				padding-top: 3px;
				padding-bottom: 3px;
				position: relative;
				border-right: none;
				/* border-left: none; */
			}
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
	</style>

	<link rel="stylesheet" type="text/css" href="{{Request::root()}}/bootstrap-tagsinput-latest/dist/bootstrap-tagsinput.css">
@stop


@section('ecommerce')

@stop

@section('content')
@include('user.layouts.tab')


<div class="container" id="new-project">


<div class="mt20">
	<div class="row">
		<div class="col-md-8 offset-md-2">

			<h1 class="text-center page_title_product_register">基本情報入力</h1>

			<form id="example-form" action="" class="mt20" method="post" enctype="multipart/form-data">

				{{ csrf_field() }}

				<div class="mt20">
					<h3 class="step_title_area">
							<span class="steptext">Step</span><span class="stepcount">1</span>
							<span class="stepinfo">基本情報入力</span>
						</h3>
					<section>


						<div class="form-group">
							<label for="">商品名 <span class="text-danger" id="product_title_message"></span> </label>
							<input type="text" id="p_title" class="form-control required p_title " placeholder="" maxlength="21" value="{{ $product->title }}"name="title">
						</div>

						<div class="row">

							<div class="form-group col">
								<label for="">カテゴリ(分類)</label>
								<select class="form-control required category" name="category">
									<option value="0">Select Category</option>
									<?php foreach($category as $c){?>
										<option value="{{$c->id}}" {{$product->subCategory->category->id == $c->id ? 'selected' : ''}}>{{$c->name}}</option>
									<?php }?>
								</select>
							</div>
							<div class="form-group col">
								<label for="">サブカテゴリー</label>
								<select class="form-control required subcategory" name="subcategory">
									<option value="{{$product->subCategory->id}}">{{$product->subCategory->name}}</option>
								</select>
							</div>

						</div>

						<div class="form-group">
							<label for="">販売金額 (販売金額 ＝ 商品金額＋送料＋消費税)</label>
							<input type="number" class="form-control required p_price" placeholder="" value="{{ $product->price }}" name="price">
						</div>


						<div class="form-group">
							<label for="">商品内容およびセールスポイント <span class="text-danger" id="p_description_message"></span> </label>
							<textarea id="p_description" class="form-control required p_description" maxlength="201" rows="6" cols="60" name="description">{{ $product->description }}</textarea>
						</div>

						<div class="form-group">
							<label for="">商品写真 ※商品の種類が複数ある場合は一枚の写真にしてアップロードしてください、</label>
							<input type="file" class="form-control  product_image" placeholder="" name="image">
						</div>



						<div class="form-group">
							<label for="">カラー・サイズ選択</label>
							<div class="row">

								<div class="col-3">
								 @foreach ($product->color as $color)
								 {{-- <select class="form-control product_color mt-2" name="color[]">
										<option value="" {{ $color->color == '' ? 'selected':'' }} >色</option>
										<option value="緑" {{ $color->color == '緑' ? 'selected':'' }} >緑</option>
										<option value="黄" {{ $color->color == '黄' ? 'selected':'' }} >黄</option>
										<option value="青白い" {{ $color->color == '青白い' ? 'selected':'' }} >青白い</option>
										<option value="ピンク" {{ $color->color == 'ピンク' ? 'selected':'' }} >ピンク</option>
										<option value="赤" {{ $color->color == '赤' ? 'selected':'' }} >赤</option>
										<option value="青" {{ $color->color == '青' ? 'selected':'' }} >青</option>
									</select> --}}
									<input type="text" class="form-control product_color" name="color[]" value="{{$color->color}}" placeholder="色">
								 @endforeach
								</div>
								<div class="col-3">
									@foreach ($product->color as $type)
									{{-- <select class="form-control product_type mt-2" name="type[]">
										 <option value="" {{ $type->type == '' ? 'selected':'' }} >サイズ </option>
										<option value="S" {{ $type->type == "S" ? 'selected':'' }} >S </option>
										<option value="M" {{ $type->type == "M" ? 'selected':'' }} >M </option>
										<option value="L" {{ $type->type == "L" ? 'selected':'' }} >L </option>
										<option value="XL" {{ $type->type == "XL" ? 'selected':'' }} >XL </option>
										<option value="XXL" {{ $type->type == "XXL" ? 'selected':'' }} >XXL </option>
									</select> --}}
									<input type="text" class="form-control product_type" name="type[]" value="{{$type->type}}" placeholder="サイズ">
									@endforeach

								</div>
							</div>

							<div class="color_option"></div>

							<div class="text-left mt20">
								<button class="btn btn-warning add_color" type="button"><i class="fa fa-plus-circle"></i> カラー・サイズを追加する</button>
							</div>

						</div>

						<div class="form-group">
							<label for="">商品詳細(原材料・注意事項など) <span class="text-danger" id="p_details_message"></span> </label>
							<textarea id="p_details" class="form-control required p_details" maxlength="2001" rows="8" cols="80" name="explanation">{{ $product->explanation }}</textarea>
						</div>
						<!-- <div class="form-group">
							<label for="">イメージ画像をアップロードする ( 複数枚可にする )</label>
							<input type="file" class="form-control" name="explanation_image">
						</div> -->


						<div class="form-group">
							<label for="">掲載者名 (個人・団体名を入力してください。) <span class="text-danger" id="p_company_name_message"></span> </label>
							<input id="p_company_name" type="text" class="form-control required company_name" maxlength="21" name="company_name" value="{{ $product->company_name }}">
						</div>


						<div class="form-group">
							<label for="">掲載者情報(HPのURL、住所、お問い合わせ先など）<span class="text-danger" id="p_company_info_message"></span> </label>
							<textarea id="p_company_info" class="form-control required p_company_info " rows="6" cols="60" maxlength="201" name="company_info">{{ $product->company_info }}</textarea>
						</div>
						<div class="form-group">
							<!-- <label for="">イメージ画像をアップロードする ( 複数枚可にする )</label> -->
							<input type="file" class="form-control company_info_image" name="company_info_image">
						</div>

					</section>

					<h3 class="step_title_area">
						<span class="steptext">Step</span><span class="stepcount">2</span>
						<span class="stepinfo">情報確認</span>
					</h3>
					<section>
						<div class="row" style="margin-top: 30px;">
							<div class="col-12">
								<div class="row preview_area">
									<div class="col-3">商品名</div>
									<div class="col-9 product_title"></div>
								</div>
								<div class="row preview_area">
									<div class="col-3">カテゴリ</div>
									<div class="col-3 product_category"></div>
									<div class="col-3">サブカテゴリ</div>
									<div class="col-3 product_subcategory"></div>
								</div>
								<div class="row preview_area">
									<div class="col-3">販売金額</div>
									<div class="col-9 product_price"></div>
								</div>
								<div class="row preview_area">
									<div class="col-12">商品内容およびセールスポイント</div>
									<div class="col-12 product_description"></div>
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
			        				<div class="col-9 product_color_preview"></div>
			        			</div>
								<div class="row preview_area">
			        				<div class="col-3">サイズ</div>
			        				<div class="col-9 product_size_preview"></div>
			        			</div>
								<div class="row preview_area">
									<div class="col-12">商品詳細（原材料・注意事項など）</div>
									<div class="col-12 product_details"></div>
								</div>
								<div class="row preview_area">
									<div class="col-3">掲載者情報</div>
									<div class="col-9 product_company_name"></div>
								</div>
								<div class="row preview_area">
									<div class="col-12">掲載者情報(HPのURL、住所、お問い合わせ先など）</div>
									<div class="col-12 product_company_info"></div>
								</div>
								<div class="row preview_area">
									<div class="col-12">企業写真</div>
									<div class="col-12 product_company_image">
										<img width="200" src="{{Request::root().'/uploads/products/'.$product->company_info_image}}">
									</div>
								</div>
							</div>
						</div>
					</section>

					<h3 class="step_title_area">
						<span class="steptext">Step</span><span class="stepcount">3</span>
						<span class="stepinfo">完了</span>
					</h3>
					<section>
						<h4 class="text-center mt20" style="color:#FFBC00;">
							商品登録申請が完了しました。
						</h4>
						<h4 class="text-center mt20">
							商品の登録ありがとうございました。
						</h4>
						<h4 class="text-center mt20">
							<a href="{{route('user-product-list')}}" class="btn btn-md text-white" style="background-color:#C6C6C6;">< 戻る</a>

						</h4>
					</section>
				</div>
			</form>


		</div>
	</div>

</div>

</div>



<div class="color_container hide">
	<div class="row mt10">
		<div class="col-3">
			{{-- <select class="form-control product_color" name="color[]">
				<option value="">色</option>
				<option value="緑">緑</option>
				<option value="黄">黄</option>
				<option value="青白い">青白い</option>
				<option value="ピンク">ピンク</option>
				<option value="赤">赤</option>
				<option value="青">青</option>
			</select> --}}
			<input type="text"class="form-control product_color" name="color[]" placeholder="色">
		</div>
		<div class="col-3">
			{{-- <select class="form-control product_type" name="type[]">
				<option value="">サイズ</option>
				<option value="S">S</option>
				<option value="M">M</option>
				<option value="L">L</option>
				<option value="XL">XL</option>
				<option value="XXL">XXL</option>
			</select> --}}
			<input type="text" class="form-control product_type" name="type[]" placeholder="サイズ">
		</div>
	</div>
</div>


@include('user.layouts.submit_modal_product');

@stop

@section('custom_js')

	<script src="{{Request::root()}}/ckeditor/ckeditor.js"></script>
	<script type="text/javascript" src="{{Request::root()}}/bootstrap-tagsinput-latest/dist/bootstrap-tagsinput.js"></script>

	<script type="text/javascript" src="{{Request::root()}}/js/jquery.validate.min.js"></script>
	

	<script type="text/javascript">


		var form = $("#example-form");

		form.validate({
			errorPlacement: function errorPlacement(error, element) { element.before(error); },
		});

		form.children("div").steps({
			headerTag: "h3",
			bodyTag: "section",
			transitionEffect: "slideLeft",
			// startIndex: 1,
			startIndex: {{$finish?2:0}},
			showFinishButtonAlways: false,


			/* Labels */
			labels: {
				cancel: "Cancel?",
				current: "current step:",
				pagination: "Pagination",
				finish: "完了!!",
				next: "次へ >",
				previous: "< 前へ",
				loading: "Loading ..."
			},

			onInit: function(event, currentIndex, newIndex){
				if(currentIndex == 2){
					$('.actions > ul > li:nth-child(1)').attr('style', 'display:none;');
					$('.actions > ul > li:nth-child(2)').attr('style', 'display:none;');
					$('.actions > ul > li:nth-child(3)').attr('style', 'display:none;');
				}
				$('.steps .current').prevAll().removeClass('done').addClass('disabled');
			},
			onStepChanging: function (event, currentIndex, newIndex)
			{
					var check = 0;
					if (currentIndex == 0) {

						// if ($('.length20').val().length > 20) {
						// 	$('#length20').html('Maximum limit 20 charactar ');
						// 	check = 1;
						// }else {
						// 	$('#length20').html('');
						// 	// check = 0;
						// }

						// if ($('.length20_2').val().length > 20) {
						// 	$('#length20_2').html('Maximum limit 20 charactar ');
						// 	check = 1;
						// }else {
						// 	$('#length20_2').html('');
						// 	// check = 0;
						// }

						// if ($('.length200_1').val().length > 200) {
						// 	$('#length200_1').html('Maximum limit 200 charactar ');
						// 	check = 1;
						// }else {
						// 	$('#length200_1').html('');
						// 	// check = 0;
						// }

						// if ($('.length200_2').val().length > 200) {
						// 	$('#length200_2').html('Maximum limit 200 charactar ');
						// 	check = 1;
						// }else {
						// 	$('#length200_2').html('');
						// 	// check = 0;
						// }

						// if ($('.length200_3').val().length > 200) {
						// 	$('#length200_3').html('Maximum limit 200 charactar ');
						// 	check = 1;
						// }else {
						// 	$('#length200_3').html('');
						// 	// check = 0;
						// }




						// if (check == 1) {
						// 	return false;
						// }
					}
				form.validate().settings.ignore = ":disabled,:hidden";
				return form.valid();
				// return true;
			},
			onStepChanged: function (event, currentIndex, newIndex)
			{
				if(currentIndex == 1){
					$('.actions > ul > li:last-child').attr('style', '');
					$('.actions > ul > li:nth-child(2)').attr('style', 'display:none;');



					var colors = '';
					var sizes = '';
					$('.product_color').each(function(index, value){
						console.log($(this).val());
						console.log(value);
						if($(this).val() != ''){
							if(colors != '') colors += ' , ';
							colors += $(this).val();
						}
						
					});
					$('.product_type').each(function(index, value){
						if($(this).val() != ''){
							if(sizes != '') sizes += ' , ';
							sizes += $(this).val();
						}
					});
					$('.product_color_preview').html(colors);
					$('.product_size_preview').html(sizes);


					$('.product_title').html($('.p_title').val());

					var category_data = $('.category').children('option:selected').html();
					$('.product_category').html(category_data);

					var subcategory_data = $('.subcategory').children('option:selected').html();
					// console.log(subcategory_data);
					$('.product_subcategory').html(subcategory_data);

					$('.product_price').html($('.p_price').val());

					$('.product_description').html($('.p_description').val());

					var product_details=[]
					$('.p_details').val().split('\n').map(function(items){
						product_details.push('<span>'+items+'</span>'+'</br>')
					})
					$('.product_details').html(product_details);

					$('.product_company_name').html($('.company_name').val());

					var product_company_info = []
					$('.p_company_info').val().split('\n').map(function(item){
						product_company_info.push('<span>'+item+'</span>'+'</br>')
					})
					console.log(product_company_info);
					$('.product_company_info').html(product_company_info);
				}
			},
			onFinishing: function (event, currentIndex)
			{
				$('#submit-message').modal('show');
				form.validate().settings.ignore = ":disabled,:hidden";
				return form.valid();
				// return true;
			},
			onFinished: function (event, currentIndex)
			{
				$(document).ready(function(){
					$('#submit_button_product').on('click', function(e){
						$(this).attr('disabled','disabled');
						form.submit()
					});
    			});
			}
		});

		$(function(){
			// CKEDITOR.config.extraPlugins = 'imageuploader';
			// CKEDITOR.config.filebrowserImageBrowseUrl = '{{Request::root()}}/ckeditor/plugins/imageuploader/imgbrowser.php';

			$('.category').on('change', function(){
				console.log('working');
				var category = $(this).val();
				$.ajax({
				url: "{{Request::root()}}/user/sub-category/"+category,
				context: document.body
				}).done(function(response) {
				$('.subcategory').html(response);
				});
			});

			$('.add_color').on('click', function(){
				var html = $('.color_container').html();
				$('.color_option').before(html);
			});

		});


		$('.product_image').change(function(){
			if (this.files && this.files[0]) {
				var reader = new FileReader();
				reader.onload = function(e) {
					var imgcontent = '<img width="200" src="'+e.target.result+'">';
					$('.product_image').html('<img width="200" src="'+e.target.result+'">');
				}
				reader.readAsDataURL(this.files[0]);
			}
		});
		
		$('.company_info_image').change(function(){
			if (this.files && this.files[0]) {
				var reader = new FileReader();
				reader.onload = function(e) {
					var imgcontent = '<img width="200" src="'+e.target.result+'">';
					$('.product_company_image').html('<img width="200" src="'+e.target.result+'">');
				}
				reader.readAsDataURL(this.files[0]);
			}
		});

	</script>

<script type="text/javascript">
	$(document).ready(function () {
		$('#p_title').keyup(function(e){
			if ($(this).val().length > 20) {
				$('#product_title_message').html('20文字以内でご記入ください');
				e.preventDefault();
				return false;
			}else{
				$('#product_title_message').html('');
			}
		})

		$('#p_description').keyup(function(e){
			if ($(this).val().length > 200) {
				$('#p_description_message').html('200文字以内でご記入ください');
				e.preventDefault();
				return false;
			}else{
				$('#p_description_message').html('');
			}
		})

		$('#p_details').keyup(function(e){
			if ($(this).val().length > 2000) {
				$('#p_details_message').html('2000文字以内でご記入ください');
				e.preventDefault();
				return false;
			}else{
				$('#p_details_message').html('');
			}
		})
		$('#p_company_name').keyup(function(e){
			console.log($(this).val().length)
			if ($(this).val().length > 20) {
				$('#p_company_name_message').html('20文字以内でご記入ください');
				e.preventDefault();
				return false;
			}else{
				$('#p_company_name_message').html('');
			}
		})
		$('#p_company_info').keyup(function(e){
			console.log($(this).val().length)
			if ($(this).val().length > 200) {
				$('#p_company_info_message').html('200文字以内でご記入ください');
				e.preventDefault();
				return false;
			}else{
				$('#p_company_info_message').html('');
			}
		})
	});
</script>

@stop
