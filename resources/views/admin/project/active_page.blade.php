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

@section('content')
	<div class="row">
		<div class="col-md-12">
			<div class="card">
				<div class="card-header">
					Project List
				</div>
				<div class="card-body" style="overflow-x:auto;overflow-y: hidden;font-size:14px">
					<table class="table table-sm" id="data-table" style="overflow-x:auto;overflow-y: hidden;">
						<thead>
							<tr>								
								<th >開始日</th><!--Created at-->
								<th style="width:250px!important">プロジェクト名</th><!--title-->
								<th >目標金額</th><!--Budget-->
								<th style="text-align:center">支援数</th><!--No of projects-->
								<th style="text-align:center">支援金</th><!--support amount-->
								<th style="text-align:center">ポイント保有</th><!--crofun points-->
								<th >状態</th><!--status-->
								<th style="min-width:100px!important">起案者</th><!--Added by-->
								<th></th> 
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
			ajax: "{!! route('admin-project-list-active-data',['user_id'=>$user_id, 'category_id'=>$category_id, 'status'=>$status]) !!}",
			columns: [
					{ data: 'created_at', name: 'created_at' },
					{ data: 'title', name: 'title' },
					{ data: 'budget_formatted', name: 'budget_formatted' },
					{ data: 'total_invested',name: 'total_invested'},
					{ data: 'total_invested_amount', name: 'total_invested_amount'},
					{ data: 'total_point', name: 'total_point' },
					{ data: 'status', name: 'status'},
					{ data: 'created_by', name: 'created_by', bSearchable:false, bSortable:false},
					{ data: 'action', name: 'action', bSearchable:false, bSortable:false },
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