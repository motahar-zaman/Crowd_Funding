<header class="front_header">
	<div class="container">
		<div class="row container_div ">
			<div class="col-md-2 col-sm-12">
				<a href="{{route('front-home')}}" class="logo_area" ><img height="50px" src="{{Request::root()}}/assets/front/img/logo.png"></a>
			</div>
			<div class="col-md-10 col-sm-12">
				<div class="row">
					<div class="col-md-12 col-sm-12 user-header-nav">
						<ul class="float-right small-device-login-registration-button-center" style="margin-bottom:0px">
							@if(Auth::user())
								<li>
									@if(Cart::count()==0)
										<a href="{{route('front-cart')}}" style="position:relative;text-decoration:none;">
											<i class="fa fa-shopping-cart fa-flip-horizontal" aria-hidden="true" style="font-size:30px;color:black;"></i>
										</a>
									@else
										<a href="{{route('front-cart')}}" style="position:relative;text-decoration:none;">
											<i class="fa fa-shopping-cart fa-flip-horizontal" aria-hidden="true" style="font-size:30px;color:black;"></i>
											<span id="cartLoad" style="text-align: center" class="bg-warning text-white cart-count circle" >
												@if(Cart::count() < 10)
													{{Cart::count()}}
												@else
													9+
												@endif
											</span>
										</a>
									@endif
								</li>
								<?php
									$pic = parse_url(Auth::user()->pic);

									if(isset($pic['host'])) $pic = Auth::user()->pic;
									else $pic = Request::root().'/uploads/'.Auth::user()->pic;
								?>
								<li >
									<a href="{{ route('user-my-page') }}" class="login_check text-black" style="text-decoration:none;color:black; position:relative;">
										<i class="" aria-hidden="true" style="font-size:22px;color:black;"><img src="{{$pic}}" style="height: 30px; width: 30px; border-radius: 50%;margin-bottom: 5px;" /></i>
										<span style="font-size: 14px;font-family: w3;font-weight: bold;">{{Auth::user()->first_name.' '.Auth::user()->last_name}}</span>
									</a>
								</li>
								<li ><a href="{{route('user-logout')}}" class="btn btn-primary btn-sm" style="height:30px;width: 110px;padding:8px;font-family: w6;margin-bottom: 6px;font-size: 12px;">&nbsp;ログアウト&nbsp;</a></li>
							@else
								<li  style="vertical-align:super" ><a href="{{ route('login') }}" class="btn btn-primary btn-sm" style="height:30px;font-size: 12px;font-family: w6;padding:6px" >{{ __('main.login_title') }}</a></li>
								<li style="vertical-align:super"><a href="{{ route('user-register-request') }}" class="btn btn-warning btn-sm" style="height:30px;font-size: 12px;font-family: w6;padding:6px" >{{ __('main.registration_title') }}</a></li>
							@endif
						</ul>
					</div>
					<div class="col-12 col-sm-12 nav_width" style="padding-top: 0px;">
						<ul class="list-inline float-right top_menu" style="margin-bottom:0px">
							<li class="list-inline-item">
								<a style="font-family: w3;font-size: 16px;" href="{{route('front-about')}}" class="item {{Route::currentRouteName()=='front-about'?'active':''}}">
									{{ __('main.what_is_crofun') }}
								</a>
							</li>
							<li class="list-inline-item">
								<a style="font-family: w3;font-size: 16px;" href="{{route('front-product-list')}}" class="item {{Route::currentRouteName()=='front-product-list'?'active':''}}">
									{{ __('main.product_list') }}
								</a>
							</li>
							<li class="list-inline-item">
								<a style="font-family: w3;font-size: 16px;" href="{{route('front-faq')}}" class="item {{Route::currentRouteName()=='front-faq'?'active':''}}">
									{{ __('main.faq') }}
								</a>
							</li>
							<li class="list-inline-item">
								<a style="font-family: w3;font-size: 16px;" href="{{route('front-media')}}" class="item {{Route::currentRouteName()=='front-media'?'active':''}}">
									{{ __('main.media') }}
								</a>
							</li>
							<li class="list-inline-item" ><a style="font-family: w3;font-size: 16px;" href="{{route('front-contact')}}" class="item {{Route::currentRouteName()=='front-contact'?'active':''}}">お問い合わせ</a></li>
						</ul>

						<select class="top_sm_menu form-control">
							<option value="{{route('front-about')}}" {{Route::currentRouteName()=='front-about'?'selected':''}}>{{ __('main.what_is_crofun') }}</option>
							<option value="{{route('front-product-list')}}" {{Route::currentRouteName()=='front-product-list'?'selected':''}}>{{ __('main.product_list') }}</option>
							<option value="{{route('front-faq')}}" {{Route::currentRouteName()=='front-faq'?'selected':''}}>{{ __('main.faq') }}</option>
							<option value="{{route('front-media')}}" {{Route::currentRouteName()=='front-media'?'selected':''}}>{{ __('main.media') }}</option>
							<option value="{{route('front-contact')}}" {{Route::currentRouteName()=='front-contact'?'selected':''}}>お問い合わせ</option>
						</select>

					</div>
				</div>
			</div>
		</div>
	</div>
</header>