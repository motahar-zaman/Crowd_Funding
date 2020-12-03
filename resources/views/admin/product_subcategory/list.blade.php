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
					Project Sub Category List
					<a href="{{route('admin-product-subcategory-add')}}" class="btn btn-success btn-sm pull-right">新規追加</a>
				</div>
				<div class="card-body" style="overflow-x:auto;overflow-y: hidden;font-size:14px">
					<table class="table table-sm" id="data-table" style="overflow-x:auto;overflow-y: hidden;">
						<thead>
							<tr>								
								<th>作成日</th> <!--created at-->
								<th>サブカテゴリー名</th> <!--sub category name-->
								<th style="text-align:center">カタログ数</th> <!--total products-->
								<th style="text-align:center">状態</th> <!--status-->
								<th style="">作成者</th> <!--Added by-->
								<th style="min-width: 160px;"></th> <!--Action-->
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
        ajax: "{!! route('admin-product-subcategory-list-data', ['category_id' => $category_id]) !!}",
        columns: [
            { data: 'created_at', name: 'created_at' },
            { data: 'name', name: 'name' },
            { data: 'products_count', name: 'products_count', bSearchable:false, bSortable:false},
            { data: 'status', name: 'status' },
            { data: 'created_by', name: 'created_by', bSearchable:false, bSortable:false},
            { data: 'action', name: 'action', bSearchable:false, bSortable:false }
        ]
    });
});
</script>
	

@stop