<style type="text/css">
	.carousel-caption{
		/*bottom: 20% !important;*/
	}
	.btn-cta{
		padding-top: 15px;
		padding-bottom: 15px;
	}
</style>

<div class="banner_slider" id="slideshow" style="visibility:hidden;">
	<div class="slide_item">
		<img class="d-block w-100 img-fluid" src="{{Request::root()}}/assets/front/img/slider_1.jpg" alt="First slide" >
		<h2 class=" banner-text">クロファンはカタログを取り入れた起案者にやさしい<br>新しい形のクラウドファンディングサイトです。</h2>
		@if(Auth::check())
			@if(($user->profile->phonetic) == null ||($user->profile->phonetic2) == null ||($user->profile->phone_no) == null||($user->profile->postal_code) ==null||($user->profile->prefectures) == null||($user->profile->municipility) == null ||($user->first_name) == null ||($user->last_name) == null  )						
				<div class="action_area">
					<div href="" class="btn btn-primary btn-cta profileModal">プロジェクトを起案する</div>
				</div>
			@else
				<div class="action_area">
					<a href="{{ route('user-project-add') }}" class="btn btn-primary btn-cta">プロジェクトを起案する</a>
				</div>
			@endif
		@else
			<div class="action_area">
				<a href="{{ route('login-home-action') }}" class="btn btn-primary btn-cta">プロジェクトを起案する</a>
			</div>
		@endif
	</div>
	<div class="slide_item">
		<img class="d-block w-100 img-fluid" src="{{Request::root()}}/assets/front/img/slider_2.jpg" alt="Second slide" >
		<h2 class="banner-text">クロファンはカタログを取り入れた起案者にやさしい<br>新しい形のクラウドファンディングサイトです。</h2>

		@if(Auth::check())
			@if(($user->profile->phonetic) == null ||($user->profile->phonetic2) == null ||($user->profile->phone_no) == null||($user->profile->postal_code) ==null||($user->profile->prefectures) == null||($user->profile->municipility) == null ||($user->first_name) == null ||($user->last_name) == null  )						
				<div class="action_area">
					<div href="" class="btn btn-primary btn-cta profileModal">プロジェクトを起案する</div>
				</div>
			@else
				<div class="action_area">
					<a href="{{ route('user-project-add') }}" class="btn btn-primary btn-cta">プロジェクトを起案する</a>
				</div>
			@endif
		@else
			<div class="action_area">
				<a href="{{ route('login-home-action') }}" class="btn btn-primary btn-cta">プロジェクトを起案する</a>
			</div>
		@endif
	</div>
	<div class="slide_item">
		<img class="d-block w-100  img-fluid" src="{{Request::root()}}/assets/front/img/slider_3.jpg" alt="Third slide" >
		<h2 class="banner-text">クロファンはカタログを取り入れた起案者にやさしい<br>新しい形のクラウドファンディングサイトです。</h2>

		@if(Auth::check())
			@if(($user->profile->phonetic) == null ||($user->profile->phonetic2) == null ||($user->profile->phone_no) == null||($user->profile->postal_code) ==null||($user->profile->prefectures) == null||($user->profile->municipility) == null ||($user->first_name) == null ||($user->last_name) == null  )						
				<div class="action_area">
					<div href="" class="btn btn-primary btn-cta profileModal">プロジェクトを起案する</div>
				</div>
			@else
				<div class="action_area">
					<a href="{{ route('user-project-add') }}" class="btn btn-primary btn-cta">プロジェクトを起案する</a>
				</div>
			@endif
		@else
			<div class="action_area">
				<a href="{{ route('login-home-action') }}" class="btn btn-primary btn-cta">プロジェクトを起案する</a>
			</div>
		@endif
	</div>
</div>