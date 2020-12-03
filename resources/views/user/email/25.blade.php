@extends('layouts.email')
@section('content')

<div>>Crofun管理者用</div>
<br>
<div>期間終了プロジェクト</div>
<br>
<div>プロジェクト名：{{$data['project_name']}}</div>
<div>ＵＲＬ　　　　：{{$data['project_url']}}</div>
<br>
<br>
<div>以上</div>
<br>

@endsection    