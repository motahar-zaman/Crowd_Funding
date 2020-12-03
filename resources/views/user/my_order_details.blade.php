@extends('main_layout')
@section('title') 
受注履歴 | Crofun
@stop
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
		.bg-dark{
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
		.bg-dark{
				background-color: #c6c6c6;
		}		
		button:focus,
		textarea:focus,
		input:focus {
			outline: 0 !important;
		}
	
		

	</style>
@stop


@section('ecommerce')

@stop

@section('content')

@include('user.layouts.tab')


<div class="container">
	<div class="row container_div">
		<div class=" col-md-12 col-12">
			<div class="mt20">
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
						<div class="row ml-md-1 well">
							<div class="col-md-12 col-12">
								<div class="row">
									<?php
											$class_data = 'color1';
									?>
									<div class="col-2"><p>対応状況</p></div>
									<div class="col-3">
										@foreach($orderDetailsFull as $OrderDetailData)
											@if($OrderDetailData->status == 1)
												<select class="form-control order_actions modalOption {{ $class_data }}" id="" data-id = {{ $OrderDetailData->id }} data-order-id = {{ $OrderDetailData->order->id }}>
													<option datahref="{{ route('user-order-status-change',['id'=>$OrderDetailData->id, 'status'=>1]) }}" class="color1" value="1"  @if($OrderDetailData->status == 1) selected @endif>新規受注</option>
													<option datahref="{{ route('user-order-status-change',['id'=>$OrderDetailData->id, 'status'=>2]) }}" class="color2" value="2"  @if($OrderDetailData->status == 2) selected @endif>配送準備中</option>
													<option datahref="{{ route('user-order-status-change',['id'=>$OrderDetailData->id, 'status'=>3]) }}" class="color3" value="3"  @if($OrderDetailData->status == 3) selected @endif>  配送済み</option>
													<option datahref="{{ route('user-order-status-change',['id'=>$OrderDetailData->id, 'status'=>4]) }}" value="4" class="color4" @if($OrderDetailData->status == 4) selected @endif>キャンセル</option>
												</select>
											@elseif($OrderDetailData->status == 2)
												<select class="form-control order_actions modalOption {{ $class_data }}" id="" data-id = {{ $OrderDetailData->id }} data-order-id = {{ $OrderDetailData->order->id }}>
													<option datahref="{{ route('user-order-status-change',['id'=>$OrderDetailData->id, 'status'=>2]) }}" class="color2" value="2"  @if($OrderDetailData->status == 2) selected @endif>配送準備中</option>
													<option datahref="{{ route('user-order-status-change',['id'=>$OrderDetailData->id, 'status'=>3]) }}" class="color3" value="3"  @if($OrderDetailData->status == 3) selected @endif>  配送済み</option>
												</select>
											@elseif($OrderDetailData->status == 3)
												<select class="form-control order_actions modalOption {{ $class_data }}" id="" data-id = {{ $OrderDetailData->id }} data-order-id = {{ $OrderDetailData->order->id }}>
													<option datahref="{{ route('user-order-status-change',['id'=>$OrderDetailData->id, 'status'=>3]) }}" class="color3" value="3"  @if($OrderDetailData->status == 3) selected @endif>  配送済み</option>
												</select>
											@elseif($OrderDetailData->status == 4)
												<select class="form-control order_actions modalOption {{ $class_data }}" id="" data-id = {{ $OrderDetailData->id }} data-order-id = {{ $OrderDetailData->order->id }}>
													<option datahref="{{ route('user-order-status-change',['id'=>$OrderDetailData->id, 'status'=>4]) }}" value="4" class="color4" @if($OrderDetailData->status == 4) selected @endif>キャンセル</option>
												</select>
											@endif
										@endforeach
										{{--<select class="form-control order_actions modalOption {{ $class_data }}" id="" data-id = {{ $order->id }}>
											<option  class="color1" value="1"  @if($order->status == 1) selected @endif>新規受注</option>
											<option  class="color2" value="2"  @if($order->status == 2) selected @endif>配送準備中</option>
											<option  class="color3" value="3"  @if($order->status == 3) selected @endif>  配送済み</option>
											<option  value="4" class="color4" @if($order->status == 4) selected @endif>キャンセル</option>
										</select>--}}
									</div>
									<div class="col-7">
										<span class="pull-right"><a href="#" onclick="window.print()"><i class="fa fa-print" style="font-size: 35px; color: #000000;"></i></a></span>
									</div>
								</div>

								<div class="row inner mt-2">
									<div class="col-md-2 col-3 bg-dark">
										<p class="pt-3 ">注文ID </p>
									</div>
									<div class="col-md-4 col-3 border">
										<p class="pt-3">{{ $order->order_no }}</p>
									</div>
									<div class="col-md-2 col-3 bg-dark">
										<p class="pt-3 ">伝票番号</p>
									</div>
									<div class="col-md-4 col-3 border">
										<p class="pt-3" id="doc_number">{{$order->document_number}}</p>
									</div>
								</div>
								<div class="row inner mb-2">
									<div class="col-md-2 col-3 bg-dark">
										<p class="pt-3 ">氏名</p>
									</div>
									<div class="col-md-4 col-3 border">
										<p class="pt-3">
											{{ $order->user->first_name }}&nbsp;{{ $order->user->last_name }}
										</p>
									</div>
									<div class="col-md-2 col-3 bg-dark">
										<p class="pt-3 ">配送会社</p>
									</div>
									<div class="col-md-4 col-3 border">
										<p class="pt-3" id="ship_company">{{$order->shipping_company}}</p>
									</div>
								</div>
								<div class="col-md-12 text-right p-0">
									@if($OrderDetailData->status == 3)
										<button class="btn btn-primary" id="revise-parcel-info" style="height: 30px; width: 110px; padding: 8px; font-family: w6; margin-bottom: 6px; font-size: 12px;">編集</button>
									@else
										<button class="btn btn-primary" id="revise-parcel-info" style="height: 30px; width: 110px; padding: 8px; font-family: w6; margin-bottom: 6px; font-size: 12px;" disabled>編集</button>
									@endif
								</div>
								<div class="row inner mt-5">

									<div class="table table-responsive col-lg-12 p-md-1 mt-5">
										<table class="table">
											<tr class="bg-dark">
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
												<td class="text-center">{{ $orderDetail->product->price }}</td>
												<td class="text-center">{{ $orderDetail->qty }}</td>
												<td class="text-center">{{ $orderDetail->product->price * $orderDetail->qty }}</td>
											</tr>
											@php
												// $total += ($orderDetail->product->price * $orderDetail->qty);

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
												<td class="text-center bg-dark table-bordered">合計</td>
												<td class="text-center table-bordered">{{ $total }}</td>
											</tr>
										</table>
									</div>


								</div>

								<div class="row mt-5">
									<h4 class="col-md-2 col-4 p-0 m-0">配送先</h4>
								</div>
								<div class="row inner mt-3">
									<div class="col-md-2 col-3 bg-dark">
										<p class="pt-3 ">氏名</p>
									</div>
									<div class="col-md-10 col-8 border">
										<p class="pt-3">{{ $order->user->first_name }} &nbsp;{{ $order->user->last_name }} </p>
									</div>
								</div>
								<div class="row inner">
									<div class="col-md-2 col-3 bg-dark">
										<p class="pt-3 ">フリガナ</p>
									</div>
									<div class="col-md-10 col-8 border">
										<p class="pt-3">{{ $order->user->first_name }} &nbsp;{{ $order->user->last_name }}</p>
									</div>
								</div>
								<div class="row inner">
									<div class="col-md-2 col-3 bg-dark">
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
									<div class="col-md-2 col-3 bg-dark">
										<p class="pt-3 ">郵便番号</p>
									</div>
									<div class="col-md-10 col-8 border">
										<p class="pt-3"> 	@if ($order->custom_postal_code)
												{{ $order->custom_postal_code }}
											@else
												{{ $order->user->shipping_postal_code }}
											@endif</p>
									</div>
								</div>
								<div class="row inner">
									<div class="col-md-2 col-3 bg-dark">
										<p class="pt-3 "> 都道府県</p>
									</div>
									<div class="col-md-10 col-8 border">
										<p class="pt-3">  {{ $order->user->shipping_prefecture }}</p>
									</div>
								</div>
								<div class="row inner">
									<div class="col-md-2 col-3 bg-dark">
										<p class="pt-3 ">
											住所
											</p>
									</div>
									<div class="col-md-10 col-8 border">
										<p class="pt-3"> @if ($order->custom_postal_code)
												{{ $order->custom_address }}
											@else
												{{ $order->user->profile->address }}
											@endif</p>
									</div>
								</div>


								<div class="row mt-5">
									<h4 class="col-md-2 col-6 p-0 m-0">注文者情報</h4>
								</div>
								<div class="row inner mt-3">
									<div class="col-md-2 col-3 bg-dark">
										<p class="pt-3 ">氏名</p>
									</div>
									<div class="col-md-10 col-8 border">
										<p class="pt-3">{{ $order->user->first_name }} &nbsp;{{ $order->user->last_name }}</p>
									</div>
								</div>
								<div class="row inner">
									<div class="col-md-2 col-3 bg-dark">
										<p class="pt-3 ">フリガナ</p>
									</div>
									<div class="col-md-10 col-8 border">
										<p class="pt-3">{{ $order->user->first_name }} &nbsp;{{ $order->user->last_name }}</p>
									</div>
								</div>
								<div class="row inner">
									<div class="col-md-2 col-3 bg-dark">
										<p class="pt-3 "> メールアドレス</p>
									</div>
									<div class="col-md-10 col-8 border">
										<p class="pt-3"> {{ $order->user->email }} </p>
									</div>
								</div>
								<div class="row inner">
									<div class="col-md-2 col-3 bg-dark">
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
									<div class="col-md-2 col-3 bg-dark">
										<p class="pt-3 "> 都道府県</p>
									</div>
									<div class="col-md-10 col-8 border">
										<p class="pt-3">   {{ $order->user->shipping_prefecture}} </p>
									</div>
								</div>
								<div class="row inner">
									<div class="col-md-2 col-3 bg-dark">
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
									<div class="col-md-2 col-3 bg-dark">
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
									<div class="col-md-2 col-3 bg-dark">
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
									<div class="col-md-2 col-3 bg-dark">
										<p class="pt-3 "> 入金金額</p>
									</div>
									<div class="col-md-10 col-8 border">
										<p class="pt-3"> ￥ {{ $order->total_point}} </p>
									</div>
								</div>

							</div>
						</div>

						<div class="row p-5">
							<div class="col-md-12 col-12">
								<h4 class="text-center">	<a href="{{route('user-order-list')}}" class="btn btn-md bg-dark btn-bottom text-white">< &nbsp;&nbsp; 戻 る</a></h4>

							</div>
						</div>
				</div>

			</div>

			</div>
	  </div>
	</div>
</div>
@include('user.layouts.order-details-modal-1')
@include('user.layouts.order-details-modal-2')

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
					document.location.replace('/user/order-details-status-change/'+row_id+'/'+status);
				}else if (select_val == 2) {
					status = 2;
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
				}else if (select_val == 3) {
					status = 3;
					document.location.replace('/user/order-details-status-change/'+row_id+'/'+status);
				}else if (select_val == 4) {
					status = 4;
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
			})
		})
		</script>
		<script type="text/javascript">

		$(function(){
			$('#revise-parcel-info').on('click', function(){
				var row_id = $(".modalOption").attr("data-id");
				var row_order_id = $(".modalOption").attr("data-order-id");
				var select_val = $(".modalOption").val();
				
				var doc_number = $('#doc_number').html();
				
				console.log(ship_company);
				if (select_val == 3) {
					console.log(row_id);
					var status = 0;
					status = 2;
					$('#order1').modal({
						backdrop: 'static',
						keyboard: false
					})
					var ship_company = $('#ship_company').html();
          $("#shipping_company option:contains(" + ship_company + ")").attr('selected', 'selected'); 

					$('.order1').modal("show"); //Open Modal
					$('.order_id1').val(row_order_id);
					$('.order_detail_id1').val(row_id);
					$('.is_edit1').val(1);
					$('#document_number').val(doc_number);
					$('#shipping_company').val(ship_company);

					$('.status1').val(status);
					$('.close').on('click',function(){
						location.reload();
					})
				}
			})
		})
	</script>
	<!-- <script type="text/javascript">
			$(document).ready(function(){
				$(document).ready(function(){ //Make script DOM ready
				    $('.modalOption').change(function() { //jQuery Change Function
							  var row_id = $(this).attr("data-id");
								// var row_order_id = $(this).attr("data-order-id");

							  var select_val = $(this).val();
							  //console.log(row_id)
							  //var opval = parseInt($('#shipment'+row_id).val());//Get value from select element
				        if(select_val == 2){ //Compare it and if true
										var status = 2;
										$('#order1').modal({
								backdrop: 'static',
								keyboard: false
							})
				            $('.order1').modal("show"); //Open Modal
										$('.order_id1').val(row_id);
										// $('.order_detail_id1').val(row_id);

										$('.status1').val(status);

										// console.log($('#order_id1').val());

				        }
								if(select_val == 4){ //Compare it and if true
									var status = 4;
									$('#order2').modal({
								backdrop: 'static',
								keyboard: false
							})
									$('.order2').modal("show"); //Open Modal
									$('.order_id2').val(row_id);
									// $('#order_detail_id2').val(row_id);

									$('.status2').val(status);
				        }
				    });
				});
			});
	</script> -->
@stop
