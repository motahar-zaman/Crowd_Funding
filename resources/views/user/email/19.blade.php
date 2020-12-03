@extends('layouts.email')
@section('content')

<!-- <p>株式会社{{$data['name']}}</p> -->
<div>{{$data['name']}} 様</div>
<br>
<div>Crofun運営局です。</div>
<br>
<div>先日は、お忙しい中、カタログ掲載商品として</div>
<div>御社の商品の掲載申請をいただき、ありがとうございました。</div>
<br>
<div>選考の結果、掲載することに決定いたしましたのでご連絡いたします。</div>
<div>掲載URL：{{$data['product_url']}}</div>
<br>
<br>
<div>リターンとしての商品提供が</div>
<div>{{$data['name']}} 様の商品の新たなビジネス展開になれることを、一同大変嬉しく思っております。</div>
<div>何かご不明点やご質問がございましたら、お気軽にお問合せください。</div>
<br>
@endsection    