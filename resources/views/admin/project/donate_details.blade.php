@extends('admin.layouts.main')


@section('custom_css')
<!-- <link rel="stylesheet" href="https://cdn.datatables.net/1.10.13/css/dataTables.bootstrap.min.css"> -->
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap4.min.css">
<style>
	button:focus,
	textarea:focus,
	input:focus {
		outline: 0 !important;
	}

</style>
@stop

<!-- 
@section('ecommerce')

@stop -->

@section('content')
<div class="row">
	<div class="col-md-12">
		<div class="card">
			<div class="card-header">
				Project List
			</div>
			<div class="card-body" style="overflow-x:auto;overflow-y: hidden;font-size:14px;">
				<table class="table table-sm" id="data-table" style="overflow-x:auto;overflow-y: hidden;max-width:1300px">
					<thead>
						<tr>								
							<th >Payment date</th>
							<th style="text-align:center">Amount</th>
							<th >Return name</th>
							<th style="text-align:center">Crofun Point</th>
							<th style="min-width:80px" >Supporter Name</th>
						</tr>
					</thead>
					<tbody>
						
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>

@include('admin.project.message_modal', ['modal_title' => ' 応援者へのメッセージ'])

@stop

@section('custom_js')

<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap4.min.js"></script>
<script type="text/javascript">
$(function() {
    var dataTable = $('#data-table').DataTable({
        processing: true,
        serverSide: true,
        //bSort: false,
        order: [ [4, 'desc'] ],
        ajax: "{!! route('admin-project-list-donate',['id'=>$id]) !!}",
        columns: [
            { data: 'created_at', name: 'created_at' },
            { data: 'amount', name: 'amount' },
            { data: 'return_name', name: 'return_name' },
            { data: 'crofun_points', name: 'crofun_points' },
            { data: 'supporter_name', name: 'supporter_name' },
        ]
    });
});
</script>
	
<!-- <script type="text/javascript">
	$(document).ready(function(){
		$('#msg_send_btn').on('click', function(e){
			var user_id = $(this).attr('data-user_id');
			var user_name = $(this).attr('data-project_username');

			console.log(user_id)
			console.log(user_name)

			$('#to_id').val(user_id);
			$('#project_user_name').val(user_name);
			$('#send-message').modal('show');
			//$('#send-message').addClass('show');
		});
	});
</script> -->
<script type="text/javascript">
	function selectvalue(e,s){
		$('#to_id').val(s);
		$('#send-message').modal('show');
	}
</script>


@stop