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

		
		<link rel="stylesheet" type="text/css" href="{{Request::root()}}/assets/front/css/style.css">
		<!--Scripts-->
		<script src="https://www.google.com/recaptcha/api.js"></script>

		<script
			src="https://code.jquery.com/jquery-3.2.1.min.js"
			integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="
			crossorigin="anonymous">
		</script>

	@yield('custom_css')
	
	</head>
	<body>
		<div class="front scroll_horizental">
			@include('main_header')
			<div id="body scroll_horizental">
				@yield('content')
			</div>
			@include('main_footer')
		</div>

		<script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>

		<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery-steps/1.1.0/jquery.steps.min.js"></script>

		<script src="https://unpkg.com/vue"></script>
		<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/vue-resource/1.3.4/vue-resource.min.js"></script>

		<script type="text/javascript">
			Vue.http.headers.common['X-CSRF-TOKEN'] = document.querySelector('#token').getAttribute('value');
			var english = /^[A-Za-z0-9]*$/;
		</script>

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
				$('.user_top_sm_menu, .leftmenuarea_sm').on('change', function(){
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
