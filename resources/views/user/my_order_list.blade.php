@extends('main_layout')
@section('title') 
受注履歴 | Crofun
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
		button:focus,
		textarea:focus,
		input:focus {
			outline: 0 !important;
		}
		.bold{
			font-weight: bold;
		}

		@media(max-width:1250px){
			.status-font{
				font-size:12px;
			}
		}
	</style>
@stop


@section('ecommerce')

@stop

@section('content')

@include('user.layouts.tab')

<div class="container">
	<div class="row container_div">
		<div class="col-md-12 col-12 ">
			<div class="mt20">
				<div class="row">
					<div class="col-md-3">
						@include('user.layouts.profile')
					</div>
					<div class="col-md-9 project-details-block-padding">
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
						{{--@include('user.layouts.notifications')--}}
						<div class="mt20 table"  style="overflow-x:auto;overflow-y: hidden">
							<table class="table table-sm table-bordered text-nowrap" id="data-table">
								<thead>
									<tr>
										<th>注文ID</th>
										<th>注文日</th>
										<th>購入金額</th>
										<th>注文者情報</th>
										<th>対応状況</th>
										<th>入金状況</th>
										<th>入金予定額</th>
									</tr>
								</thead>
								<tbody>
									@if($OrderDetail)
										@foreach($OrderDetail as $OrderDetailData)
											<tr>
												<td >
													{{-- {{ $OrderDetailData->order->id }} --}}
													<a href="{{ route('user-order-details', ['id' => $OrderDetailData->order->id]) }}"class="{{ $OrderDetailData->order->is_read==1?'':'bold'}}">
														{{ $OrderDetailData->order->order_no }}
													</a>
												</td>
												<td class="{{ $OrderDetailData->order->is_read==1?'':'bold'}}">{!! date("Y/m/d", strtotime($OrderDetailData->created_at)) !!}</td>
												<td class="{{ $OrderDetailData->order->is_read==1?'':'bold'}}">{{ number_format($OrderDetailData->order->total_point) }}</td>
												<td class="{{ $OrderDetailData->order->is_read==1?'':'bold'}}">
													{{ $OrderDetailData->order->order_by->first_name }}&nbsp;&nbsp;{{ $OrderDetailData->order->order_by->last_name }}
													<br>
													<button class="p-2 text-white btn btn-md btn-block w6-14 msg_send_btn btn-default" data-user_id="{{$OrderDetailData->order->order_by->id }}" data-project_username="{{$OrderDetailData->order->order_by->first_name.' '.$OrderDetailData->order->order_by->last_name }}" style="cursor:pointer; color:#fff;"> <span style="color:#fff !important;">
														 <i class="fa fa-envelope"></i> </span>メッセージを送る
													</button>

													{{-- <a href="#" class="text-white btn btn-md w6-14 cbtn"><span style="color:#fff !important;"> <i class="fa fa-envelope"></i> </span>メッセージを送る</a> --}}
												</td>
												<td class="status-font">
													<?php
														$class_data = 'color'.$OrderDetailData->status;
													?>
													@if($OrderDetailData->status == 1)
														<select class="form-control order_actions modalOption {{ $class_data }}" id="" data-id = {{ $OrderDetailData->id }} data-order-id = {{ $OrderDetailData->order->id }}>
															<option datahref="{{ route('user-order-status-change',['id'=>$OrderDetailData->id, 'status'=>1]) }}" class="color1 status-font" value="1"  @if($OrderDetailData->status == 1) selected @endif>新規受注</option>
															<option datahref="{{ route('user-order-status-change',['id'=>$OrderDetailData->id, 'status'=>2]) }}" class="color2 status-font" value="2"  @if($OrderDetailData->status == 2) selected @endif>配送準備中</option>
															<option datahref="{{ route('user-order-status-change',['id'=>$OrderDetailData->id, 'status'=>3]) }}" class="color3 status-font" value="3"  @if($OrderDetailData->status == 3) selected @endif>  配送済み</option>
															<option datahref="{{ route('user-order-status-change',['id'=>$OrderDetailData->id, 'status'=>4]) }}" value="4" class="color4 status-font" @if($OrderDetailData->status == 4) selected @endif>キャンセル</option>
														</select>
													@elseif($OrderDetailData->status == 2)
														<select class="form-control order_actions modalOption {{ $class_data }}" id="" data-id = {{ $OrderDetailData->id }} data-order-id = {{ $OrderDetailData->order->id }}>
															<option datahref="{{ route('user-order-status-change',['id'=>$OrderDetailData->id, 'status'=>2]) }}" class="color2 status-font" value="2"  @if($OrderDetailData->status == 2) selected @endif>配送準備中</option>
															<option datahref="{{ route('user-order-status-change',['id'=>$OrderDetailData->id, 'status'=>3]) }}" class="color3 status-font" value="3"  @if($OrderDetailData->status == 3) selected @endif>  配送済み</option>
														</select>
													@elseif($OrderDetailData->status == 3)
														<select class="form-control order_actions modalOption {{ $class_data }}" id="" data-id = {{ $OrderDetailData->id }} data-order-id = {{ $OrderDetailData->order->id }}>
															<option datahref="{{ route('user-order-status-change',['id'=>$OrderDetailData->id, 'status'=>3]) }}" class="color3 status-font" value="3"  @if($OrderDetailData->status == 3) selected @endif>  配送済み</option>
														</select>
													@elseif($OrderDetailData->status == 4)
														<select class="form-control order_actions modalOption {{ $class_data }}" id="" data-id = {{ $OrderDetailData->id }} data-order-id = {{ $OrderDetailData->order->id }}>
															<option datahref="{{ route('user-order-status-change',['id'=>$OrderDetailData->id, 'status'=>4]) }}" value="4" class="color4 status-font" @if($OrderDetailData->status == 4) selected @endif>キャンセル</option>
														</select>
													@endif
												</td>
												<td class="{{ $OrderDetailData->order->is_read==1?'':'bold'}}">
													{{-- @if($OrderDetailData->status==0)
														<span class="text-info">保留中</span>
										            @elseif($OrderDetailData->status==1)
										            	<span class="text-success">アクティブ</span>
										            @elseif($OrderDetailData->status==2)
										            	<span class="text-primary">届いた</span>
										            @elseif($OrderDetailData->status==3)
										            	<span class="text-warning">ホールド</span>
										            @elseif($OrderDetailData->status==4)
										            	<span class="text-danger">拒否された</span>
										            @else
										            	<span class="text-default">未知の</span>
													@endif --}}
													@if($OrderDetailData->order->payment_status==1)
														<span >入金前</span>
													@elseif($OrderDetailData->order->payment_status==2)
														<span>入金予定</span>
													@elseif($OrderDetailData->order->payment_status==3)
														<span>入金完了</span>
													@endif
												</td>
												<td class="{{ $OrderDetailData->order->is_read==1?'':'bold'}}">{{ number_format($OrderDetailData->product->price) }}</td>
											</tr>
										@endforeach
											<tr>
												<td colspan="7" class="text-center pagination_area">{{ $OrderDetail->links() }}</td>
											</tr>
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
@include('user.layouts.message_modal', ['modal_title' => '商品購入者供者へのメッセージ'])
@include('user.layouts.order-details-modal-1')
@include('user.layouts.order-details-modal-2')
@include('user.layouts.profileModal')
@stop

