@extends('admin.layouts.main')

@section('custom_css')
<!-- <link rel="stylesheet" href="https://cdn.datatables.net/1.10.13/css/dataTables.bootstrap.min.css"> -->
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap4.min.css">
@stop

@section('content')
	<div class="row">
		

		<div class="col-md-12">
			<div class="card">
				<div class="card-header">
					Project List
				</div>
				<div class="card-body" style="overflow-x:auto;overflow-y: hidden;font-size:14px">
					<table class="table table-sm" id="data-table" style="overflow-x:auto;overflow-y: hidden">
						<thead>
							<tr>								
								<th style="min-width:70px">申請日</th><!--Created At-->
								<th>Title</th><!--Title-->
								<th>Budget</th><!--Budget-->
								<th>No. of support</th><!--No. of support-->
								<th>Support amount</th><!--Support amount-->
								<th>Crofun points</th><!--Crofun points-->
								<th>Status</th><!--Status-->
								<th>Added By</th><!--Added By-->
								<th></th> <!--title-->
							</tr>
						</thead>
						<tbody>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
@include('admin.project.message_modal', ['modal_title' => ' 起案者へのメッセージ'])
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
        order: [ [0, 'desc'] ],
		ajax: "{!! route('admin-project-list-data',['user_id'=>$user_id, 'category_id'=>$category_id, 'status'=>$status]) !!}",
		columns: [
				{ data: 'created_at', name: 'created_at' },
				{ data: 'title', name: 'title' },
				{ data: 'budget', name: 'budget' },
				{ data: 'total_invested',name: 'total_invested'},
				{ data: 'total_invested_amount', name: 'total_invested_amount'},
				{ data: 'total_point', name: 'total_point' },
				{ data: 'status', name: 'status'},
				{ data: 'created_by', name: 'created_by', bSearchable:false, bSortable:false},
				{ data: 'action', name: 'action', bSearchable:false, bSortable:false }
			]
    });
});





</script>
<script type="text/javascript">
	function selectvalue(e,s){
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