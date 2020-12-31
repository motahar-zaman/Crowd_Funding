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
          User List <!--user list-->
				</div>
				<div class="card-body" style="overflow-x:auto;overflow-y: hidden;font-size:14px">
					<table class="table table-sm" id="data-table" style="overflow-x:auto;overflow-y: hidden">
						<thead>
							<tr>								
                <th style="min-width:80px;">登録日</th><!-- created at -->
								<th style="min-width:150px">氏名</th><!-- name -->
								<th style="min-width:250px">メール</th><!-- email -->
								<!-- <th>Email Verified?</th> -->
							
								<th style="min-width:120px;text-align:center">起案プロジェクト</th><!-- total project  -->
								<th style="min-width:80px;text-align:center">掲載商品</th><!-- total product -->
								<th style="min-width:100px;text-align:center">保有ポイント</th><!-- total points -->
								<!-- <th>Last Login</th> -->
								<th style="min-width:60px;">退会申請</th><!-- view request -->
								<th style="min-width:50px;">状態</th><!-- status -->
								<th></th>
							</tr>
						</thead>
						<tbody >
							
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>



<!-- Cancel Request view Modal -->
{{--<div class="modal fade" id="cancelRequestModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Cancel Request Details</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="">退会理由 : </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>--}}

@include('admin.layouts.message')
@include('admin.user.userCancel')

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
        order: [ [1, 'desc'] ],
        ajax: "{!! route('admin-user-list-data') !!}",
        columns: [
            { data: 'created_at', name: 'created_at' },
            { data: 'first_name', name: 'first_name' },
            { data: 'email', name: 'email' },
            // { data: 'is_email_verified', name: 'is_email_verified' },

            
            { data: 'total_projects', name: 'total_projects', bSearchable:false, bSortable:false  },
            { data: 'total_products', name: 'total_products', bSearchable:false, bSortable:false  },
            { data: 'point', name: 'point' },
            // { data: 'last_login_date', name: 'last_login_date' },
            { data: 'cancel_request', name: 'cancel_request', bSearchable:false, bSortable:false  },
            { data: 'status', name: 'status' },
            { data: 'action', name: 'action', bSearchable:false, bSortable:false }
        ],
        initComplete: function( settings, json ) {
      		$("th:first").removeClass('sorting_asc'); 
			    $("th:first").addClass('sorting_desc'); 
    	  }
    });

    // $('body').on('click', '[data-toggle="modal"]', function(){
    //     $($(this).data("target")+' .modal-body').load($(this).data("remote"));
    // }); 
});
</script>
<script type="text/javascript">
		function selectvalue(e,s){
      var url = "{{route('admin-cancel-request-show')}}"
      $.ajax({
          url: url,
          type: "GET",
          data: {
              id:s
            },
          success: function(data){
                  $('.reason').html(data.reason);
                  $('.reason_details').html(data.reason_details);
            },
      }); 
		  $('#cancelRequestModal').modal('show');
    }
</script>

@stop