@extends('layouts.email')
@section('content')

<!-- <p>株式会社{{$data['name']}}</p> -->
<div>{{$data['name']}} 様</div>
<br>
<div>Crofun運営局です。</div>
<br>
<div>下記の方への商品発送の件、承りました。</div>
<div>ご連絡ありがとうございます。</div>
<br>
<br>
<div>♦商品情報　</div>
<div>----------------------------------------------------------</div>
<br>
<div>商品名　：{{$data['product_name']}}</div>
<div>ポイント：{{$data['point']}}</div>
<br>
<div>----------------------------------------------------------</div>
<br>
<div>♦配送情報</div>
<div>----------------------------------------------------------</div>
<br>
<div>お名前　：{{$data['user_name']}}</div>
<div>お届け先：{{$data['delivery_address']}}</div>
<br>
<div>配送会社：{{$data['shipping_company']}}</div>
{{--<div>手配日時：{{$data['date_and_time_of_arrangement']}}</div>--}}
<div>伝票番号：{{$data['voucher_number']}}</div>
<br>
<div>----------------------------------------------------------</div>
<br>
<div>今後とも、よろしくお願申し上げます。</div>
<br>


@endsection    