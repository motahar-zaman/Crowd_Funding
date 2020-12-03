@extends('layouts.email')
@section('content')

<div>Crofun管理者用</div>
<br>
<div>下記の方より、新規登録がありました。</div>
<br>
<div>お名前 : {{$data['name']}} 様</div>
<br>
<br>
<div>以上</div>

@endsection    