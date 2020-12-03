@extends('layouts.email')
@section('content')


<div>{{$data['name']}} 様</div>
<br>
<div>Crofun運営局です。</div>
<br>
<div>この度は、数あるクラウドファンディングの中から弊社のサービス</div>
<div>Crofunにご登録いただき、ありがとうございます。</div>
<br>
<div>下記の情報でアカウントの登録が完了しました。</div>
<br>
----------------------------------------------------------
<br>
<div>お名前 : {{$data['name']}} 様</div>
<br>
----------------------------------------------------------
<br>
<div>それでは、早速、Crofunをご利用ください。</div>

@endsection    