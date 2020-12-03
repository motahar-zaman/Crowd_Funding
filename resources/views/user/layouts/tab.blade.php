<section class="first_tabs ">
	<div class="container">
		<div class="row container_div">
			<div class="col-md-12 col-sm-12">
				<ul class="list-inline user_top_menu">
					@if(($user->profile->phonetic) == null ||($user->profile->phonetic2) == null ||($user->profile->phone_no) == null||($user->profile->postal_code) == null||($user->profile->prefectures) == null||($user->profile->municipility) == null ||($user->first_name) == null ||($user->last_name) == null )
						<li class="list-inline-item {{Route::currentRouteName()=='user-my-page'?'active':''}}">
							<a style="font-family: w6;font-size: 14px;" href="{{ route('user-my-page') }}" class="item">マイページ    </a>
						</li>
						<li class="list-inline-item {{Route::currentRouteName()=='user-project-list'?'active':''}}">
							<a style="font-family: w6;font-size: 14px;" href="{{route('user-project-list')}}" class="item">起案プロジェクト </a>
						</li>
						<li class="list-inline-item  {{Route::currentRouteName()=='user-invest-list'?'active':''}} ">
							<a style="font-family: w6;font-size: 14px;" href="{{route('user-invest-list')}}" class="item">支援プロジェクト</a>
						</li>
						<li class="list-inline-item  {{((Route::currentRouteName()=='user-donate-list') || (Route::currentRouteName()=='user-donate-details'))?'active':''}}">
							<a style="font-family: w6;font-size: 14px;" href="{{route('user-donate-list')}}" class="item"> 受援履歴</a>
						</li>
						<li class="list-inline-item {{Route::currentRouteName()=='user-purchase-list'?'active':''}}">
							<a style="font-family: w6;font-size: 14px;" href="{{route('user-purchase-list')}}" class="item">商品購入履歴</a>
						</li>
						<li class="list-inline-item {{Route::currentRouteName()=='user-product-list'?'active':''}}">
							<a style="font-family: w6;font-size: 14px;" href="{{route('user-product-list')}}" class="item">掲載商品</a>
						</li>
						<li class="list-inline-item {{((Route::currentRouteName()=='user-order-list') || (Route::currentRouteName()=='user-order-details'))?'active':''}}">
							<a style="font-family: w6;font-size: 14px;" href="{{route('user-order-list')}}" class="item">受注履歴</a>
						</li>
						<li class="list-inline-item  {{((Route::currentRouteName()=='user-favourite-project-list') || (Route::currentRouteName()=='user-favourite-product-list'))?'active':''}}">
							<a style="font-family: w6;font-size: 14px;" href="{{route('user-favourite-project-list')}}" class="item">お気に入り</a>
						</li>
						<li class="list-inline-item  {{((Route::currentRouteName()=='user-message-inbox') || (Route::currentRouteName()=='user-message-sent') || (Route::currentRouteName()=='user-message-trash') || (Route::currentRouteName()=='show-message'))?'active':''}}">
							<a style="font-family: w6;font-size: 14px;" href="{{route('user-message-inbox')}}" class="item">メッセージ</a>
						</li>
					@else
						<li class="list-inline-item {{Route::currentRouteName()=='user-my-page'?'active':''}}">
							<a style="font-family: w6;font-size: 14px;" href="{{ route('user-my-page') }}" class="item">マイページ </a>
						</li>
						<li class="list-inline-item {{Route::currentRouteName()=='user-project-list'?'active':''}}">
							<a style="font-family: w6;font-size: 14px;" href="{{route('user-project-list')}}" class="item">起案プロジェクト</a>
						</li>
						<li class="list-inline-item  {{Route::currentRouteName()=='user-invest-list'?'active':''}}">
							<a style="font-family: w6;font-size: 14px;" href="{{route('user-invest-list')}}" class="item">支援プロジェクト</a>
						</li>
						<li class="list-inline-item  {{((Route::currentRouteName()=='user-donate-list') || (Route::currentRouteName()=='user-donate-details'))?'active':''}}">
							<a style="font-family: w6;font-size: 14px;" href="{{route('user-donate-list')}}" class="item"> 受援履歴</a>
						</li>
						<li class="list-inline-item {{Route::currentRouteName()=='user-purchase-list'?'active':''}}">
							<a style="font-family: w6;font-size: 14px;" href="{{route('user-purchase-list')}}" class="item">商品購入履歴</a>
						</li>
						<li class="list-inline-item {{Route::currentRouteName()=='user-product-list'?'active':''}}">
							<a style="font-family: w6;font-size: 14px;" href="{{route('user-product-list')}}" class="item">掲載商品</a>
						</li>
						<li class="list-inline-item {{((Route::currentRouteName()=='user-order-list') || (Route::currentRouteName()=='user-order-details'))?'active':''}}">
							<a style="font-family: w6;font-size: 14px;" href="{{route('user-order-list')}}" class="item">受注履歴</a>
						</li>
						<li class="list-inline-item  {{((Route::currentRouteName()=='user-favourite-project-list') || (Route::currentRouteName()=='user-favourite-product-list'))?'active':''}}">
							<a style="font-family: w6;font-size: 14px;" href="{{route('user-favourite-project-list')}}" class="item">お気に入り</a>
						</li>
						<li class="list-inline-item  {{((Route::currentRouteName()=='user-message-inbox') || (Route::currentRouteName()=='user-message-sent') || (Route::currentRouteName()=='user-message-trash') || (Route::currentRouteName()=='show-message'))?'active':''}}">
							<a style="font-family: w6;font-size: 14px;" href="{{route('user-message-inbox')}}" class="item">メッセージ</a>
						</li>
					@endif
				</ul>
				@if (!empty($user->first_name) || !empty($user->last_name) || !empty($user->profile->phonetic) ||  !empty($user->profile->phonetic2) ||  !empty($user->profile->postal_code))
					<select class="user_top_sm_menu form-control">
						<option value="{{route('user-my-page')}}" {{Route::currentRouteName()=='user-my-page'?'selected':''}}>マイページ</option>
						<option value="{{route('user-project-list')}}" {{Route::currentRouteName()=='user-project-list'?'selected':''}}>起案プロジェクト</option>
						<option value="{{route('user-invest-list')}}" {{Route::currentRouteName()=='user-invest-list'?'selected':''}}>支援プロジェクト</option>
						<option value="{{route('user-donate-list')}}" {{((Route::currentRouteName()=='user-donate-list')||(Route::currentRouteName()=='user-donate-details'))?'selected':''}}>受援履歴</option>
						<option value="{{route('user-purchase-list')}}" {{Route::currentRouteName()=='user-purchase-list'?'selected':''}}>商品購入履歴</option>
						<option value="{{route('user-product-list')}}" {{Route::currentRouteName()=='user-product-list'?'selected':''}}>掲載商品</option>
						<option value="{{route('user-order-list')}}" {{((Route::currentRouteName()=='user-order-list') || (Route::currentRouteName()=='user-order-details'))?'selected':''}}>受注履歴</option>
						<option value="{{route('user-favourite-project-list')}}" {{Route::currentRouteName()=='user-favourite-project-list'?'selected':''}}>お気に入り</option>
						<option value="{{route('user-message-inbox')}}" {{((Route::currentRouteName()=='user-message-inbox') || (Route::currentRouteName()=='user-message-sent') || (Route::currentRouteName()=='user-message-trash') || (Route::currentRouteName()=='show-message'))?'selected':''}}>メッセージ</option>
					</select>
				@else
					<select class="user_top_sm_menu form-control">
						<option value="{{route('user-my-page')}}" {{Route::currentRouteName()=='user-my-page'?'selected':''}}>マイページ</option>
						<option value="{{route('user-project-list')}}" {{Route::currentRouteName()=='user-project-list'?'selected':''}} >起案プロジェクト</option>
						<option value="{{route('user-invest-list')}}" {{Route::currentRouteName()=='user-invest-list'?'selected':''}} >支援プロジェクト</option>
						<option value="{{route('user-donate-list')}}" {{((Route::currentRouteName()=='user-donate-list')||(Route::currentRouteName()=='user-donate-details'))?'selected':''}} >受援履歴</option>
						<option value="{{route('user-purchase-list')}}" {{Route::currentRouteName()=='user-purchase-list'?'selected':''}} >商品購入履歴</option>
						<option value="{{route('user-product-list')}}" {{Route::currentRouteName()=='user-product-list'?'selected':''}} >掲載商品</option>
						<option value="{{route('user-order-list')}}" {{((Route::currentRouteName()=='user-order-list') || (Route::currentRouteName()=='user-order-details'))?'selected':''}} >受注履歴</option>
						<option value="{{route('user-favourite-project-list')}}" {{Route::currentRouteName()=='user-favourite-project-list'?'selected':''}}>お気に入り</option>
						<option value="{{route('user-message-inbox')}}" {{((Route::currentRouteName()=='user-message-inbox') || (Route::currentRouteName()=='user-message-sent') || (Route::currentRouteName()=='user-message-trash') || (Route::currentRouteName()=='show-message'))?'selected':''}}>メッセージ</option>
					</select>
				@endif
			</div>
		</div>
	</div>
</section>
