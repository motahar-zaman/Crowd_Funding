@extends('layouts.email')
@section('content')

<div>{{$data['name']}} 様</div>
<br>
<div>いつもお世話になっております。</div>
<div>Crofun運営局です。</div>
<br>
<div>ご支援いただきましたプロジェクトが期間終了しましたのでご報告をいたします。</div>
<br>
<div>-------------------------------------------------------------</div>
<br>
<div>プロジェクト名：{{$data['project_name']}}</div>
<br>
<div>------------------------------------------------------------</div>
<br>
<div>支援プロジェクトの最終状況はマイページよりご確認いただけます。</div>
<div>URL:https://crofun.jp/user/my-page</div>
<br>
<div>達成・未達成に関わらず、上記プロジェクトへの支援は成立しております。</div>
<div>{{$data['name']}} 様のご支援、誠にありがとうございました。</div>
<br>
<div>今後ともCrofunをよろしくお願いします。</div>
<br>



@endsection    