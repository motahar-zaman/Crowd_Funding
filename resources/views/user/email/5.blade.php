@extends('layouts.email')
@section('content')

<div>{{$data['your_name']}} 様</div>
<br>
<div>いつもお世話になっております。</div>
<div>Crofun運営局です。</div>
<br>
<div>アカウント変更を承りました。</div>
<div>あなたのアカウントの新しい情報は下記のとおりです。</div>
<div>ご確認くださいますようお願いいたします。</div>
<br>
<div>----------------------------------------------------------</div>
<br>
<div>お名前　：{{$data['your_name']}} 様</div>
<div>生年月日：{{$data['birth_date']}}</div>
<div>住所　　：〒{{$data['address1']}} {{$data['address2']}}{{$data['address3']}}{{$data['address4']}}{{$data['address5']}}</div>
<div>電話番号：{{$data['phone_number']}}</div>
<br>
<div>----------------------------------------------------------</div>
<br>
<div>{{$data['your_name']}} 様のご期待に沿えるよう、これからも邁進してまいりますので、</div>
<div>これからも変わらぬご愛顧を賜りますようお願い申し上げます。</div>
<br>
@endsection  