@extends('layouts.email')
@section('content')

<div>{{$data['name']}} 様</div>
<br>
<div>いつもお世話になっております。</div>
<div>Crofun運営局です。</div>
<br>
<div>{{$data['name']}} 様にご支援いただきましたプロジェクト{{$data['project_name']}}の経過報告をいたします。</div>
<div>現在の資金合計額は{{$data['total_amount']}}円でございまして、</div>
<div>目標金額の{{$data['total']}}％を達成しております。</div>
<br>
<div>既に、目標金額は超えておりますが</div>
<div>せっかくの共感プロジェクトですので、資金が増えるよう</div>
<div>周りの方へ支援プロジェクトをシェアしたり、</div>
<div>お伝えしてあげたりしていただけると嬉しいです。</div>
<br>
<div>お忙しいところ大変恐縮ですが、</div>
<div>何卒よろしくお願い申し上げます。</div>
<br>
@endsection    