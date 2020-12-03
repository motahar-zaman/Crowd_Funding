<!DOCTYPE html>
<html lang="en">
	<head>
		<title>@if(\View::hasSection('title'))
        	@yield('title')
    	@else
        	Crofun
    	@endif</title>
		<!-- Required meta tags -->
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<meta name="csrf-token" content="{{ csrf_token() }}">
		<meta id="token" name="token" value="{{ csrf_token() }}">
		<link rel="shortcut icon" href="{{Request::root()}}/assets/front/img/favicon.ico" >
		<!-- Bootstrap CSS -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">

		<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

		<link rel="stylesheet" type="text/css" href="{{Request::root()}}/assets/front/css/main.css">
		<link rel="stylesheet" type="text/css" href="{{Request::root()}}/assets/user/css/main.css">
		<!--scripts-->
		<script
		  src="https://code.jquery.com/jquery-3.2.1.min.js"
		  integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="
		  crossorigin="anonymous">
		</script>
		<script src="https://www.google.com/recaptcha/api.js"></script>



		@yield('custom_css')
		<style media="screen" type="text/css">
				.front_footer{
					position: relative !important;
				}
				#body{
					padding-bottom: 0px;
					margin-bottom: 0px;
				}
				
				.mobileShow{
					display : none;
				}
				.desktopShow{
					display : contents;
				}
				.container_div{
					max-width: 1300px;
					width: 100%;
					margin:0 auto;
				}
				@media (max-width: 1024px){
					.scroll_horizental{
						min-width: 1024px;
						overflow-x:auto;
						margin:0 auto;
					}
					.mobileShow{
						display : contents;
					}
					.desktopShow{
						display : none;
					}
				}

				div > .small-device-login-registration-button-center > ul {
						list-style: none;
				}
				@media (max-width: 575.98px) {
					.front_footer ul{
						text-align:left;
					}
					.scroll_horizental{
						min-width: 0px!important;
						overflow-x:auto;
						margin:0 auto;
					}
					div > .small-device-login-registration-button-center > ul > li {
						list-style: none;
						display: inline;
					}
				}

				.login_signup > ul {
					margin:0;
					padding:0;
					list-style:none;
					font-size:0;
				}
  
				.login_signup > ul > li{
					display: inline-block;
					*display: inline;  
					*zoom: 1;
					padding: 5px;
					font-size:14px;
				}
				/* .footer {
					position: fixed;
					left: 0;
					bottom: 0;
				  /* margin-top: 200px; */
					/* width: 100%; */
					/* background-color: red; */
					/* color: white; */
					/* text-align: center; */
				/* } */

				/* top nav gap */		
				.top-nav-gap {
					padding-bottom: 1px;
					padding-top: 5px;
				}
				
				.list-inline-item:not(:last-child) {
					margin-right: 0px !important;
				}
				.user-header-nav > ul > li {
					list-style: none;
					display: inline;
				}


		</style>
	</head>
	<body>
		<div class="front scroll_horizental" style="font-family:w3">

			@include('header')


			<div id="body scroll_horizental">
				@yield('content')
			</div>

			@include('footer')



		<!-- jQuery first, then Tether, then Bootstrap JS. -->

		<script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>

		<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery-steps/1.1.0/jquery.steps.min.js"></script>


		<script src="https://unpkg.com/vue"></script>
		<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/vue-resource/1.3.4/vue-resource.min.js"></script>

		<script type="text/javascript">
			Vue.http.headers.common['X-CSRF-TOKEN'] = document.querySelector('#token').getAttribute('value');
			var english = /^[A-Za-z0-9]*$/;
		</script>
		@yield('custom_js')
		<script type="text/javascript">
			$(function(){
				console.log('user-profile-page')
				$('.user_top_sm_menu, .leftmenuarea_sm').on('change', function(){
					var geturl = $(this).val();
					
					window.location = geturl;
				});
			})
		</script>
	</body>
</html>
