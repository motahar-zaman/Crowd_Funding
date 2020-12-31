<!DOCTYPE html>
<html lang="en">
	<head>
		<title>{{isset($page_title)?$page_title:'Crofun Admin'}}</title>
		<!-- Required meta tags -->
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<!-- Bootstrap CSS -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">

		<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

		<link rel="stylesheet" type="text/css" href="{{Request::root()}}/assets/admin/css/style.css">

		@yield('custom_css')
	</head>
	<body>
		<div class="side-menu">
			<nav class="navbar navbar-toggleable-md navbar-light">				
				<a class="navbar-brand text-white" href="#">CROFUN</a>
			</nav>
			<ul class="sidebar-nav">
                <li>
                    <a href="{{route('admin-dashboard')}}"><i class="fa fa-home" aria-hidden="true"></i>  ダッシュボード</a>
                </li>
				<!-- project category -->
                <li>
                    <a href="{{route('admin-project-category-list')}}"><i class="fa fa-home" aria-hidden="true"></i> プロジェクト カテゴリ</a>
                </li>
                <!-- product category -->
                <li>
                    <a href="{{route('admin-product-category-list')}}"><i class="fa fa-home" aria-hidden="true"></i> カタログ カテゴリ</a>
                </li>
                <li>
                    <a href="{{route('admin-content-list')}}"><i class="fa fa-home" aria-hidden="true"></i> コンテンツ管理 </a>
                </li>
				<!-- Message  -->
				<li>
                    <a href="{{route('admin-message-list')}}"><i class="fa fa-home" aria-hidden="true"></i>メッセージ管理 </a>
                </li>
				<!-- Contact us  -->
                <li>
                    <a href="{{route('admin-contact-us-list')}}"><i class="fa fa-home" aria-hidden="true"></i> お問合せ </a>
                </li>
				<!-- Admin list  -->
                <li>
                    <a href="{{route('admin-admin-user-list')}}"><i class="fa fa-home" aria-hidden="true"></i> 管理者リスト</a>
                </li>
	        </ul>
		</div>

		<header>
			<nav class="navbar navbar-expand-lg navbar-light bg-light">
			  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
			    <span class="navbar-toggler-icon"></span>
			  </button>
			  <div class="collapse navbar-collapse" id="navbarText">
			    <ul class="navbar-nav mr-auto">
			    </ul>
			    <div class="btn-group my-2 my-lg-0">
					  <!-- <a class="dropdown-toggle nav-item" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" href="#">
					    This dropdown's menu is right-aligned
					  </a> -->
					  <a class="navbar-brand dropdown-toggle" href="#"  data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
					    <img src="https://wordsmith.org/words/images/avatar2_large.png" width="30" height="30" class="d-inline-block align-top rounded-circle" alt="">
					    {{Auth::guard('admin')->user()->name}}
					  </a>
					  <div class="dropdown-menu dropdown-menu-right">
							<a class="dropdown-item" href="{{route('admin-change-password')}}">Change Password</a>
							<div class="dropdown-divider"></div>
							<a class="dropdown-item" href="{{route('admin-logout')}}">Logout</a>
					  </div>
					</div>
			  </div>
			</nav>
		</header>
		<main>
			<div class="content-wrapper">
				<p>
					<div class="page-heading pl-4">{{isset($title)?$title:''}}</div>
				</p>
				@yield('content')
			</div>
		</main>
		<footer></footer>

		<!-- jQuery first, then Tether, then Bootstrap JS. -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>

		@yield('custom_js')
	</body>
</html>