
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
					Message List
				</div>
				<div class="card-body" style="overflow-x:auto;overflow-y: hidden;font-size:14px">
					<table class="table table-sm" id="data-table" style="overflow-x:auto;overflow-y: hidden;">
						<thead>
							<tr>								
								<th>日付</th>
								<th style="width:250px!important">タイトル</th>
								<th>ユーザー名</th>
							</tr>
						</thead>
						<tbody>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
@stop

@section('custom_js')


<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap4.min.js"></script>
<script type="text/javascript">
	$(function() {
		var dataTable = $('#data-table').DataTable({
			processing: true,
			serverSide: true,
			// bSort: false,
			order: [ [2, 'desc'] ],
            ajax: "{!! route('admin-message-list-data') !!}",
			columns: [
					{ data: 'created_at', name: 'created_at' },
					{ data: 'title', name: 'title' },
					{ data: 'created_by', name: 'created_by', bSearchable:false, bSortable:false},
				]
		});
	});
</script>
@stop