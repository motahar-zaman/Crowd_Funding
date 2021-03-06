@extends('user.layouts.main')

@section('custom_css')
	<style type="text/css">
		.wizard > .steps > ul > li {
		    width: 20%;
		}
		.body{

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
		.heading:after{
			display: block;
			height: 3px;
			background-color: #80b9f2;
			content: "";
			width: 100%;
			margin: 0 auto;
			margin-top: 10px;
			margin-bottom: 30px;
		}
		.bg-dark{
			background-color: #f8f8f8;
		}
		.div-radius{
			border: 3px solid #eaebed;
			border-radius: 5px;
		}
		.div-radius1{
			/* border: 3px solid #eaebed; */
			border-radius: 5px;
		}
		.horizontal:after{
			display: block;
			height: 2px;
			background-color: #999;
			content: "";
			width: 100%;
			margin: 0 auto;
			margin-top: 10px;
			margin-bottom: 45px;
		}
		.bg-danger{
			/* opacity: 0.9 !important; */
			background-color: #ffe3da !important;
		}

	.project_status {
    position: absolute;
    top: 15px;
    left: 3px;
    width: auto;
    padding: 5px;
    padding-left: 15px;
    padding-right: 15px;
    text-align: center;
		background-color: #ff6540;
	}
	.project-item{
		position: relative;
	}
	.icon-info{
		border: 2px solid #ff3300;
		padding-right: 10px;
		padding-left: 10px;
		padding-top: 1px;
		padding-bottom: 1px;
		border-radius: 50%;
		color: #ff3300;
		background-color: #ffffff;


	}
	.bg-white{
		background-color:#fff;
	}
	.content-inner:before{
		display: block;
		height: 2px;
		background-color: #ffbc00;
		content: "";
		width: 100%;
		margin: 0 auto;
		margin-top: 0px;
		margin-bottom: 0px;
	}

.content-inner-arrow{
	-webkit-clip-path: polygon(0 0, 100% 0, 100% 82%, 51% 100%, 0 82%);
	clip-path: polygon(0 0, 100% 0, 100% 82%, 51% 100%, 0 82%);

}
.checked{
	color: #ffbc00;
}
/* .content-inner-arrow:after{
	-webkit-clip-path: polygon(0 0, 100% 0, 100% 82%, 51% 100%, 0 82%);
	clip-path: polygon(0 0, 100% 0, 100% 82%, 51% 100%, 0 82%);
	display: block;
	height: 2px;
	background-color: #81ccff;
	content: "";
	width: 100%;
	margin: 0 auto;
	margin-top: 80px;
	margin-bottom: 0px;

} */
/* .arrow-down {
  width: 0;
  height: 0;
  border-left: 20px solid transparent;
  border-right: 20px solid transparent;

  border-top: 20px solid #f00;
} */




	</style>
@stop


@section('ecommerce')

@stop

@section('content')

@include('user.layouts.tab')
<div class="row bg-white ">
	<div class="container">
		<div class="row justify-content-center">
			<div class=" col-9">
				<div class="mt-5">
					<div class="row">
						<div class="col-md-12">
							<div class="row inner_inner">
								<div class="col-md-6">
									<div class="row">
										<div class="col-md-12 project-item">
											<img src="{{$product->image ? Request::root().'./uploads/products/.'.$product->image : asset('uploads/projects/1615154785167836.jpeg')}}" alt="" class="img-fluid">
										</div>
									</div>
								</div>
								<div class="col-md-6">
									<div class="row ">
										<div class="col-md-8">
											<h6 class="" style="font-size:14px; color:#bfc5cc;"> <span style="color:#bfc5cc;"> <i class="fa fa-tag"></i> </span> {{ $product->company_name }}</h6>
										</div>
										<div class="col-md-4">
											<h6 class="pull-right" style="font-size:14px;"><span style="color:#ed49b6;"> <i class="fa fa-heart"></i> </span>????????????????????????</h6>
										</div>
									</div>
									<div class="row mt-1">
										<div class="col-md-12">
											<span style="font-size:18px; letter-spacing:1px;" class="font-weight-bold"> {{ $product->title }}</span>
											{{-- <h5 style="font-size:16px;" class="font-weight-bold"> ??????????????????</h5> --}}
										</div>
									</div>
									<div class="row mt-3">
										<div class="col-md-12">
											<span style="font-size:14px">{{ $product->description }}
											</span>
										</div>
									</div>
									<div class="row mt-1">
										<div class="col-md-6">
											<p><span class="font-weight-bold" style="font-size:23px; letter-spacing:2px;">{{ $product->price }}</span>
												<span class="" style="font-size:20px; letter-spacing:1px;">????????????</span></p>
											</div>

											<div class="col-md-6 p-0">
												<p class=" mt-2"><span class="fa fa-star checked" style="font-size:20px;"></span>
													<span class="fa fa-star checked" style="font-size:20px;"></span>
													<span class="fa fa-star checked" style="font-size:20px;"></span>
													<span class="fa fa-star " style="font-size:20px;"></span>
													<span class="fa fa-star " style="font-size:20px;"></span>
													(3)</p>
												</div>
											</div>
											<div class="row">
												<div class="col-md-offset-2 mr-0 div-radius ml-3" style="height:55px; width:55px;">
													<p class="pt-2 pb-0 text-center" style="font-size:11px;">?????????  <br>
														@foreach ($product->color as $p_color)
															{{ $p_color->color.',' }}
														@endforeach
													 </p>
													{{-- <p class="p-0 m-0 text-center" style="font-size:12px;"></p> --}}
												</div>
												<div class="col-md-offset-2 mr-0 div-radius ml-2" style="height:55px; width:55px;">
													<p class="pt-2 text-center" style="font-size:11px;">????????? <br>
														@foreach ($product->color as $p_color)
															{{ $p_color->type.',' }}
														@endforeach
													</p>
													{{-- <p class="p-0 text-center" style="font-size:12px;">M</p> --}}
												</div>
												<div class="col-md-offset-6  mr-0 div-radius1 ml-2" style="height: 65px;">
													<form action="{{route('front-cart-add')}}" method="get">
														<input type="hidden" name="id" value="{{$product->id}}">

														<input type="hidden" name="price" value="{{$product->price}}">

														<input type="hidden" name="title" value="{{$product->title}}">



														<input type="hidden" name="quantity" class="add_to_cart_quantity form-control" value="1" required placeholder="??????">
													{{-- <div class=" div-radius1 m-0 p-0" style="height:50px"> --}}
														<button type="submit" class="px-3 text-white btn btn-lg btn-block w6-18" style="background-color:#ffbc00 !important; height:80%;"> <span class="fa fa-shopping-cart px-1"></span> ?????????????????????</button>
													{{-- </div> --}}
												</form>

												</div>
											</div>
											<div class="" id="shareIcons">

											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>









@include('front.layouts.301')

@stop

@section('custom_js')
	<script type="text/javascript">

			$(function() {
				var linkurl  = $('#linkUrl').val();
				$('#shareIcons').jsSocials({
					url : linkurl,
					text : 'laravel for social sharing',
					showLabel : true,
					showCount : "inside",
					shareIn : "popup",
					shares : ["facebook", "twitter", "line"]
				});
			});
	</script>

@stop
