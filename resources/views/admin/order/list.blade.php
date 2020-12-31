@extends('admin.layouts.main')

@section('custom_css')
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap4.min.css">
<style>
	button:focus,
	textarea:focus,
	input:focus {
		outline: 0 !important;
	}
</style>
@stop

@section('content')
	<div class="row"  >
		<div class="col-md-12">
			<div class="card">
				<div class="card-header">
					Order List
				</div>
				<div class="card-body" style="overflow-x:auto;overflow-y: hidden;font-size:14px">
					<table class="table table-sm" id="data-table" style="overflow-x:auto;overflow-y: hidden">
						<thead>
							<tr>								
								<th style="min-width:70px">注文日</th><!--order date-->
								<th style="min-width:160px">注文ID</th><!--order id-->
								<th>購入金額</th><!--Purchase amount-->
								<th style="min-width:80px">注文者</th><!--buyer name-->
								<th style="min-width:80px">販売者</th><!--seller name-->
								<th style="min-width:70px">対応状況</th><!--order status-->
								<th style="min-width:100px">入金状況</th><!--payment status-->
								<th>入金予定額</th><!--deposite amount-->
							</tr>
						</thead>
						<tbody>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>

@include('admin.order.message_modal',['modal_title' => ' 注文者へのメッセージ'])
@include('admin.project.message_modal', ['modal_title' => ' 販売者へのメッセージ'])

@stop

@section('custom_js')

<script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap4.min.js"></script>
<script type="text/javascript">
	$(function() {
		var dataTable = $('#data-table').DataTable({
			processing: true,
			serverSide: true,
			//bSort: false,
			order: [ [1, 'desc'] ],
			ajax: "{!! route('admin-order-list-data') !!}",
			columns: [
					{ data: 'created_at', name: 'created_at' },
					{ data: 'order_no', name: 'order_no' },
					{ data: 'purchase_price', name: 'purchase_price' },
					{ data: 'order_by', name: 'order_by'},
					{ data: 'product_owner', name: 'product_owner'},
					{ data: 'status', name: 'status',bSearchable:false, bSortable:false},
					{ data: 'action', name: 'action',bSearchable:false, bSortable:false},
					{ data: 'deposit_price', name: 'deposit_price'},
				]
		});
	});
</script>

<script type="text/javascript">
	function selectvalue(e,s){
		var select_val = (e.value);
		if (select_val == 1) {
		console.log(e,select_val);
			status = 1;
			document.location.replace('/admin/order/payment-status-change/'+s+'/'+status);
		}else if (select_val == 2) {
			status = 2;
			$('#date-modal').modal({
				backdrop: 'static',
				keyboard: false
			})
			$('.date-modal').modal("show"); //Open Modal
			$('.order_id1').val(s);
			$('.status1').val(select_val);
			$('.close').on('click',function(){
				location.reload();
			})
		}else if (select_val == 3) {
			status = 3;
			document.location.replace('/admin/order/payment-status-change/'+s+'/'+status);
		}
	}
</script>
	
<script type="text/javascript">
	function buyerId(e,s){
		$('#to_id_order').val(s);
		$('#send-message-order').modal('show');
	}
	function ownerId(e,s){
		$('#to_id').val(s);
		$('#send-message').modal('show');
	}

	function disableFunction(){
		$('#submit_button').on('click', function(e){
			$(this).attr('disabled','disabled');
		});
	}
</script>

@stop