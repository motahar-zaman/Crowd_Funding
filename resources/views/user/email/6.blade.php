@extends('layouts.email')
@section('content')

<div>Crofun管理者用</div>
<br>
<div>下記アカウントの情報が変更されました。</div>
<br>
<div>----------------------------------------------------------</div>
<br>
<div>お名前　：{{$data['person_name']}} 様</div>
<div>生年月日：{{$data['birth_date']}}</div>
<div>住所　　：〒 {{$data['address1']}} {{$data['address2']}}{{$data['address3']}}{{$data['address4']}}{{$data['address5']}}</div>
<div>電話番号：{{$data['phone_number']}}</div>
<br>
<div>---------------------------------------------------------</div>
<br>
<br>

@endsection    