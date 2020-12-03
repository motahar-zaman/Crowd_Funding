<!DOCTYPE html>
<html lang="en">
	<head>
		<title>
		@if(\View::hasSection('title'))
        	@yield('title')
    	@else
        	Crofun
    	@endif
		</title>
		<!-- Required meta tags -->
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">


		<!-- Twitter Card data -->
		<meta name="twitter:card" value="summary">

		<!-- Open Graph data -->
		<meta property="og:title" content="{{isset($social_title)?$social_title:'Crofun'}}" />
		<meta property="og:type" content="product" />
		<meta property="og:url" content="{{url()->full()}}" />
		<meta property="og:image" content="{{isset($social_image)?$social_image:'crowdfunding'}}" />
		<meta property="og:description" content="{{isset($social_description)?$social_description:'crowdfunding'}}" />


		<link rel="shortcut icon" href="{{Request::root()}}/assets/front/img/favicon.ico" >
		<!-- Bootstrap CSS -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">

		<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
		<link rel="stylesheet" type="text/css" href="{{Request::root()}}/jQuery-ScrollTabs-2.0.0/css/scrolltabs.css">

		<link rel="stylesheet" type="text/css" href="{{ Request::root() }}/assets/front/library/slick/slick.css">
		<link rel="stylesheet" type="text/css" href="{{Request::root()}}/assets/front/library/slick/slick-theme.css">

		<link rel="stylesheet" type="text/css" href="{{Request::root()}}/assets/front/css/main.css">
		<!--Scripts-->
		<script src="https://www.google.com/recaptcha/api.js"></script>

		{{-- <link rel="stylesheet" href="{{ asset('js-socials/jssocials.css') }}">
		<link rel="stylesheet" href="{{ asset('js-socials/jssocials-theme-flat.css') }}"> --}}
		{{-- <link rel="stylesheet" type="text/css" href="{{Request::root()}}/assets/js_socials/jssocials.css"> --}}
		{{-- <link rel="stylesheet" type="text/css" href="{{Request::root()}}/assets/js_socials/jssocials-theme-flat.css"> --}}
		<script
			src="https://code.jquery.com/jquery-3.2.1.min.js"
			integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="
			crossorigin="anonymous"></script>
		<!-- <script src='https://www.google.com/recaptcha/api.js'></script> -->

   {{-- <script type="text/javascript" src="{{Request::root()}}/assets/js_socials/jssocials.js"></script> --}}

	@yield('custom_css')

	<style media="screen" type="text/css">
		/* @media (max-width: 1300px) {
			.front_footer ul li a {
				color: #595959;
				text-decoration: none;
				display: inline-block;
				font-weight: bold;
				font-size: 13px;
			}
		}
		@media (max-width: 1200px) {
			.front_footer ul li a {
				color: #595959;
				text-decoration: none;
				display: inline-block;
				font-weight: bold;
				font-size: 12px;
			}
			.footer-buttton{
				font-size: 15px
			}
			.footer-copy{
				font-size: 14px;
				text-align: left!important;
			}
		}
		@media (max-width: 1100px) {
			.front_footer ul li a {
				color: #595959;
				text-decoration: none;
				display: inline-block;
				font-weight: bold;
				font-size: 10px;
			}
			.footer-buttton{
				font-size: 13px
			}
		}
		@media (max-width: 1000px) {
			.front_footer ul li a {
				color: #595959;
				text-decoration: none;
				display: inline-block;
				font-weight: bold;
				font-size: 9px;
			}
			.footer-buttton{
				font-size: 13px
			}
			.footer-copy{
				font-size: 13px;
				text-align: left!important;
			}
		}
		@media (max-width: 900px) {
			.front_footer ul li a {
				color: #595959;
				text-decoration: none;
				display: inline-block;
				font-weight: bold;
				font-size: 8px;
			}
			.footer-buttton{
				font-size: 11px;
			}
			.footer-copy{
				font-size: 12px;
				text-align: left!important;
			}
		}
		@media (max-width: 578px) {
			.footer_middle  {
				margin-left:10px !important;
			}
		} */
		.container_div{
			max-width: 1300px;
			width: 100%;
			margin:0 auto;
			padding-bottom: 6px;
		}

		/* .scroll_horizental{
			min-width: 1024px;
			overflow-x:auto;
			margin:0 auto;
		} */
		.nav_width{
			font-size:14px;
			font-family: w6;
		}
		.mobileShow{
			display : none;
		}
		.desktopShow{
			display : contents;
		}
		@media (max-width: 1024px){
			.scroll_horizental{
				min-width: 1024px;
				overflow-x:auto;
				margin:0 auto;
			}
		}
		@media (max-width: 575.98px) {
			.mobileShow{
				display : contents;
			}
			.desktopShow{
				display : none;
			}
			.scroll_horizental{
				min-width: 0px!important;
				overflow-x:auto;
				margin:0 auto;
			}
		}
		@media only screen and (min-width: 575.98px) {
			.flex_cont {
				display: flex;
				align-items: stretch;
				overflow: auto;
				overflow-y: hidden;
				min-width: 1080px;
				flex-shrink: 0;
			}
		} 

		.list-inline-item:not(:last-child) {
			margin-right: 0px;
		}

		
		/* small devices login and registration button in center */
		.small-device-login-registration-button-center {
			margin-right: 0;
		}

		.small-device-login-registration-button-center > li{
			list-style: none;
			display: inline;
		}
		@media only screen and (max-width: 766px) {
			.small-device-login-registration-button-center {				
				/*margin-right: 22% !important;*/

			}
			.float-right {
				float: none !important;
			}
		}

		@media only screen and (min-width: 344px) {
			.small-device-login-registration-button-center {				
				/*margin-right: 22% !important;*/

			}
		}

	</style>
	</head>
	<body>
		<!-- <div class="front scroll_horizental" style="font-family:w3;">-->
		<div class="front scroll_horizental">
			@include('header')

			<div id="body scroll_horizental">
				@yield('content')
			</div>

			@include('footer')

		</div>

		<!-- jQuery first, then Tether, then Bootstrap JS. -->
		<script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>

		<script type="text/javascript" src="{{Request::root()}}/assets/front/library/slick/slick.js"></script>
		@yield('custom_js')

		<script type="text/javascript">
			$(function(){
				$('.project-category').on('click', function(){
					console.log('clicked');
					$(this).next('.project-subcategory').show();
				});
				$('.top_sm_menu, .project_category_sm_data').on('change', function(){
					var geturl = $(this).val();
					window.location = geturl;
				});
			})
		</script>
		<script>
			$(document).ready(function() {
				$('#body').show();
			});
		</script>
	</body>
</html>
