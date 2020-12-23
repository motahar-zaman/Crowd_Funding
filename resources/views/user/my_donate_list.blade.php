@extends('main_layout')
@section('title') 
受援履歴 | Crofun
@stop
@section('custom_css')
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap4.min.css">
	<style type="text/css">
		.wizard > .steps > ul > li {
		    width: 20%;
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
		.dropbtn {
			background-color: transparent;
			color: #000000;
			padding: 16px;
			font-size: 16px;
			border: none;
				border: 2px solid #999;
		}

		.dropdown {
			position: relative;
			display: inline-block;
		}

		.dropdown-content {
			display: none;
			position: absolute;
			background-color: #f1f1f1;
			min-width: 160px;
			box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
			z-index: 1;
		}

		.dropdown-content a {
			color: black;
			padding: 12px 16px;
			text-decoration: none;
			display: block;
		}

		.dropdown-content a:hover {background-color:transparent;}

		.dropdown:hover .dropdown-content {display: block;}

		.dropdown:hover .dropbtn {background-color: transparent;}

		.pagination_area ul.pagination{
			text-align: center;
			display: inline-block;
			margin-top: 30px;
		}
		.pagination_area ul.pagination li{
			display: inline;
			font-size: 12px;
			font-weight: bold;
		}
		.pagination_area ul.pagination li a{
			color: black;
			padding: 8px 8px;
			text-decoration: none;
			transition: background-color .3s;
			border: 1px solid #ddd;
			margin: 4px;
		}
		.pagination_area ul.pagination li a.active{
			background-color: #4CAF50;
			padding: 8px 8px;
			margin: 4px;
			color: white;
			border: 1px solid #4CAF50;
		}
		.pagination_area ul.pagination li.active {
			/*background-color: #4CAF50;*/
			background-color: #687282;
			padding: 8px 8px;
			margin: 4px;
			color: white;
			border: 1px solid #4CAF50;
		}

		/*ul.pagination li a:hover:not(.active) {background-color: #ddd;}*/
		.pagination_area ul.pagination li a:hover {background-color: #999999;}

		.pagination_area ul.pagination li.disabled {
			/*background-color: #cccccc;*/
			color: #ddd;
			padding: 8px 8px;
			border: 1px solid #ddd;
			margin: 4px;
		}
		select.color1, option.color1{
			color: #FF391A;
		}
		select.color2, option.color2{
			color: #FFBC00;
		}
		select.color3, option.color3{
			color: #6BB82D;
		}
		select.color4, option.color4{
			color: #4B4B4B;
		}
		.cbtn{
			background-color: #c6c6c6;
			margin: 5px;
			padding: 3px;
			padding-left: 8px;
			padding-right: 8px;
		}

		.btn-dark{
			background-color: #575757;
		}
		/* @media (max-width: 1370px) {
			.first_tabs ul li a {
				color: #333333;
				text-decoration: none;
				font-size: 15px;
				font-weight: 500;
				font-weight: bold;
				padding-top: 10px;
				padding-bottom: 10px;
				display: inline-block;
			}
		}

		@media (max-width: 1295px) {
			.top_menu li a {
				color: #333333;
				text-decoration: none;
				font-size: 16px !important;
				font-weight: 500;
				margin-left: 20px;
				padding-bottom: 5px;
				font-family: w3;
			}
			.first_tabs ul li a {
				color: #333333;
				text-decoration: none;
				font-size: 13px;
				font-weight: 500;
				font-weight: bold;
				padding-top: 10px;
				padding-bottom: 10px;
				display: inline-block;
			}
		}
		
		@media (max-width: 1170px) {
			.top_menu li a {
				color: #333333;
				text-decoration: none;
				font-size: 15px !important;
				font-weight: 500;
				margin-left: 20px;
				padding-bottom: 5px;
				font-family: w3;
			}
			.first_tabs ul li a {
				color: #333333;
				text-decoration: none;
				font-size: 11px;
				font-weight: 500;
				font-weight: bold;
				padding-top: 10px;
				padding-bottom: 10px;
				display: inline-block;
			}
		}
		@media (max-width: 1080px) {
			.top_menu li a {
				color: #333333;
				text-decoration: none;
				font-size: 12px !important;
				font-weight: 500;
				margin-left: 20px;
				padding-bottom: 5px;
				font-family: w3;
			}
			.first_tabs ul li a {
				color: #333333;
				text-decoration: none;
				font-size: 8px;
				font-weight: 500;
				font-weight: bold;
				padding-top: 10px;
				padding-bottom: 10px;
				display: inline-block;
			}
		}
		@media (max-width: 930px) {
			.top_menu li a {
				color: #333333;
				text-decoration: none;
				font-size: 11px !important;
				font-weight: 500;
				margin-left: 20px;
				padding-bottom: 5px;
				font-family: w3;
			}
			.first_tabs ul li a {
				color: #333333;
				text-decoration: none;
				font-size: 7px;
				font-weight: 500;
				font-weight: bold;
				padding-top: 10px;
				padding-bottom: 10px;
				display: inline-block;
			}
		}
		@media (max-width: 870px) {
			.top_menu li a {
				color: #333333;
				text-decoration: none;
				font-size: 10px !important;
				font-weight: 500;
				margin-left: 20px;
				padding-bottom: 5px;
				font-family: w3;
			}
			.first_tabs ul li a {
				color: #333333;
				text-decoration: none;
				font-size: 7px;
				font-weight: 500;
				font-weight: bold;
				padding-top: 10px;
				padding-bottom: 10px;
				display: inline-block;
			}
		}
		@media (max-width: 870px) {
			.top_menu li a {
				color: #333333;
				text-decoration: none;
				font-size: 9px !important;
				font-weight: 500;
				margin-left: 20px;
				padding-bottom: 5px;
				font-family: w3;
			}
			.first_tabs ul li a {
				color: #333333;
				text-decoration: none;
				font-size: 6px;
				font-weight: 500;
				font-weight: bold;
				padding-top: 10px;
				padding-bottom: 10px;
				display: inline-block;
			}
		} */

	</style>
@stop


@section('ecommerce')

@stop

@section('content')

@include('user.layouts.tab')

<div class="container">
	<div class="row container_div">
		<div class="col-md-12 col-12">
			<div class="mt20">
				{{--@include('user.layouts.order-details-modal-1')
				@include('user.layouts.order-details-modal-2')--}}
				<div class="row">
					<div class="col-md-3">
						@include('user.layouts.profile')
					</div>
					<div class="col-md-9" style="overflow-x:auto;">
						<div class="row">
							<div class="col-md-12 col-12">
								<div class="row inner">
									<div class="col-md-12 col-12 ">
										<div class="px-2 pt-3">
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="mt20 table  text-nowrap " style="overflow-x:auto;overflow-y: hidden">
							<table class="table table-sm table-bordered" id="data-table">
								<thead>
									<tr>
										<th class="text-center">プロジェクト名</th>
										<th class="text-center">応援者</th>
										<th class="text-center">応援金額</th>
										<th class="text-center">Crofunポイント</th>
									</tr>
								</thead>
								<tbody>
									@if($projects)
                                        @foreach($projects as $project)
											<tr>
												<td class="text-left" style="width:45%">
                                                    {{ str_limit($project->title, $limit = 45, $end = '...') }}
												</td>
												<td class="text-center"> 
                                                    <a href="{{ route('user-donate-details',['id' => $project->id])}}">
                                                        {{$project->investment->where('status', true)->count()}} 人
                                                    </a>
                                                </td>
												<td class="text-center">
													<a href="{{ route('user-donate-details',['id' => $project->id])}}">
														{{number_format($project->investment->where('status', true)->sum('amount'))}} 円
													</a>
												</td>
												<td class="text-center">
													<a href="{{ route('user-donate-details',['id' => $project->id])}}">
														{{number_format($project->investment->where('status', true)->sum('point'))}} ポイント
													</a>
												</td>
                                            </tr>
										@endforeach
											{{--<tr>
												<td colspan="7" class="text-center pagination_area">{{ $OrderDetail->links() }}</td>
											</tr>--}}
									@endif
								</tbody>
							</table>
						</div>
					</div>

					@php
						$error = 0;
						if (empty($user->first_name) || empty($user->last_name) || empty($user->profile->phonetic) ||  empty($user->profile->phonetic2) ||  empty($user->profile->postal_code) || empty($user->profile->prefectures) || empty($user->profile->phone_no) || empty($user->profile->municipility)) {
							$error = 1;
						}
						@endphp
						<input type="hidden" name="getError" id="getError" value="{{ $error }}">

				</div>
			</div>
		</div>
	</div>
</div>
{{--@include('user.layouts.message_modal', ['modal_title' => '商品購入者供者へのメッセージ'])
@include('user.layouts.order-details-modal-1')
@include('user.layouts.order-details-modal-2')--}}

@include('user.layouts.profileModal')
@stop

@section('custom_js')

		<!-- <script type="text/javascript">
			$(function(){
				$('.modalOption').on('change', function(){
					var row_id = $(this).attr("data-id");
					var select_val = $(this).val();
						console.log(select_val);
						var status = 0;
					 	if (select_val == 1) {
					 		status = 1;
							document.location.replace('/user/order-status-change/'+row_id+'/'+status);
					 	}else if (select_val == 2) {
							status = 2;
					 	}else if (select_val == 3) {
							status = 3;
							document.location.replace('/user/order-status-change/'+row_id+'/'+status);
					 	}else if (select_val == 4) {
							status = 4;
					 	}
						// console.log(status);

					// alert(searchParams.toString());
				})
			})
		</script> -->


	<script type="text/javascript">
			$(document).ready(function(){
				$('.msg_send_btn').on('click', function(e){
					var user_id = $(this).attr('data-user_id');
					var user_name = $(this).attr('data-project_username');


					$('#to_id').val(user_id);
					$('#project_user_name').val(user_name);
					$('#send-message').modal('show');
					//$('#send-message').addClass('show');
				});
			});
	</script>

	<script type="text/javascript">
	    // var error = document.getElementById('getError').value;
			var error = $('#getError').val();

			// error = 1;
				$(window).on('load',function(){
					console.log('error = ' + error);
						if (error == 1) {
							$('#myModal').modal('show');
						}
				});




			// $('#myModal').modal({
    	// 	backdrop: 'static',
    	// 	keyboard: false  // to prevent closing with Esc button (if you want this too)
			// });
	</script>

	<!-- <script type="text/javascript">
			$(document).ready(function(){
				$(document).ready(function(){ //Make script DOM ready
				    $('.modalOption').change(function() { //jQuery Change Function
							  var row_id = $(this).attr("data-id");
								var row_order_id = $(this).attr("data-order-id");

							  var select_val = $(this).val();
							  //console.log(row_id)
							  //var opval = parseInt($('#shipment'+row_id).val());//Get value from select element
				        if(select_val == 2){ //Compare it and if true
										var status = 2;
				            $('#order1').modal("show"); //Open Modal
										$('#order_id1').val(row_order_id);
										$('#order_detail_id1').val(row_id);

										$('#status1').val(status);

										// console.log($('#order_id1').val());

				        }
								if(select_val == 4){ //Compare it and if true
									var status = 4;
									$('#order2').modal("show"); //Open Modal
									$('#order_id2').val(row_order_id);
									$('#order_detail_id2').val(row_id);

									$('#status2').val(status);
				        }
				    });
				});
			});
	</script> -->

@stop
