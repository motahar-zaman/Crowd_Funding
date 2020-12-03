@extends('admin.layouts.main')

@section('custom_css')
<!-- <link rel="stylesheet" href="https://cdn.datatables.net/1.10.13/css/dataTables.bootstrap.min.css"> -->
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap4.min.css">
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
				<div class="card-body">
					<table class="table table-sm" id="data-table">
						<thead>
							<tr>								
								<th >Payment date</th>
								<th >Amount</th>
								<th >Return name</th>
								<th >Crofun Point</th>
								<th >Supporter Name</th>
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
        order: [ [4, 'desc'] ],
        ajax: "{!! route('admin-project-category-list-donate',['id'=>$id]) !!}",
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
	

@stop