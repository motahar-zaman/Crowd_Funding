@extends('layouts.email')
@section('content')


<div>Crofun運営局です。</div>
<br>
<div>この度は、数あるクラウドファンディングサービスの中から弊社のサービス</div>
<div>Crofunにご登録いただき、ありがとうございます。</div>
<br>
<div>下記の情報でアカウントの仮登録が完了しています。</div>
<br>
<div>メールアドレス：{{$data['email']}}</div>
<br>
<div>情報に誤りがなければ下記URLをクリックし、本登録をお願いいたします。</div>
<div>URL：<a href="{{$data['root']}}/register/{{$data['register_token']}}">{{$data['root']}}/register/{{$data['register_token']}}</a></div>
<br>
<div>何かご不明な点やご質問がございましたら、</div>
<div>下記のメールアドレスへお気軽にお問合せください。</div>
<div>メールアドレス：support@crofun.jp</div>
    
@endsection    