@extends('admin.layouts.main')

@section('custom_css')

@stop

@section('content')
	<div class="row">
		

		<div class="col-md-12">
			<div class="card">
				<div class="card-header">
					Contact Us details
					<!-- <a href="{{route('admin-content-add')}}" class="btn btn-success btn-sm pull-right">Add New</a> -->
				</div>
				<div class="card-body">
					<div class="">
                        <!-- <div class="row col-md-12">
                            <div class=""> Name </div>
                            <div class=""> :</div>
                            <div class=""> {{$details->name}} </div>
                        </div> -->
                        <div class="form-group">
							<label for="exampleInputPassword1">Name</label>
							<input type="text" class="form-control" id="exampleInputPassword1" placeholder="Title" name="title" value="{{$details->name}}" readonly >
						</div>
                        <div class="form-group">
							<label for="exampleInputPassword1">Email</label>
							<input type="text" class="form-control" id="exampleInputPassword1" placeholder="Title" name="title" value="{{$details->email}}" readonly>
						</div>
						<div class="form-group">
							<label for="exampleInputDescription">Description</label>
							<textarea placeholder="Description" class="form-control" id="exampleInputDescription" name="description" rows="15" readonly>{{$details->details}}</textarea>
						</div>
						
                    </div>
				</div>
			</div>
		</div>
	</div>
@stop



@section('custom_js')

@stop