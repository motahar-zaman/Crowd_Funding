@extends('admin.layouts.auth')

@section('custom_css')
@stop

@section('content')
<div class="row justify-content-md-center align-middle auth-content">


	<div class="col-md-4">


		<h4 class="text-center">CROFUN管理画面</h4>

		<div class="card">
			
			<h6 class="card-header mb-2 text-muted text-center">Administrator login</h6>
			<div class="card-body">
				
				

				@include('admin.layouts.message')
				
				<form action="" method="post">

					{{ csrf_field() }}

					<div class="form-group">
						<label for="exampleInputEmail1">メールアドレス</label>
						<input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="" name="email" value="{{old('email')}}">
						<small class="text-danger">{{ $errors->first('email') }}</small>
						<!-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> -->
					</div>
					<div class="form-group">
						<label for="exampleInputPassword1">パスワード</label>
						<input type="password" class="form-control" id="exampleInputPassword1" placeholder="" name="password" value="{{old('password')}}">
						<small class="text-danger">{{ $errors->first('password') }}</small>
					</div>
					
					<div class="form-check">
					    <label class="form-check-label">
					      <input type="checkbox" class="form-check-input" name="remember">
						  入力内容を保存
					    </label>
					  </div>
					
					<button type="submit" class="btn btn-primary pull-right">ログイン</button>
				</form>


			</div>
		</div>
	</div>
</div>	
@stop

@section('custom_js')
@stop