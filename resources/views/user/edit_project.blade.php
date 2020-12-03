@extends('main_layout')
@section('title') 
プロジェクト追加 | Crofun
@stop
@section('custom_css')
	<style type="text/css">
		.wizard > .steps > ul > li {
		    width: 27.3%;
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
		.preview_area{
			padding-top: 20px;
			padding-bottom: 20px;
			border-bottom: 1px solid #ccc;
		}
		.actions{
			text-align: center !important;
		}
		.page_title_product_register{
			padding-top: 10px;
			padding-bottom: 10px;
			font-size: 25px;
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
			background-color: #039aff;
			padding-left: 42px;
			margin-left: -8px;
		}
		.wizard>.steps .current a:after{
			content: '';
		    background: #039aff;
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
			border: 2px solid #039aff;
			background-color: #ffffff;
			padding-top: 3px;
    		padding-bottom: 3px;
    		position: relative;
    		border-right: none;
    		/* border-left: none; */
		}
		.wizard>.steps .done a, .wizard>.steps .done a:hover, .wizard>.steps .done a:active{
			margin-left: -8px;
			border-left: 2px solid #039aff;
			color: #aaaaaa;
		}
		.wizard>.steps .disabled a:after, .wizard>.steps .done a:after{
			content: '';
		    border-top: 2px solid #039aff;
		    border-right: 2px solid #039aff;
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
		/*steps end*/
		.right_arrow_area{
			position: relative;
		}
		.right_arrow_area:after{
			content: '~';
		    display: block;
		    position: absolute;
		    top: 3px;
		    right: -6px;
		    font-size: 20px;
		    font-weight: 400;
		}
		.wizard>.actions a, .wizard>.actions a:hover, .wizard>.actions a:active{
			background: #039aff;
		}
		@media (max-width: 575.98px) {
			.wizard > .steps > ul > li{
		        width: 93% !important;
		    }
		    .wizard>.steps a, .wizard>.steps a:hover, .wizard>.steps a:active{
		        border-left: 2px solid #039aff !important;
		        margin-left: 0px !important;
		    }
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
				font-size: 18px !important;
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
				font-size: 16px !important;
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
				font-size: 13px !important;
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
				border-top: 2px solid #039aff;
				border-right: 2px solid #039aff;
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
				background: #039aff;
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
				border-top: 2px solid #039aff;
				border-right: 2px solid #039aff;
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
				background: #039aff;
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
				border-top: 2px solid #039aff;
				border-right: 2px solid #039aff;
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
				background: #039aff;
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
				border-top: 2px solid #039aff;
				border-right: 2px solid #039aff;
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
				background: #039aff;
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
				font-size: 7px;
				display: block;
			}
			.wizard>.steps .disabled a:after, .wizard>.steps .done a:after{
				content: '';
				border-top: 2px solid #039aff;
				border-right: 2px solid #039aff;
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
				background: #039aff;
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
				background-color: #039aff;
				padding-left: 37px;
				margin-left: -8px;
			}
			.wizard>.steps .disabled a, .wizard>.steps .disabled a:hover, .wizard>.steps .disabled a:active, .wizard>.steps .done a, .wizard>.steps .done a:hover, .wizard>.steps .done a:active{
				margin-left: -8px;
				padding-left: 34px;
				border: 2px solid #039aff;
				background-color: #ffffff;
				padding-top: 3px;
				padding-bottom: 3px;
				position: relative;
				border-right: none;
				/* border-left: none; */
			}
		}




	</style>
@stop


@section('ecommerce')

@stop

@section('content')
@include('user.layouts.tab')

<div class="container" id="new-project">
	<div class="mt20">
		<div class="row">
			<div class="col-md-8 offset-md-2">
				<h1 class="text-center page_title_product_register">プロジェクトに追加する</h1>
				<form id="example-form" action="" class="mt20" method="post" enctype="multipart/form-data">
					{{ csrf_field() }}
						{{--<input type="hidden" name="status" value="{{ $project->status }}">--}}
							<div class="mt20">
						
							<h3 class="step_title_area">
								<span class="steptext">Step</span><span class="stepcount">1</span>
								<span class="stepinfo">追加情報入力</span>
							</h3>
							<section>
								
								<div class="details">
									<div class="mt20 details_div">
										<div class="">
											<div class="form-group">
												<label for="details_title[] " style="width:100%;">見出しタイトル</label>  <span id="additional_details_title_message" class="text-danger"></span> 
												<input id="additional_details_title" type="text" class="form-control additional_details_title length20_1"  placeholder="" maxlength="21" name="details_title[]">
											</div>
											<div class="form-group">
												<label for="details_description[]">内容 </label><span id="additional_details_description_message" class="text-danger"></span>
												<textarea id="additional_details_description" name="details_description[]" class="form-control required col-12 additional_details_description"  maxlength="2001" rows="8" cols="80"></textarea>
											</div>

											<div class="form-group file_upload_section">
													<!-- <button class="btn btn-sm btn-default upfile_step3">ファイルを選択</button> -->
													<!-- <span id="" class="ml-3 select_file_step3">選択されていません</span> -->
													<!-- <label for="draft_file[]" class="col-md-12">見出しタイトル</label> -->
												<input type="file" id="" class=" col-10 file_step3 additional_details_file" placeholder="" name="draft_file[]">
											</div>
										</div>
									</div>
								</div>
								<div class="details_container"></div>
								<div class="row  mt-3 mb-3">
									<div class="col-md-2 offset-4">
										<a href="#!" class="btn btn-outline-info add_details">+ さらに追加する</a>
									</div>
								</div>
							</section>
							<h3 class="step_title_area">
								<span class="steptext">Step</span><span class="stepcount">2</span>
								<span class="stepinfo">入力情報を確認</span>
							</h3>
							<section>
								<div class="row" style="margin-top: 30px;">
									<div class="col-12">
										<div class="row preview_area">
											<div class="col-12">追加情報入力</div>
										</div>
										<div class="col-12 aditional_info pb-3"></div>
										{{-- <div class="row preview_area">
											<div class="col-12">追加情報入力</div>
											<div class="col-12 product_company_image">
												<img width="200" src="{{Request::root().'/uploads/products/'.$product->company_info_image}}">
											</div>
										</div> --}}
									</div>
								</div>
							</section>
							<h3 class="step_title_area">
								<span class="steptext">Step</span><span class="stepcount">3</span>
								<span class="stepinfo">申請完了</span>
							</h3>
							<section>
								<h4 class="text-center mt20">
									プロジェクトに追加しました。
								</h4>
								{{-- <h4 class="text-center mt20">
									<a href="{{route('user-project-list')}}">→ マイページへ</a>
								</h4> --}}
								<h4 class="text-center mt20">
									<a href="{{route('user-project-list')}}" class="btn btn-md text-white" style="background-color:#C6C6C6;">< 戻る</a>

								</h4>
							</section>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>


			<div class="hide details">
				<div class="mt20 details_div">
					<hr>
					<div class="">
						<div class="form-group">
							<label for="details_title[] " style="width:100%;">見出しタイトル</label>  <span id="additional_details_title_message " class="text-danger"></span> <span class="close float-right" data-target="details_div">X</span>
							<input id="additional_details_title" type="text" class="form-control additional_details_title length20_1"  placeholder="" maxlength="21" name="details_title[]">
						</div>
						<div class="form-group">
							<label for="details_description[]">内容 </label><span id="additional_details_description_message" class="text-danger"></span>
							<textarea id="additional_details_description" name="details_description[]" class="form-control required col-12 additional_details_description"  maxlength="2001" rows="8" cols="80"></textarea>
						</div>

						<div class="form-group file_upload_section">
								<!-- <button class="btn btn-sm btn-default upfile_step3">ファイルを選択</button> -->
								<!-- <span id="" class="ml-3 select_file_step3">選択されていません</span> -->
								<!-- <label for="draft_file[]" class="col-md-12">見出しタイトル</label> -->
							<input type="file" id="" class=" col-10 file_step3 additional_details_file" placeholder="" name="draft_file[]">
						</div>
					</div>
				</div>
			</div>



@include('user.layouts.submit_modal');
@include('user.layouts.add-project')
@stop

@section('custom_js')

	{{-- <script src="//cdn.ckeditor.com/4.8.0/basic/ckeditor.js"></script> --}}
	{{-- <script src="{{Request::root()}}/ckeditor/ckeditor.js"></script> --}}

	<script type="text/javascript" src="{{Request::root()}}/js/jquery.validate.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/jquery-dropdown-datepicker@1.3.0/dist/jquery-dropdown-datepicker.min.js"></script>
	
	<script type="text/javascript">
		$(document).on('click', '#upfile1', function(){
			$("#file1").trigger('click');
			$('#file1').change(function() {
				var filename = $('#file1').val();
				$('#select_file').html(filename);
			});
			return false;

		});

	</script>
	<script type="text/javascript">
		$(document).on('click', '.upfile_step3', function(){
			$(this).parent('.file_upload_section').find('.file_step3').trigger('click');
			$(this).parent('.file_upload_section').find('.file_step3').change(function() {
				var filename = $(this).parent('.file_upload_section').find('.file_step3').val();
				$(this).parent('.file_upload_section').find('.select_file_step3').html(filename);
			});
			return false;
		});

		$(document).on('click', '.close', function(){
			$(this).closest('.'+$(this).attr('data-target')).remove();
		});
	</script>

	<script type="text/javascript">
		$(document).ready(function () {
			$('.amount').on('keyup', function(){
				var rowid = $(this).attr('data-row');
				// console.log($(this).val());
				amount = $(this).val();
				amountLength = amount.length;
				// console.log(amountLength);
				// console.log(rowid);
				if ($('.point_'+rowid).val().length > 0) {
					point = $('.point_'+rowid).val();
					// console.log(pointLength);
				}else {
					point = 0;

				}
				check(rowid , point , amount);
			});
			$('.point').on('keyup', function(){
				var rowid = $(this).attr('data-row');
				// console.log($(this).val());
				// console.log(rowid);
				point = $(this).val();
				amount = $('.amount_'+rowid).val();

				pointLength = point.length;
				// console.log(pointLength);
				check(rowid , point , amount);

			});
			function check(rowid , point , amount){
				// console.log(point + 'point');
				// console.log(amount);


				if ( parseInt(point) > parseInt(amount)) {
					// console.log('fgdfgdfg');
					$('.pointMsg_' + rowid).html('ponit must be equal or less than amount');
				}else{
					$('.pointMsg_' + rowid).html('');
				}
			}

		});

		</script>


	<script type="text/javascript">
		$(document).ready(function(){
			var maxDate = null, minDate = null;
			$("#from").dropdownDatepicker({
				displayFormat: 'ymd',
				defaultDate: '{{date("Y-m-d", strtotime($project->start))}}',
				wrapperClass: 'row',
				dropdownClass: 'col form-control',
				allowPast: true,
				maxDate: maxDate,
				minYear: '{{date("Y", strtotime($project->start))}}',
				monthFormat: 'short',
				// Identifies the "Day" dropdown
				dayLabel: '日',

				// Identifies the "Month" dropdown
				monthLabel: '月',

				// Identifies the "Year" dropdown
				yearLabel: '年',
				sortYear: 'asc',
				// Long month dropdown values (can be overridden for internationalisation purposes)
				monthLongValues: ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'],

				// Short month dropdown values (can be overridden for internationalisation purposes)
				// monthShortValues: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
				monthShortValues: ['1月', '2月', '3月', '4月', '5月', '6月', '7月', '8月', '9月', '10月', '11月', '12月'],

				// Initial dropdown values (can be overridden for internationalisation purposes)
				initialDayMonthYearValues: ['Day', 'Month', 'Year'],

				// Ordinal indicators (can be overridden for internationalisation purposes)
				// daySuffixValues: ['st', 'nd', 'rd', 'th']
				daySuffixValues: ['日', '日', '日', '日'],
				onChange: function(day, month, year){
					if(day!=null && month!=null && year!=null){
						$("#to").dropdownDatepicker('destroy');
						minDate = year+'-'+month+'-'+day;
						maxDate = new Date(minDate);
						maxDate.setDate(maxDate.getDate()+69);
						maxDate = maxDate.getFullYear()+'-'+(maxDate.getMonth()+1)+'-'+maxDate.getDate();
						createToDate();
					}
				}
			});
			var createToDate = function(){
				$("#to").dropdownDatepicker({
					displayFormat: 'ymd',
					defaultDate: '{{date("Y-m-d", strtotime($project->end))}}',
					wrapperClass: 'row',
					dropdownClass: 'col form-control',
					allowPast: true,
					minDate: minDate,
					maxDate: maxDate,
					monthFormat: 'short',
					// Identifies the "Day" dropdown
					dayLabel: '日',

					// Identifies the "Month" dropdown
					monthLabel: '月',

					// Identifies the "Year" dropdown
					yearLabel: '年',
					sortYear: 'asc',
					// Long month dropdown values (can be overridden for internationalisation purposes)
					monthLongValues: ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'],

					// Short month dropdown values (can be overridden for internationalisation purposes)
					// monthShortValues: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
					monthShortValues: ['1月', '2月', '3月', '4月', '5月', '6月', '7月', '8月', '9月', '10月', '11月', '12月'],

					// Initial dropdown values (can be overridden for internationalisation purposes)
					initialDayMonthYearValues: ['Day', 'Month', 'Year'],

					// Ordinal indicators (can be overridden for internationalisation purposes)
					// daySuffixValues: ['st', 'nd', 'rd', 'th']
					daySuffixValues: ['日', '日', '日', '日']
				});
			}

			createToDate();
		});
	</script>


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
						// alert('-----' + currentIndex + '-----' + newIndex);

						var check = 0;
						if (currentIndex == 0) {
							
							// if ($('.length35_1').val().length > 35) {
							// 	$('#length35_1').html('35文字以内でご記入ください ');
							// 	check = 1;
							// }
							// if ($('.length20_1').val().length > 20) {
							// 	$('#length20_1').html('20文字以内でご記入ください ');
							// 	check = 1;
							// }
							// if ($('.length2k_2').val().length > 2000) {
							// 	$('#length2k_2').html('2000文字以内でご記入ください ');
							// 	check = 1;
							// }
							// if ($('.length30_2').val().length > 30) {
							// 	$('#length30_2').html('30文字以内でご記入ください  ');
							// 	check = 1;
							// }
							// if ($('.length30_3').val().length > 30) {
							// 	$('#length30_3').html('30文字以内でご記入ください  ');
							// 	check = 1;
							// }
							// if ($('.length200_1').val().length > 200) {
							// 	$('#length200_1').html('200文字以内でご記入ください  ');
							// 	check = 1;
							// }
							

							if (check == 1) {
								return false;
							}


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
		    
					var additional_details_title = [];
					var additional_details_description = [];
					var additional_details_file = [];
					$('.additional_details_title').each(function(index, value){
						console.log(value)
						if($(this).val() != ''){
							additional_details_title.push('<div>'+$(this).val()+'</div>');
						}
					});
					$('.additional_details_description').each(function(index, value){
						if($(this).val() != ''){
							var additional_details = [];
							var details=$(this).val().split("\n")
							details.map(function(index, value){
								additional_details.push('<span key="value">'+ index +'</span>'+'<br/>')
							})
							additional_details_description.push('<div>'+additional_details+'</div>');
						}
					});
					$('.additional_details_file').each(function(index, value){
						// if($(this).val() != ''){
							additional_details_file.push ('<div>'+$(this).val()+'</div>');
						// }
					});

					var html_return2=[];
					for( var i=0; i<additional_details_title.length; i++)
					{
						html_return2.push ('<div class="row preview_area">'+"<div class=col-3>"+'見出しタイトル'+'</div>'+'<div class="col-9">'+additional_details_title[i]+'</div>'+'</div>');
						html_return2.push ('<div style="padding-bottom:10px">'+'内容'+'</div>');
						additional_details_description[i].split(',').map(function(item){
							html_return2.push('<div class="row">'+'<div class="col-12">'+item+'</div>'+'</div>');
						})
						html_return2.push ('<div class="row preview_area" style="padding:0px">'+'</div>'+'</div>');
						var c=additional_details_file[i];
						console.log(c);
						if(c!=undefined){
							html_return2.push ('<div class="row preview_area" style="border:0px">'+"<div class=col-3>"+'写真'+'</div>'+'<div class="col-9">'+c.substring(17)+'</div>'+'</div>');
						}	
					
					}
					$('.aditional_info').html(html_return2);
		        }
		    },
		    onFinishing: function (event, currentIndex)
		    {	        
				form.validate().settings.ignore = ":disabled,:hidden";
        		return form.valid();
        		// return true;
		    },
		    onFinished: function (event, currentIndex)
		    {
				form.submit()		
		    }
		});

		var calculateDay = function(){
			// console.log('calculate day');
			var d1 = $('#from').val()+'T00:00:01';
			// console.log(d1);
			var date1 = new Date(d1);
			// console.log(date1.getTime());
			var d2 = $('#to').val()+'T23:59:59';
			// console.log(d2);
			var date2 = new Date(d2);
			// console.log('date2 '+d1);
			// console.log('date1 '+date2.getTime());

			// console.log($('.toshowM').val());

			timeDiff = date2.getTime() - date1.getTime();
			// console.log('timeDiff');
			// console.log(timeDiff);

			if(timeDiff < 0){
				alert('invalid date');
				return false;
			}
			var timeDiff = Math.abs(timeDiff);
			var diffDays = Math.ceil(timeDiff / (1000 * 3600 * 24));
			// console.log('diffDays');
			// console.log(diffDays);
			if(diffDays > 70){
				alert('maximum day is 70.You have selected '+diffDays+' days');
				this.selectedIndex = $(this).data('lastSelectedIndex');
				e.preventDefault();
				return false;
			}

			if(isNaN(diffDays)){
				diffDays = '';
			}

			$('#totalDay').val(diffDays);
		}

		setTimeout(function(){
			calculateDay();
		}, 1000);
		


		

		$('.calculateDay').on('change', calculateDay);


		var basic = [
		  ['Bold', 'Italic', '-', 'NumberedList', 'BulletedList', '-', 'Link', 'Unlink', '-', 'About']
		];





		$('.add_details').on('click', function(){
			var content = $('.details').html();
			$('.details_container').before(content);
			// CKEDITOR.replace( 'ckeditor' );
			// CKEDITOR.replaceClass = 'ckeditor';

		})
		$('.add_reward').on('click', function(){
			var content = $('.reward').html();
			$('.reward_button_area').before(content);
		})



		// console.log('new project');
		// $(function(){
		// 	CKEDITOR.replace( 'editor', {
		// 	    toolbar: basic
		// 	} );
		// 	// CKEDITOR.replaceClass = 'ckeditor';
		// 	CKEDITOR.replace( 'description' ,{
		// 		// filebrowserBrowseUrl : 'ckeditor1/plugins/imageuploader/imgbrowser.php',
		// 		// filebrowserUploadUrl : '/browser1/upload/type/all',
		// 	    filebrowserImageBrowseUrl : '{{Request::root()}}/ckeditor/plugins/imageuploader/imgbrowser.php',
		// 		// filebrowserImageUploadUrl : '/browser3/upload/type/image',
		// 	    // filebrowserWindowWidth  : 800,
		// 	    // filebrowserWindowHeight : 500,
		// 		extraPlugins: 'imageuploader'
		// 		// extraPlugins: 'dropler'
		// 	});
		// })

	</script>



	<script type="text/javascript">
		$(document).ready(function () {
			$('#additional_details_description').keyup(function(e){
				if ($(this).val().length > 2000) {
					$('#additional_details_description_message').html('2000文字以内でご記入ください  ');
					e.preventDefault();
					return false;
				}else{
					$('#additional_details_description_message').html('');
				}
			});
			// $('#additional_details_title').each(function(index, value){
			// 	if($(this).val() != ''){
			// 		console.log($(this).val().length )
			// 		if ($(this).val().length > 20) {
			// 			$('#additional_details_title_message').html('20文字以内でご記入ください  ');
			// 			e.preventDefault();
			// 			return false;
			// 		}else{
			// 			$('#additional_details_title_message').html('');
			// 		}
			// 	}
			// });
			$('#additional_details_title').keyup(function(e){
				if ($(this).val().length > 20) {
					console.log($(this).val().length)
					$('#additional_details_title_message').html('20文字以内でご記入ください  ');
					e.preventDefault();
					return false;
				}else{
					$('#additional_details_title_message').html('');
				}
			});
		});
	</script>

@stop
