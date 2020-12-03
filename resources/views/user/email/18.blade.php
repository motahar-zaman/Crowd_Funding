@extends('layouts.email')
@section('content')

<div>Crofun管理者用</div>
<br>
<div>下記、新規商品申請を承りました。</div>
<br>
<div>お名前：{{$data['user_name']}}</div>
<div>商品名：{{$data['product_name']}}</div>
<div>申請日：{{$data['application_date']}}</div>
<div>詳細URL：{{$data['detailed_url']}}</div>
<br>
<div>厳正に審査を行い、5営業日以内に結果通知をしてください。</div>
<br>
<br>
<div>以上</div>
<br>
@endsection    