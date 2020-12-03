@extends('layouts.email')
@section('content')

<!-- <p>株式会社{{$data['name']}}<p> -->
<div>{{$data['name']}} 様<div>
<br>
<div>Crofun運営局です。</div>
<br>
<div>下記のプロジェクトが期間終了しましたので、ご連絡いたします。</div>
<br>
<div>-----------------------------------------------------------</div>
<br>
<div>プロジェクト名：{{$data['project_name']}}</div>
<div>URL          ：{{$data['project_url']}}</div>
<br>
<div>----------------------------------------------------------</div>
<br>
<div>期間中の活動お疲れでした。</div>
<div>Crofunのサービスはいかがでしたでしょうか。</div>
<div>何かご不明点やご質問がございましたら、ご連絡お待ちしております。</div>
<br>
<div>今後ともCrofunをよろしくお願いします。</div>
<br>


@endsection    