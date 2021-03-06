@extends('main_layout')

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
		.horizontal:before{
			display: block;
			height: 2px;
			background-color: #72c7ff;
			content: "";
			width: 90%;
			margin-top: 10px;
			margin-bottom: 25px;
      margin-left: 15px;;


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
.bg-sky{
  background-color: #e5f5ff;
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
		<div class="mt-3">
			<div class="row justify-content-center">
        <div class="col-md-12 p-0 mb-4">
          <h4 class="text-center mb-4">?????????????????????????????????</h4>
          @include('user.layouts.project-steps', ['step' => 1])
        </div>
        <div class="col-md-10 p-0 mb-4">
					<div class="row">
						<h4 class="pb-3">??????????????????</h4>
						<div class="col-12">
							<div class="row">
								<div class="col-12">
									<label for="">fthfg</label>

								</div>
								<div class="col-12">
									<input type="text" class="form-control" name="" value="">
								</div>
							</div>
						</div>
						<div class="col-12">
							<div class="row">
								<div class="col-12">
									<label for="">fthfg</label>

								</div>
								<div class="col-12">
									<input type="text" class="form-control" name="" value="">
								</div>
							</div>
						</div>
						<div class="col-12">
							<div class="row">
								<div class="col-3">
									<input type="text" class="form-control" name="" value="">
								</div>
								<div class="col-1">
									<p>/</p>
								</div>
								<div class="col-3">
									<input type="text" class="form-control" name="" value="">
								</div>
							</div>
						</div>
						<div class="col-12">
							<label for="">edfsdfsd</label>
							<input type="text" class="form-control" name="" value="">
						</div>
					</div>


        </div>



				<div class="col-md-4 mt-4">
					<a href="#">??? ???</a>
				</div>

			</div>
		</div>
	</div>

		</div>

	</div>
</div>




@stop

@section('custom_js')

@stop
