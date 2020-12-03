@extends('layouts.email')
@section('content')

<div>Crofun管理者用</div>
<br>　
<div>下記、商品購入がありました。</div>
<br>
<div>＜購入者＞</div>
<div>お名前　：{{$data['buyer_name']}} 様</div>
<div>フリガナ：{{$data['buyer_reading']}}</div>
<div>ご住所　：〒 {{$data['buyer_address1']}} {{$data['buyer_address2']}}{{$data['buyer_address3']}}{{$data['buyer_address4']}}{{$data['buyer_address5']}}</div>
<div>電話番号：{{$data['buyer_phone_number']}}</div>
<br>
<div>商品名：{{$data['product_name']}}</div>
<div>ポイント数：{{$data['point']}}</div>
<br>
<div>＜商品提供者＞</div>
<div>お名前　：{{$data['seller_name']}} 様</p>
<div>フリガナ：{{$data['seller_reading']}}</p>
<div>ご住所　：〒 {{$data['seller_address1']}} {{$data['seller_address2']}}{{$data['seller_address3']}}{{$data['seller_address4']}}{{$data['seller_address5']}}</div>
<div>電話番号：{{$data['seller_phone_number']}}</div>
<br>
<br>
<div>以上</div>
<br>

@endsection 