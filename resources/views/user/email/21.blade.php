@extends('layouts.email')
@section('content')

<div>{{$data['person_name']}} 様</div>
<br>
<div>いつもお世話になっております。</div>
<br>
<div>Crofunへのお問合せありがとうございました。</div>
<br>
<div>以下の内容でお問合せを受け付けいたしました。</div>
<div>お問合せ内容</div>
<div>----------------------------------------</div>
<br>
<div>{{$data['inquiry']}}</div>
<br>
<div>----------------------------------------</div>
<br>
<div>5営業日以内に、担当者よりご連絡いたしますので<div>
<div>今しばらくお待ちくださいませ。</div>
<br>
@endsection    