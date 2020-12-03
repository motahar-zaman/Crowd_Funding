@extends('layouts.email')
@section('content')

<div>Crofun管理者用</div>
<br>
<div>{{$data['person_name']}} 様がプロジェクトに情報を追加しました</div>
<div>下記、プロジェクトの編集です。</div>
<br>
<div>お名前：{{$data['person_name']}}</div>
<div>プロジェクト名：{{$data['project_name']}}</div>
<div>プロジェクト編集日：{{$data['project_application_date']}}</div>
<div>プロジェクトURL：{{$data['project_url']}}</div>
<br>
<div>5営業日以内に結果通知をしてください。</p>
<br>
<br>
<div>以上</div>
<br>

@endsection    