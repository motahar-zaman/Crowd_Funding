@extends('layouts.email')
@section('content')

<!-- <p>株式会社{{$data['name']}}</p> -->
<div>{{$data['name']}} 様</div>
<br>
<div>Crofun運営局です。</div>
<br>
<div>下記の方からの支援を承りましたので、ご連絡いたします。</div>
<br>
<div>----------------------------------------------------------</div>
<br>
<div>お名前　：{{$data['person_name']}} 様</div>
<div>支援金額：{{$data['amount_of_support']}}円</div>
<br>
<div>----------------------------------------------------------</div>
<br>
<div>現在のプロジェクト支援金額合計は</div>
<div>掲載URLからご確認いただけます。{{$data['project_url']}}</div>
<br>
<div>それでは、プロジェクト終了までがんばっていきましょう。</div>
<br>

@endsection  