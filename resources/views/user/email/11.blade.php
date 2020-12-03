@extends('layouts.email')
@section('content')

<div>{{$data['name']}} 様</div>
<br>
<div>Crofun運営局です。</div>
<br>
<div>この度は、下記プロジェクトへご支援をいただき</div>
<div>誠にありがとうございました。</div>
<br>
<div>----------------------------------------------------------</div>
<br>
<div>起案者：{{$data['founder']}} 様</div>
<div>プロジェクト名：{{$data['project_name']}}</div>
<div>支援コース：{{$data['support_course']}}円</div>
<div>リターン：{{$data['return']}}</div>
<br>
<div>----------------------------------------------------------</div>
<br>
<div>支援プロジェクトの進捗状況はマイページよりご確認いただけます。</div>
<div>起案者様へメッセージを送ることもできますので、</div>
<div>応援メッセージをお伝えいただけると起案者様の励みになると思います。</div>
<div>URL:https://crofun.jp/user/my-page</div>
<br>
<div>それでは、今後とも変わらぬご支援のほどよろしくお願いします。</div>
<br>
@endsection