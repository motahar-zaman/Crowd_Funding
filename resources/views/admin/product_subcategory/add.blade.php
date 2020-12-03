@extends('admin.layouts.main')

@section('custom_css')
@stop

@section('content')
	<div class="row">
		<div class="col-md-8">
			<div class="card">
				<div class="card-header">
					Add New Project Sub Category
					<a href="{{route('admin-product-category-list')}}" class="btn btn-success btn-sm pull-right">カタログサブカテゴリー</a>
				</div>
				<div class="card-body">
					
					<form action="" method="post">


						@include('admin.layouts.message')

						{{ csrf_field() }}
						
						<div class="form-group">
							<label for="exampleInputPassword1">カテゴリー名</label>
							<select class="form-control" name="category">
								<?php foreach($category as $c){?>
									<option value="{{$c->id}}">{{$c->name}}</option>
								<?php }?>
							</select>
							<small class="text-danger">{{ $errors->first('category') }}</small>
						</div>
						
						<div class="form-group">
							<label for="exampleInputPassword1">サブカテゴリー名</label>
							<input type="text" class="form-control" id="exampleInputPassword1" placeholder="Sub Category Name" name="name" value="{{old('name')}}">
							<small class="text-danger">{{ $errors->first('name') }}</small>
						</div>
						
						
						<button type="submit" class="btn btn-primary">新規追加</button>
					</form>


				</div>
			</div>
		</div>

		
	</div>
@stop

@section('custom_js')
@stop