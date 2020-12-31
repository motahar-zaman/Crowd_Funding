@extends('admin.layouts.main')

@section('custom_css')
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
		.bg-div{
			background-color: #c6c6c6;
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
		.bg-div{
				background-color: #c6c6c6;
		}			
	</style>




<!-- <link rel="stylesheet" href="https://cdn.datatables.net/1.10.13/css/dataTables.bootstrap.min.css"> -->
<!-- <link rel="stylesheet" href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap4.min.css"> -->
@stop

@section('content')
<div class="row">
	<div class="offset-md-1 col-md-10 col-12">
		<div class="mt20">
			<div class="row">

				<div class="col-md-11">

					<div class="row ml-md-1 well">
						<div class="col-md-12 col-12">
							<div class="row inner mt-2">
								<div class=" col-3 bg-div">
									<p class="pt-3 ">対応状況 </p>
								</div>

								@foreach ($orderDetailsFull as $orderDetail)
								@if($orderDetail->status==1)
									<div class=" col-3 border">
										<p class="pt-3">新規受注</p>
									</div>
								@elseif($orderDetail->status==2)
									<div class=" col-3 border">
										<p class="pt-3">配送準備中</p>
									</div>
								@elseif($orderDetail->status==3)
									<div class=" col-3 border">
										<p class="pt-3">配送済み</p>
									</div>
								@elseif($orderDetail->status==4)
									<div class=" col-3 border">
										<p class="pt-3">キャンセル</p>
									</div>
								@endif
								@endforeach
								<div class="col-6">
									<span class="pull-right"><a href="#" onclick="window.print()"><i class="fa fa-print" style="font-size: 35px; color: #000000;"></i></a></span>
								</div>
							</div>
							<div class="row inner mt-2">
								<div class="col-md-2 col-3 bg-div">
									<p class="pt-3 ">注文ID </p>
								</div>
								<div class="col-md-4 col-3 border">
									<p class="pt-3">{{ $order->order_no }}</p>

								</div>
									<div class="col-md-2 col-3 bg-div">
										<p class="pt-3 ">配送会社</p>
									</div>
									<div class="col-md-4 col-3 border">
										<p class="pt-3">{{$order->shipping_company}}</p>

									</div>
							</div>
							<div class="row inner mb-5">
								<div class="col-md-2 col-3 bg-div">
									<p class="pt-3 ">氏名</p>
								</div>
								<div class="col-md-4 col-3 border">
									<p class="pt-3">
											{{ $order->user->first_name }}&nbsp;{{ $order->user->last_name }}
									</p>

								</div>
									<div class="col-md-2 col-3 bg-div">
										<p class="pt-3 ">伝票番号</p>
									</div>
									<div class="col-md-4 col-3 border">
									<p class="pt-3">{{$order->document_number}}</p>
									</div>
							</div>

							<div class="row inner mt-5">

								<div class="table table-responsive col-lg-12 p-md-1 mt-5">
									<table class="table">
										<tr class="bg-div">
											<td class="text-center">商品ID</td>
											<td class="text-center">商品名</td>
											<td class="text-center">色</td>
											<td class="text-center">サイズ</td>
											<td class="text-center">価格</td>
											<td class="text-center">個数</td>
											<td class="text-center">小計</td>

										</tr>
										@php
											$total = 0;
										@endphp
										@if ($orderDetails)

											@foreach ($orderDetails as $orderDetail)
												<tr class=" table-bordered">
													<td class="text-center">{{ $orderDetail->product->id }}</td>
													<td class="text-center">{{ $orderDetail->product->title }}</td>
													<td class="text-center">{{ $orderDetail->color }}</td>
													<td class="text-center">L</td>
													<td class="text-center">{{ number_format($orderDetail->product->price) }}</td>
													<td class="text-center">{{ number_format($orderDetail->qty) }}</td>
													<td class="text-center">{{ number_format($orderDetail->product->price * $orderDetail->qty) }}</td>
												</tr>
												@php
													$total += ($orderDetail->product->price * $orderDetail->qty);
												@endphp
											@endforeach
										@endif
										<tr class="">
											<td class="text-center"></td>
											<td class="text-center"></td>
											<td class="text-center"></td>
											<td class="text-center"></td>
											<td class="text-center"></td>
											<td class="text-center bg-div table-bordered">合計</td>
											<td class="text-center table-bordered">{{ number_format($total) }}</td>
										</tr>
									</table>
								</div>
							</div>

							<div class="row mt-5">
								<h4 class="col-md-2 col-4 p-0 m-0">配送先</h4>
							</div>
							<div class="row inner mt-3">
								<div class="col-md-2 col-3 bg-div">
									<p class="pt-3 ">氏名</p>
								</div>
								<div class="col-md-10 col-8 border">
									<p class="pt-3">{{ $order->user->first_name }} &nbsp;{{ $order->user->last_name }} </p>
								</div>
							</div>
							<div class="row inner">
								<div class="col-md-2 col-3 bg-div">
									<p class="pt-3 ">フリガナ</p>
								</div>
								<div class="col-md-10 col-8 border">
									<p class="pt-3">{{ $order->user->first_name }} &nbsp;{{ $order->user->last_name }}</p>
								</div>
							</div>
							<div class="row inner">
								<div class="col-md-2 col-3 bg-div">
									<p class="pt-3 ">電話番号</p>
								</div>
								<div class="col-md-10 col-8 border">
									<p class="pt-3">
										@if ($order->custom_phone_no)
											{{ $order->custom_phone_no }}
										@else
											{{ $order->user->profile->phone_no }}
										@endif
									</p>
								</div>
							</div>
							<div class="row inner">
								<div class="col-md-2 col-3 bg-div">
									<p class="pt-3 ">郵便番号</p>
								</div>
								<div class="col-md-10 col-8 border">
									<p class="pt-3">
										@if ($order->custom_postal_code)
											{{ $order->custom_postal_code }}
										@else
											{{ $order->user->shipping_postal_code }}
										@endif
									</p>
								</div>
							</div>
							<div class="row inner">
								<div class="col-md-2 col-3 bg-div">
									<p class="pt-3 "> 都道府県</p>
								</div>
								<div class="col-md-10 col-8 border">
									<p class="pt-3">  {{ $order->user->shipping_prefecture }}</p>
								</div>
							</div>
							<div class="row inner">
								<div class="col-md-2 col-3 bg-div">
									<p class="pt-3 ">
										住所
									</p>
								</div>
								<div class="col-md-10 col-8 border">
									<p class="pt-3">
										@if ($order->custom_postal_code)
											{{ $order->custom_address }}
										@else
											{{ $order->user->profile->address }}
										@endif
									</p>
								</div>
							</div>

							<div class="row mt-5">
								<h4 class="col-md-2 col-6 p-0 m-0">注文者情報</h4>
							</div>
							<div class="row inner mt-3">
								<div class="col-md-2 col-3 bg-div">
									<p class="pt-3 ">氏名</p>
								</div>
								<div class="col-md-10 col-8 border">
									<p class="pt-3">{{ $order->user->first_name }} &nbsp;{{ $order->user->last_name }}</p>
								</div>
							</div>
							<div class="row inner">
								<div class="col-md-2 col-3 bg-div">
									<p class="pt-3 ">フリガナ</p>
								</div>
								<div class="col-md-10 col-8 border">
									<p class="pt-3">{{ $order->user->first_name }} &nbsp;{{ $order->user->last_name }}</p>
								</div>
							</div>
							<div class="row inner">
								<div class="col-md-2 col-3 bg-div">
									<p class="pt-3 "> メールアドレス</p>
								</div>
								<div class="col-md-10 col-8 border">
									<p class="pt-3"> {{ $order->user->email }} </p>
								</div>
							</div>
							<div class="row inner">
								<div class="col-md-2 col-3 bg-div">
									<p class="pt-3 ">電話番号</p>
								</div>
								<div class="col-md-10 col-8 border">
									<p class="pt-3">
										@if ($order->custom_phone_no)
											{{ $order->custom_phone_no }}
										@else
											{{ $order->user->profile->phone_no }}
										@endif
									</p>
								</div>
							</div>
							<div class="row inner">
								<div class="col-md-2 col-3 bg-div">
									<p class="pt-3 "> 都道府県</p>
								</div>
								<div class="col-md-10 col-8 border">
									<p class="pt-3">   {{ $order->user->shipping_prefecture}} </p>
								</div>
							</div>
							<div class="row inner">
								<div class="col-md-2 col-3 bg-div">
									<p class="pt-3 "> 住所</p>
								</div>
								<div class="col-md-10 col-8 border">
									<p class="pt-3">
										@if ($order->custom_address)
											 {{ $order->custom_address }}
										 @else
											 {{ $order->user->profile->address }}
										 @endif
									</p>
								</div>
							</div>

							<div class="row mt-5">
								<h4 class="col-md-2 col-6 p-0 m-0">支払情報</h4>
							</div>
							<div class="row inner mt-3">
								<div class="col-md-2 col-3 bg-div">
									<p class="pt-3 ">支払い状況</p>
								</div>
								@if($order->payment_status==1)
								<div class="col-md-10 col-8 border">
									<p class="pt-3">入金前</p>
								</div>
								@elseif($order->payment_status==2)
								<div class="col-md-10 col-8 border">
									<p class="pt-3">入金予定</p>
								</div>
								@elseif($order->payment_status==3)
								<div class="col-md-10 col-8 border">
									<p class="pt-3">入金完了</p>
								</div>
								@endif
							</div>
							<div class="row inner">
								<div class="col-md-2 col-3 bg-div">
									<p class="pt-3 ">入金予定日</p>
								</div>
								@if($order->seller_payment_date)
								<div class="col-md-10 col-8 border">
									<p class="pt-3"> {{ date('Y/m/d', strtotime($order->seller_payment_date)) }} </p>
								</div>
								@else
								<div class="col-md-10 col-8 border">
									<p class="pt-3"></p>
								</div>
								@endif
							</div>
							<div class="row inner">
								<div class="col-md-2 col-3 bg-div">
									<p class="pt-3 "> 入金金額</p>
								</div>
								<div class="col-md-10 col-8 border">
									<p class="pt-3"> ￥ {{ number_format($order->total_point)}} </p>
								</div>
							</div>

						</div>
					</div>

					<div class="row p-5">
						<div class="col-md-12 col-12">
							<h4 class="text-center"><a href="{{route('admin-order-list')}}" class="btn btn-md bg-div btn-bottom text-white">< &nbsp;&nbsp; 戻 る</a></h4>
						</div>
					</div>
				</div>
			</div>
		</div>
  </div>
</div>
@include('admin.order.order_modal')

@stop

@section('custom_js')

<script type="text/javascript">
		$(function(){
			$('.modalOption').on('change', function(){
				var row_id = $(this).attr("data-id");
				var select_val = $(this).val();
				var status = 0;
				if (select_val == 1) {
					status = 1;
					document.location.replace('/user/order-details-status-change/'+row_id+'/'+status);
				}else if (select_val == 2) {
					status = 2;
				}else if (select_val == 3) {
					status = 3;
					document.location.replace('/user/order-details-status-change/'+row_id+'/'+status);
				}else if (select_val == 4) {
					status = 4;
				}
			})
		})
	</script>
	<script type="text/javascript">
			$(document).ready(function(){
				$(document).ready(function(){ //Make script DOM ready
				    $('.modalOption').change(function() { //jQuery Change Function
					  var row_id = $(this).attr("data-id");

					  var select_val = $(this).val();

				        if(select_val == 2){
							var status = 2;
				            $('#order1').modal("show");
								$('#order_id1').val(row_id);
								$('#status1').val(status);
				        }
						if(select_val == 4){
							var status = 4;
							$('#order2').modal("show");
							$('#order_id2').val(row_id);

							$('#status2').val(status);
				        }
				    });
				});
			});
	</script>
@stop