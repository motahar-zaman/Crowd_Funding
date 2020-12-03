@extends('layouts.email')
@section('content')

<div>{{$data['name']}} 様<div>
<br>
<div>いつもお世話になっております。</div>
<div>Crofun運営局です。</div>
<br>
<div>下記の内容でご注文を承りました。</div>
<div>ご注文内容をご確認ください。</div>
<br>
<br>
<div>♦商品情報</div>
<div>----------------------------------------------------------<div>
<br>
<div>商品名　：{{$data['product_name']}}</div>
<div>ポイント：{{$data['point']}}</div>
<br>
<div>----------------------------------------------------------</div>
<br>
<div>♦お届け先</div>
<div>----------------------------------------------------------</div>
<br>
<div>お名前　：{{$data['buyer_name']}}</div>
<div>ご住所　：〒 {{$data['address1']}} {{$data['address2']}}{{$data['address3']}}{{$data['address4']}}{{$data['address5']}}</div>
<br>
<div>----------------------------------------------------------</div>
<br>
<div>お手元に商品が届くまで、今しばらくお待ちくださいませ。</div>
<br>

@endsection    