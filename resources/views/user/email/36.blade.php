@extends('layouts.email')
@section('content')

<div>{{$data['name']}} 様</div>
<br>
<div>いつもお世話になっております。</div>
<div>Crofun運営局です。</div>
<br>
<div>下記の内容のご注文の配送ステータスが、発送準備中になりました。</div>
<br>
<div>♦商品情報　</div>
<div>----------------------------------------------------------</div>
<br>
<div>商品名　：{{$data['product_name']}}</div>
<div>ポイント：{{$data['point']}}</div>
<br>
<div>----------------------------------------------------------</div>
<br>
<div>♦お届け先</div>
<div>----------------------------------------------------------</div>
<br>
<div>お名前　：{{$data['user_name']}}</div>
<div>お届け先：{{$data['delivery_address']}}</div>
<br>
<br>
<div>----------------------------------------------------------</div>
<br>
<div>お手元に商品が届くまで、今しばらくお待ちくださいませ。</div>
<br>
@endsection  