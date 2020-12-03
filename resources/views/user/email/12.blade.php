@extends('layouts.email')
@section('content')

<div>{{$data['name']}} 様</div>
<br>
<div>Crofun運営局です。</div>
<br>
<div>メッセージが届いてます。</div>
<div>マイページをログインしてご確認ください。</div>
<div>URL:https://crofun.jp/user/my-page</div>
<br>
<div>何かご不明な点やご質問がございましたら、</div>
<div>下記のメールアドレスへお気軽にお問合せください。</div>
<div>support@crofun.jp</div>
<br>
@endsection    