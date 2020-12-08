@extends('layouts.email')
@section('content')
    <div>{{$data['name']}} 様</div>
    <br>
    <div>いつもお世話になっております。<br>Crofun運営局です。</div>
    <div>
        <p>
            {{$data['name']}} 様にご支援いただきましたプロジェクト"{{$data['project_name']}}"の経過報告をいたします。<br>
            現在の資金合計額は"{{$data['amount']}}"円でございまして、<br>目標金額の"{{$data['percentage']}}"％を達成しております。
        </p>
        <p>
            既に、目標金額は超えておりますが、<br>
            せっかくの共感プロジェクトですので、資金が増えるよう<br>
            周りの方へ支援プロジェクトをシェアしたり、<br>お伝えしてあげたりしていただけると嬉しいです。
        </p>
        <p>
            お忙しいところ大変恐縮ですが、<br>何卒よろしくお願い申し上げます。
        </p>
    </div>
@endsection