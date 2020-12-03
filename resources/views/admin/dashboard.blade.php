@extends('admin.layouts.main')

@section('custom_css')
@stop

@section('content')
	<div class="row mb-3">
		<div class="col-md-4">
			<div class="card text-center text-white bg-dark">
			  <div class="card-header"> ユーザー</div>
			  <div class="card-body">
			    <h4 class="card-title">{{$total_user}}</h4>
			    <a href="{{route('admin-user-list')}}" class="btn btn-primary">詳細</a><!--view-->
			  </div>
			</div>
		</div>
		<div class="col-md-4">
			<div class="card text-center text-white bg-dark">
			  <div class="card-header">プロジェクト</div>
			  <div class="card-body">
			    <h4 class="card-title">{{$total_project}}</h4>
			    <a href="{{route('admin-project-active-list')}}" class="btn btn-primary">詳細</a><!--view-->
			  </div>
			</div>
		</div>
		<div class="col-md-4">
			<div class="card text-center text-white bg-dark">
			  <div class="card-header">申請中プロジェクト</div>
			  <div class="card-body">
			    <h4 class="card-title">{{$total_pending_project}}</h4>
			    <a href="{{route('admin-project-pending-list')}}" class="btn btn-primary">詳細</a><!--view-->
			  </div>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-4">
			<div class="card text-center text-white bg-dark">
			  <div class="card-header">カタログ</div>
			  <div class="card-body">
			    <h4 class="card-title">{{$total_product}}</h4>
			    <a href="{{route('admin-product-list')}}" class="btn btn-primary">詳細</a><!--view-->
			  </div>
			</div>
		</div>
		<div class="col-md-4">
			<div class="card text-center text-white bg-dark">
			  <div class="card-header">申請中カタログ</div>
			  <div class="card-body">
			    <h4 class="card-title">{{$total_pending_product}}</h4>
			    <a href="{{route('admin-product-pending-list')}}" class="btn btn-primary">詳細</a><!--view-->
			  </div>
			</div>
		</div>
		<div class="col-md-4">
			<div class="card text-center text-white bg-dark">
			  <div class="card-header">カタログ購入</div>
			  <div class="card-body">
			    <h4 class="card-title">{{$order_history}}</h4>
			    <a href="{{route('admin-order-list')}}" class="btn btn-primary">詳細</a><!--view-->
			  </div>
			</div>
		</div>
	</div>
@stop

@section('custom_js')
@stop