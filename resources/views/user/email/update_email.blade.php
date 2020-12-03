@extends('layouts.email')
@section('content')


<div>{{$data['name']}} 様</div>
<br>
<div>いつもお世話になっております。</div>
<div>Crofun運営局です。</div>
<br>
<div>メールアドレスの変更を承りました。</div>
<div>変更情報は下記のとおりです。</div>
<div>ご確認くださいますようお願いいたします。</div>
<br>
<div>----------------------------------------------------------</div>
<div>変更前　：{{$data['oldEmail']}}</div>
<div>変更後　：{{$data['email']}}</div>
<div>---------------------------------------------------------- </div>
<br>
<div>以上です。よろしくお願いいたします。</div>
<br>     

@endsection    