@section('custom_js')

		<script type="text/javascript">
			$(function(){
				$('.modalOption').on('change', function(){
					var row_id = $(this).attr("data-id");
					var row_order_id = $(this).attr("data-order-id");
					var select_val = $(this).val();
						console.log(select_val);
						var status = 0;
					 	if (select_val == 1) {
					 		status = 1;
							document.location.replace('/user/order-status-change/'+row_id+'/'+status);
					 	}else if (select_val == 2) {
							status = 2;
							document.location.replace('/user/order-status-change/'+row_id+'/'+status);
					 	}else if (select_val == 3) {
							status = 3;
							// $('#order1').modal("show");
							$('#order1').modal({
								backdrop: 'static',
								keyboard: false
							})
							$('.order1').modal("show"); //Open Modal
							$('.order_id1').val(row_order_id);
							$('.order_detail_id1').val(row_id);

							$('.status1').val(status);
							$('.close').on('click',function(){
								location.reload();
							})
					 	}else if (select_val == 4) {
							status = 4;
							var status = 4;
							$('#order2').modal({
								backdrop: 'static',
								keyboard: false
							})
							$('.order2').modal("show"); //Open Modal
							$('.order_id2').val(row_order_id);
							$('.order_detail_id2').val(row_id);

							$('.status2').val(status);
							$('.close').on('click',function(){
								location.reload();
							})
					 	}
						// console.log(status);

					// alert(searchParams.toString());
				})
			})
		</script>

	<script type="text/javascript">
		var error = $('#getError').val();
			$(window).on('load',function(){
				console.log('error = ' + error);
				if (error == 1) {
					$('#myModal').modal('show');
				}
			});
	</script>

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
