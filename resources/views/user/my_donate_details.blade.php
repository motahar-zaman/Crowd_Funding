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

		button:focus {
			outline: 0px dotted !important;
			outline: 0px auto -webkit-focus-ring-color !important;
		}

		button:focus,
		textarea:focus,
		input:focus {
			outline: 0 !important;
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
					<div class="col-md-9">
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
						<div class="mt20 table ">
							<table class="table table-sm table-bordered text-nowrap" id="data-table" >
								<thead>
									<tr>
										<th class="text-center">応援日</th>
										<th class="text-center">応援額</th>
										<th class="text-center">リターン名</th>
										<th class="text-center">ポイント</th>
										<th class="text-center">応援者情報</th>
									</tr>
								</thead>
								<?php
									// echo $doanteDetails[0]->rewardname->reward->is_other;
									// exit;
								?>
								<tbody>
									@if($doanteDetails)
                                        @foreach($doanteDetails as $project)
											<tr>
												<td class="text-center my-auto" style="width:15%">
                                                    {{str_limit($project->created_at, $limit = 11, $end = '')}}
												</td>
												<td class="text-center my-auto" style="width:10%"> 
                                                    {{ $project->amount }} 円
                                                </td>
												<td class="text-center my-auto" style="width:45%">{{str_limit($project->rewardname->reward->is_other, $limit = 35, $end = '...')}}</td>
												<td class="text-center my-auto" style="width:15%">{{$project->point}} ポイント</td>
												<td class="text-center" style="width:15%">
													<div 
														class="user_address_details" 
														data-user_contact="{{$project->user->shipping_phone_num }} "
														data-user_shipping_postal_code="{{$project->user->shipping_postal_code }} "
														data-user_shipping_prefecture="{{$project->user->shipping_prefecture }} "
														data-user_shipping_municipility="{{$project->user->shipping_municipility }} "
														data-user_shipping_address="{{$project->user->shipping_address }} "
														style="cursor:pointer;color:#0275d8"
													>
														{{$project->user->first_name.' '.$project->user->last_name}}</div>
                                             
													<button class="p-2 text-white btn btn-md btn-block msg_send_btn btn-default w6-14" data-user_id="{{$project->user_id }}" data-project_username="{{$project->user->first_name.' '.$project->user->last_name }}" style="cursor:pointer; color:#fff;"> <span style="color:#fff !important;">
														 <i class="fa fa-envelope"></i> </span>メッセージを送る
													</button>

												 {{--<a href="#" class="text-white btn btn-md font-weight-bold cbtn"><span style="color:#fff !important;"> <i class="fa fa-envelope"></i> </span>メッセージを送る</a>--}}
												</td>
                                            </tr>
										@endforeach
									@endif
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@include('user.layouts.message_modal', ['modal_title' => ' 応援者へのメッセージ'])
@include('user.layouts.user_address')



@stop

@section('custom_js')


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
			$(document).ready(function(){
				$('.user_address_details').on('click', function(e){
					var contact_number = $(this).attr('data-user_contact');
					var postal_code = $(this).attr('data-user_shipping_postal_code');
					var prefecture = $(this).attr('data-user_shipping_prefecture');
					var municipility = $(this).attr('data-user_shipping_municipility');
					var address = $(this).attr('data-user_shipping_address');


					$('#contact_number').val(contact_number);
					$('#postal_code').val(postal_code);
					$('#prefecture').val(prefecture);
					$('#municipility').val(municipility);
					$('#address').val(address);
					// $('#project_user_name').val(user_name);
					$('#send-address').modal('show');
					//$('#send-message').addClass('show');
				});
			});
	</script>

@stop
