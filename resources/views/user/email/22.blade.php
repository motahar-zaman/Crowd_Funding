@extends('layouts.email')
@section('content')

<div>Crofun管理者用</div>
<br>
<div>下記、問合せがありました。</div>
<br>
<div>お名前　　　　：{{$data['person_name']}} 様</div>
<div>問い合わせ内容：{{$data['inquiry']}}</div>
<div>問い合わせ日　：{{$data['inquiry_date']}}</div>
<div>問い合わせURL：{{$data['inquiry_url']}}</div>
<br>
<div>5営業日以内に連絡をお願いいたします。</div>
<br>
<br>
<div>以上</div>
<br>
@endsection    