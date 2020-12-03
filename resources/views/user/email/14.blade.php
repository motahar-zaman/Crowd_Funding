@extends('layouts.email')
@section('content')

<div>Crofun管理者用</div>
<br>
<div>下記、新規プロジェクトの申請です。</div>
<br>
<div>お名前：{{$data['person_name']}}</div>
<div>プロジェクト名：{{$data['project_name']}}</div>
<div>プロジェクト申請日：{{$data['project_application_date']}}</div>
<div>プロジェクトURL：{{$data['project_url']}}</div>
<br>
<div>5営業日以内に結果通知をしてください。</div>
<br>
<br>
<div>以上</div>
<br>
@endsection    