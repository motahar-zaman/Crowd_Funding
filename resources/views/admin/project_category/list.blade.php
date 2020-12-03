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
					Project Category List
					<a href="{{route('admin-project-category-add')}}" class="btn btn-success btn-sm pull-right">新規追加</a>
				</div>
				<div class="card-body" style="overflow-x:auto;overflow-y: hidden;font-size:14px">
					<table class="table table-sm" id="data-table" style="overflow-x:auto;overflow-y: hidden">
						<thead>
							<tr>								
								<th>作成日</th><!--Created At-->
								<th>カテゴリー名</th><!--category name-->
								<th>プロジェクト数</th><!--Total Projects-->
								<th>状態</th><!--Status-->
								<th>作成者</th><!--Added By-->
								<th style="min-width: 160px;"></th><!--Action-->
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
        //bSort: false,
        order: [ [0, 'desc'] ],
        ajax: "{!! route('admin-project-category-list-data') !!}",
        columns: [
            { data: 'created_at', name: 'created_at' },
            { data: 'name', name: 'name' },
            { data: 'projects_count', name: 'projects_count', bSearchable:false, bSortable:false},
            { data: 'status', name: 'status' },
            { data: 'created_by', name: 'created_by', bSearchable:false, bSortable:false},
            { data: 'action', name: 'action', bSearchable:false, bSortable:false }
        ]
    });
});
</script>
	

@stop