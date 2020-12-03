@extends('layouts.email')
@section('content')

<div>Crofun管理者用</div>
<br>
<div>{{$data['user_name']}} 様が商品情報を編集しました</div>
<br>
<div>下記、商品の編集です。</div>
<br>
<div>お名前：{{$data['user_name']}}</div>
<div>商品名：{{$data['product_name']}}</div>
<div>商品編集日：{{$data['application_date']}}</div>
<div>商品URL：{{$data['detailed_url']}}</div>
<br>
<div>5営業日以内に結果通知をしてください。</div>
<br>
<br>
<div>以上</div>
<br>
@endsection    



