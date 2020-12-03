@extends('layouts.email')
@section('content')

<div>{{$data['name']}} 様</div>
<br>
<div>いつもお世話になっております。</div>
<div>Crofun運営局です。</div>
<br>
{{--<div>{{$data['name']}} 様にカタログより選んでいただきました商品が</div>
<div>発送されたとの報告を受けましたので、ご連絡いたします。</div>--}}
<div>下記の内容のご注文の商品を発送いたしました。</div>
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
{{--<div>配送会社：{{$data['shipping_company']}}</div>
<div>手配日時：{{$data['date_and_time_of_arrangement']}}</div>
<div>伝票番号：{{$data['voucher_number']}}</div>--}}
<br>
<div>----------------------------------------------------------</div>
<br>
<div>お手元に商品が届くまで、今しばらくお待ちくださいませ。</div>
<br>
@endsection  