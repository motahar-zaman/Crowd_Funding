@extends('user.layouts.main')

@section('custom_css')
	<style type="text/css">
		.wizard > .steps > ul > li {
		    width: 25%;
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
			background-color: #575757;
			padding-left: 42px;
			margin-left: -8px;
		}
		.wizard>.steps .current a:after{
			content: '';
		    background: #575757;
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
			border: 2px solid #575757;
			background-color: #ffffff;
			padding-top: 3px;
    		padding-bottom: 3px;
    		position: relative;
    		border-right: none;
    		border-left: none;
		}
		.wizard>.steps .done a, .wizard>.steps .done a:hover, .wizard>.steps .done a:active{
			margin-left: -8px;
			border-left: 2px solid #575757;
			color: #aaaaaa;
		}
		.wizard>.steps .disabled a:after, .wizard>.steps .done a:after{
			content: '';
		    border-top: 2px solid #575757;
		    border-right: 2px solid #575757;
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
			margin-left: 0% !important;
			margin-top: 0px !important;
		}
		.wizard > .steps > ul > li{
			width: 23%;
		}


		{{--@media (max-width: 575.98px) {
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
		}--}}

		@media (max-width: 1300px) {
			.wizard>.steps .stepinfo{
				font-size: 14px;
				display: block;
			}
			.wizard>.steps .disabled a:after, .wizard>.steps .done a:after{
				content: '';
				border-top: 2px solid #575757;
				border-right: 2px solid #575757;
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
				background: #575757;
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
				border-top: 2px solid #575757;
				border-right: 2px solid #575757;
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
				background:#575757;
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
				border-top: 2px solid #575757;
				border-right: 2px solid #575757;
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
				background: #575757;
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
			.table-style{
				font-size:11px;
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
				border-top: 2px solid #575757;
				border-right: 2px solid #575757;
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
				background: #575757;
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
				border-top: 2px solid #575757;
				border-right: 2px solid #575757;
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
				background: #575757;
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
				background-color:#575757;
				padding-left: 37px;
				margin-left: -8px;
			}
			.wizard>.steps .disabled a, .wizard>.steps .disabled a:hover, .wizard>.steps .disabled a:active, .wizard>.steps .done a, .wizard>.steps .done a:hover, .wizard>.steps .done a:active{
				margin-left: -8px;
				padding-left: 34px;
				border: 2px solid #575757;
				background-color: #ffffff;
				padding-top: 3px;
				padding-bottom: 3px;
				position: relative;
				border-right: none;
				/* border-left: none; */
			}
		}


		/* @media (max-width: 1370px) {
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
		} */


		/*steps end*/
	</style>
@stop


@section('ecommerce')

@stop

@section('content')
{{-- @include('user.layouts.tab') --}}


<div class="row breadcrump p-0 m-0 project_sorting container_div">
	<div class="col-md-12 col-sm-12">
		<div class="container_div">
			<ul class="list-inline project_category_data pt-4">
				<li class="list-inline-item">???????????? &gt; ????????????????????????</li>
			</ul>
		</div>
	</div>
</div>

<div class="container" id="new-project">


<div class="mt20">
	<div class="row justify-content-center">
		{{-- <div class="text-center col-sm-12 col-md-12">
				<h1 class=" page_title_product_register">?????????????????????</h1>
		</div> --}}
			

		<div class="col-md-8 offset-md-2">

			

			<form id="example-form" action="" class="mt20" method="post" enctype="multipart/form-data">

				{{ csrf_field() }}

			    <div class="mt20">
							<h3 class="step_title_area">
				        	<span class="steptext">Step</span><span class="stepcount">1</span>
				        	<span class="stepinfo">??????????????????</span>
				    	</h3>
			        <section class="mt-3">
								<div class="col-md-12 col-sm-12">
									<h5 class="">????????????</h5>

									
										<div class="offset-1">
											
												<div class="radio">
														<label><input class="reason_radio" type="radio" value="????????????????????????????????????????????????????????????" name="reason" checked>????????????????????????????????????????????????????????????</label>
													</div>
													<div class="radio">
														<label><input class="reason_radio" type="radio" value="?????????????????????????????????????????????????????????????????????" name="reason">?????????????????????????????????????????????????????????????????????</label>
													</div>
													<div class="radio disabled">
														<label><input class="reason_radio" type="radio" value="????????????????????????????????????????????????" name="reason" >????????????????????????????????????????????????</label>
													</div>
													<div class="radio disabled">
														<label><input class="reason_radio" type="radio" value="?????????????????????????????????????????????" name="reason" >?????????????????????????????????????????????</label>
													</div>
													<div class="radio disabled">
														<label><input class="reason_radio" type="radio" value="???????????????????????????????????????" name="reason" >???????????????????????????????????????</label>
													</div>
													<div class="radio disabled">
														<label><input class="reason_radio" type="radio" value="?????????????????????" name="reason" >?????????????????????</label>
													</div>
													<div class="radio disabled">
														<label><input class="reason_radio" type="radio" value="?????????????????????" name="reason" >?????????????????????</label>
													</div>
													<div class="radio disabled">
														<label><input class="reason_radio" type="radio" value="?????????" name="reason" >?????????</label>
													</div>
										</div>
										<div class="form-group">
											<h5 class="">????????????</h5>
											<div class="offset-1">
												<div class="help-block">2000??????????????????????????????</div>
												<textarea name="reason_details" class="form-control reason_details_field" rows="8" cols="80" maxlength="2000"></textarea>
											</div>
										</div>
									

								</div>

									{{-- <div class="mr-md-5"> --}}
										{{-- <h4 class="text-center mt-5 mr-md-5">	<a href="{{route('user-withdrawal2')}}" class="btn btn-md btn-bottom"><span><i class="fa fa-angle-left"></i> --}}
			        </section>
							<h3 class="step_title_area">
									<span class="steptext">Step</span><span class="stepcount">2</span>
									<span class="stepinfo">??????????????????</span>
							</h3>
							<section class="mt-3">
								<div class="row mt-5">
									<div class="col-md-8 col-sm-8">
										<h5 class="">????????????</h5>
										<p class="p-3 reason">????????????????????????????????????????????????????????????</p>

										<h5 class="">????????????</h5>
										<p class="p-3 reason_details">???????????????????????????????????????</p>
										{{-- <div class="mr-md-5">
											<h4 class="text-center mt-5 mr-md-5">	<a href="{{route('user-withdrawal2')}}" class="btn btn-md btn-bottom"><span><i class="fa fa-angle-left"></i>

											</span>??? ??? </a>
												<a href="{{route('user-withdrawal4')}}" class="btn btn-md btn-bottom">???????????? <span><i class="fa fa-angle-right"></i>
											</span> </a></h4>
										</div> --}}
									</div>
								</div>
							</section>
							<h3 class="step_title_area">
									<span class="steptext">Step</span><span class="stepcount">3</span>
									<span class="stepinfo">??????????????????</span>
							</h3>
							<section class="mt-3">
								<div class="row mt-5">
									<div class="col-md-8 col-sm-8 mr-md-5">
										<div class="mr-md-3">
											<h4 class="font-weight-bold   text-center mr-md-5">????????????????????????????????????</h4>
											<p class="p-3  text-center mr-md-5">?????????????????????????????????????????????????????????????????????<br>
										 Crofun????????????????????????????????????????????????????????????</p>
										 <h4 class="text-center mt-5 mr-md-5">	
											 <a href="{{route('user-my-page')}}" class="btn btn-md btn-bottom btn-secondary">
												<span><i class="fa fa-angle-left"></i></span>??? ??? 
											</a>
										 </h4>
										</div>

									</div>
								</div>
							</section>




			    </div>
			 </form>


		</div>
	</div>

</div>

</div>



@include('user.layouts.add-project')
@stop

@section('custom_js')

	<!-- <script src="//cdn.ckeditor.com/4.8.0/basic/ckeditor.js"></script> -->
	<script src="{{Request::root()}}/ckeditor/ckeditor.js"></script>

	<script type="text/javascript" src="https://ajax.aspnetcdn.com/ajax/jquery.validate/1.7/jquery.validate.min.js"></script>

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
		        finish: "??????!!",
		        next: "?????? >",
		        previous: "< ??????",
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
		        form.validate().settings.ignore = ":disabled,:hidden";
        		return form.valid();
        		// return true;
		    },
		    onStepChanged: function (event, currentIndex, newIndex)
		    {
					 if (currentIndex == 2) {
					 }
		        if(currentIndex == 1){
		        	$('.actions > ul > li:last-child').attr('style', '');
		        	$('.actions > ul > li:nth-child(2)').attr('style', 'display:none;');
							// alert('hello');
					$('.reason').html($('input[name="reason"]:checked').val());
					$('.reason_details').html($('textarea[name="reason_details"]').val());



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
		        form.submit();
		    }
		});

		var calculateDay = function(){
			var date1 = new Date($('#fromM').val()+"/"+$('#fromD').val()+"/"+$('#fromY').val());
			var date2 = new Date($('#toM').val()+"/"+$('#toD').val()+"/"+$('#toY').val());
			timeDiff = date2.getTime() - date1.getTime();
			if(timeDiff < 0){
				alert('invalid date');
				return false;
			}
			var timeDiff = Math.abs(timeDiff);
			var diffDays = Math.ceil(timeDiff / (1000 * 3600 * 24));
			if(diffDays > 70){
				alert('maximum day is 70.You have selected '+diffDays+' days');
				this.selectedIndex = $(this).data('lastSelectedIndex');
				e.preventDefault();
				return false;
			}
			$('#totalDay').val(diffDays);
		}


		calculateDay();


		$('select').each(function() {
		  $(this).data('lastSelectedIndex', this.selectedIndex);
		});

		$(".calculateDay").on("click", function() {
	       $(this).data('lastSelectedIndex', this.selectedIndex);
	    });

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
			$('.reward_container').before(content);
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

@stop
