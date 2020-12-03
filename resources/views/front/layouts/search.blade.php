<form class="form-inline" action="{{route('front-search')}}" method="get">
	<div class="input-group input_search" style="width:100%">
		<input type="text"  style="font-family: w3;font-size: 12px;" class="form-control" placeholder="{{ __('main.search') }}" aria-describedby="basic-addon2" name="title" value="{{Request::get('title')}}">
		<div class="input-group-append" style="background:white;">
			<span class="input-group-text" id="search_control"><i class="fa fa-search"></i></span>
		</div>
	</div>
</form>
