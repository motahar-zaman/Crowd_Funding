@extends('main_layout')
@section('title')
    {{"ログイン | Crofun"}}
@stop

@section('content')
    <div class="container">
        <div class="row col-md-12 mt-5 mb-5 justify-content-center">
            <form method="POST" action="{{route("facebook-user-email")}}">
                <input type="hidden" name= "_token" value="{{ csrf_token() }}">
                <input type="hidden" name="userId" value="{{$userId}}">
                <label for="email">ご利用のSNSアカウントにメールアドレスを登録してないです！</label><br>
                <label for="email">Crofun.jpをご利用するにはメールアドレスを入力してください。</label><br>
                <input class="ml-5" type="text" name="email" id="email" placeholder=" メール">
                <button type="submit">送信する</button>
            </form>
        </div>
    </div>
@stop