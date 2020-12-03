@extends('layouts.email')
@section('content')

<div>株式会社{{$data['company_name']}}</div>
<div>代表取締役社長{{$data['name']}} 様</div>
<br>
<div>Crofun運営局です。</div>
<br>
<div>下記の方からの商品発注を承りましたので、</div>
<div>下記の住所へ商品の発送をお願いいたします。</div>
<br>
<br>
<div>----------------------------------------------------------</div>
<br>
<div>商品名　：{{$data['product_name']}}</div>
<div>お名前　：{{$data['buyer_name']}} 様</div>
<div>ご住所　：〒 {{$data['buyer_home1']}} {{$data['buyer_home2']}}{{$data['buyer_home3']}}{{$data['buyer_home4']}}{{$data['buyer_home5']}}</div>
<div>電話番号：{{$data['buyer_phone_number']}}</div>
<br>
<div>----------------------------------------------------------</div>
<br>
<a href="{{ url('/user/order-status-change/'.$data['orderDetailId'].'/2') }}"><button>ステータスを「発送準備」へ変更</button></a>
<br>
<br>
<div>尚、お手数ですが、</div>
<div>発送の手配が完了しましたら、運営局宛にメールまたはお電話で</div>
<div>お知らせくださいますようお願い申し上げます。</div>
<br>
@endsection    