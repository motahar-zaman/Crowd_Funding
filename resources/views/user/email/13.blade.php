@extends('layouts.email')
@section('content')

<!-- <p>株式会社{{$data['name']}}</p> -->
<div>{{$data['name']}} 様</div>
<br>
<div>Crofun運営局です。</div>
<br>
<div>この度は数あるクラウドファンディングの中から、</div>
<div>Crofunをお選びいただき、誠にありがとうございました。</div>
<br>
<div>いただいた申請書は厳正に審査を行い、</div>
<div>５営業日以内に結果を通知いたします。</div>
<div>今しばらくお待ちください。</div>
<br>

@endsection