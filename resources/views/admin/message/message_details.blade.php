
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

    .chat_box{
		padding: 8px; 
		border: 1px solid #d6d6d6; 
		background-color: #d6d6d6; 
		border-radius: 8px; 
		width: 83%
	}

</style>

@stop

@section('content')
	<div class="row">
		<div class="col-md-12">
			<div class="card">
				<div class="card-header">
                    <div class="col-md-4 ">
                        @if($thread->side_1 == 0)
                            <span>{{$thread->side2->first_name}}{{$thread->side2->last_name}}</span>
                        @endif
                    </div>
				</div>
                <div class="col-md-12">
                    @if (session('success'))
                        <div class="row">
                            <div class="col-md-12">
                                <h4 class=" bg-info  p-3 text-white">{{ session('success') }}</h4>
                            </div>
                        </div>
                    @endif
                    <div class="row ml-md-1 well">

                    <div class="col-md-12 col-12">
                        <div class="row">
                            <div class="col-md-8 col-8 pt-3 col-sm-8">
                                <p class="font-weight-bold">{{$thread->title}}<p>
                            </div>
                            
                        </div>
                        
                        <div class="col-md-12 p-0" style="">
                            @foreach($messages as $msg)
                                @if($msg->from_id == 0)
                                    <div class="col-md-12 col-12 col-sm-12 p-0 mt-3 text-left">
                                        <div class="chat_box" style="text-align: left; background-color: #96acb7;color:#fff">{!!nl2br($msg->message)!!}</div>
                                    </div>
                                @else	
                                    <div class="col-md-12 col-12 col-sm-12 p-0 mt-3 text-right">
                                        <div class="chat_box" style="text-align: left;background-color:#ccc ">{!!nl2br($msg->message)!!}</div>
                                    </div>
                                @endif
                            @endforeach
                        <div>
                
                        <div class="row mt-5">
                            <div class="col-md-10 col-10">
                                {!! Form::open(['route' => 'admin-message-reply', 'method' => 'post']) !!}
                                <div class="m-0">
                                    <textarea name="message" rows="4" cols="80" class="form-control" required></textarea>
                                    <input type="hidden" name="subject" value="{{ $thread->title }}">
                                    <input type="hidden" name="thread_id" value="{{ $thread->id }}">
                                    <input type="hidden" name="to_id" value="{{ $lastMessage[0]->from_id }}">
                                    <input type="hidden" name="reply_message_id" value="{{ $messages[0]->id }}">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-10 col-10 text-center mt-3 mb-3">
                            <button type="submit" class="btn btn-md btn-bottom" style="background-color: #96acb7">送信</button>
                        </div>
                        {!! Form::close() !!}
                    </div>
                </div>
			</div>
		</div>
	</div>
@stop

@section('custom_js')


<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap4.min.js"></script>
<script type="text/javascript">
	// $(function() {
	// 	var dataTable = $('#data-table').DataTable({
	// 		processing: true,
	// 		serverSide: true,
	// 		// bSort: false,
	// 		order: [ [2, 'desc'] ],
    //         ajax: "{!! route('admin-message-list-data') !!}",
	// 		columns: [
	// 				{ data: 'title', name: 'title' },
	// 				{ data: 'created_by', name: 'created_by', bSearchable:false, bSortable:false},
	// 				{ data: 'created_at', name: 'created_at' },
	// 			]
	// 	});
	// });
</script>
@stop