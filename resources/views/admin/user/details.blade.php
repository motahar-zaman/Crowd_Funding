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
	</style>

<link rel="stylesheet" type="text/css" href="{{Request::root()}}/bootstrap-tagsinput-latest/dist/bootstrap-tagsinput.css">
@stop


@section('content')


<div class="container-fluid pl-4">
	<div class="mt20">
		<div class="row" style="margin-top: 30px;">
			<div class="col-12">
				<div class="row preview_area">
					<div class="col-3">氏名</div>
					<div class="col-9 product_title">{{$userDetails->first_name}} {{$userDetails->last_name}}</div>
				</div>
				<div class="row preview_area">
					<div class="col-3">フリガナ</div>
					<div class="col-3 product_category">{{$userDetails->profile->phonetic}} {{$userDetails->profile->phonetic2}}</div>
				</div>
				<div class="row preview_area">
					<div class="col-3">生年月日</div>
					<div class="col-9 product_price">{{$userDetails->profile->dob}}</div>
				</div>
				<div class="row preview_area">
					<div class="col-3">性別</div>
					@if($userDetails->profile->sex == 1)
						<div class="col-9 product_description">男性</div>
					@elseif($userDetails->profile->sex == 1)
						<div class="col-9 product_description">女性</div>
					@elseif($userDetails->profile->sex == 1)
						<div class="col-9 product_description">末記入</div>
					@endif
				</div>
				<div class="row preview_area">
					<div class="col-3">電話番号</div>
					<div class="col-9 product_image">
                        <div class="col-12 pl-0 product_description">{{$userDetails->profile->phone_no}}</div>
					</div>
				</div>
				<!-- <div class="row preview_area">
					<div class="col-3">カラー・サイズ</div>
					<div class="col-9 product_color_size"></div>
				</div> -->
				<div class="row preview_area">
					<div class="col-3">住所</div>
					<div class="col-9 product_color_preview">
                        <div class="col-12 pl-0">{{$userDetails->profile->postal_code}}</div>
                        <div class="col-12 pl-0"> {{$userDetails->profile->division}} </div>
                        <div class="col-12 pl-0">{{$userDetails->profile->municipility}} </div>
                        <div class="col-12 pl-0">{{$userDetails->profile->address}} </div>
                        <div class="col-12 pl-0">{{$userDetails->profile->room_no}} </div>
                    </div>
				</div>
				<div class="row preview_area">
					<div class="col-3">URL</div>
					<div class="col-9 product_color_preview">{{$userDetails->profile->url}}</div>
				</div>
				<div class="row preview_area">
					<div class="col-12">コメント</div>
					<div class="col-12 product_details">{!! nl2br(e($userDetails->profile->profile)) !!}</div>
				</div>
				<div class="row preview_area">
					<div class="col-3">アイコン画像</div>
					<div class="col-9 product_company_name"><img width="200" src="{{Request::root().'/uploads/'.$userDetails->pic}}"></div>
				</div>
			</div>
		</div>		
	</div>
</div>


@stop

@section('custom_js')
@stop