@extends('layouts.email')
@section('content')

<!-- <p>株式会社{{$data['name']}}</p> -->
<div>{{$data['name']}} 様</div>
<br>
<div>Crofun運営局です。</div>
<br>
<div>この度はクラウドファンディングのカタログ商品として</div>
<div>Crofunへの商品掲載を申請いただき、</div>
<div>誠にありがとうございます。</div>
<br>
<div>♦商品情報</div>
<div>----------------------------------------------------------</div>
<br>
<div>商品名　：{{$data['product_name']}}</div>
<div>ポイント：{{$data['price']}}</div>
<br>
<div>いただいた申請書は厳正に審査を行い、</div>
<div>５営業日以内に結果を通知いたします。</div>
<div>今しばらくお待ちください。</div>
<br>
@endsection    