@extends('layouts.email')
@section('content')

<div>Crofun管理者用</div>
<br>
<div>下記、アカウント解除・退会です。</div>
<br>
<div>----------------------------------------------------------</div>
<div>お名前　：{{$data['user_name']}} 様</div>
<div>生年月日：{{$data['birthday']}}</div>
<div>住所　　：〒{{$data['address']}} {{$data['address2']}}{{$data['address3']}}{{$data['address4']}}{{$data['address5']}}</div>
<div>電話番号：{{$data['phone_number']}}</div>
<div>----------------------------------------------------------</div>
<br>
<br>
<div>以上</div>
<br>

@endsection    