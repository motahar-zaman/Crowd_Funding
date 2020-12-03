@extends('layouts.email')
@section('content')

<div>{{$data['name']}} 様</div>
<br>
<div>いつもお世話になっております。</div>
<div>Crofun運営局です。</div>
<br>
<div>誠に残念ではございますが、</div>
<div>下記アカウント解除・退会を承りました。</div>
<div>一度登録したことがあるメールアドレスは、退会後に再登録することはできませんので</div>
<div>予めご了承ください。</div>
<br>
<div>----------------------------------------------------------</div>
<div>お名前　：{{$data['your_name']}} 様</div>
<div>生年月日：{{$data['birthday']}}</div>
<div>住所　　：〒{{$data['address']}} {{$data['address2']}}{{$data['address3']}}{{$data['address4']}}{{$data['address5']}}</div>
<div>電話番号：{{$data['phone_number']}}</div>
<div>----------------------------------------------------------</div>
<br>
<div>ご利用に関して、ご希望に添えない点がございましたことを、</div>
<div>心よりお詫び申し上げます。</div>
<br>
<div>多数のクラウドファンディングの中から</div>
<div>Crofunをご使用いただきましたことに感謝するとともに、</div>
<div>{{$data['name']}} 様の、より一層のご活躍をお祈り申し上げます。</div>
<br>
@endsection    