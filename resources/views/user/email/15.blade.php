@extends('layouts.email')
@section('content')

<!-- <p>株式会社{{$data['name']}}</p> -->
<div>{{$data['name']}} 様</div>
<br>
<div>Crofun運営局です。</div>
<br>
<div>先日は、お忙しい中、</div>
<div>プロジェクト申請をお送りいただき、ありがとうございました。</div>
<br>
<div>選考の結果、以下のプロジェクトを掲載することに決定いたしましたのでご連絡いたします。</div>
<br>
<div>【プロジェクト名】</div>
<div>{{$data['project_name']}}</div>
<br>
<div>【プロジェクト概要】</div>
<div>{{$data['project_summary']}}</div>
<br>
<div>【掲載URL】</div>
<div>{{$data['project_url']}}</div>
<br>
<div>新たなビジネスが生まれることを、一同大変嬉しく思っております。</div>
<div>何かご不明な点やご質問がございましたら、お気軽にお問合せください。</div>
<br>

@endsection    