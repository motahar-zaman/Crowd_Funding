@extends('user.layouts.auth')

@section('content')
<style type="text/css">
    .norightborder:after{
        display: none !important;
    }
</style>
<div class="auth_area">
    <header class="front_header">
        <div class="container">
            <div class="row">
                <div class="col-10 offset-md-1">
                    <a href="{{route('front-home')}}" class="logo_area"><img height="50px" src="{{Request::root()}}/assets/front/img/logo.png"></a>
                </div>
            </div>
        </div>
    </header>

    <section class="auth_page_title">
        <div class="container">
            <div class="row">
                <div class="col-10 offset-md-1">
                    <h1><i class="fa fa-lock" aria-hidden="true"></i> パスワード変更</h1>
                </div>
            </div>
        </div>
    </section>



    <section class="auth_form_area">
        <div class="container">
            <div class="row">
                <div class="col-md-10 offset-md-1 col-sm-12 bg-white area_auth">
                    <div class="row">
                        <div class="col-md-8 offset-md-2 col-sm-12 part_1 norightborder">
                            <h2>パスワード再設定</h2>
                            @if (session('status'))
                                <div class="alert alert-success">
                                    {{ session('status') }}
                                </div>
                            @endif
                            
                            @include('layouts.message')
                
                            <form class="form-horizontal" method="POST" action="{{ route('password.request') }}">
                                {{ csrf_field() }}

                                <input type="hidden" name="token" value="{{ $token }}">

                                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                    <label for="email" class="control-label">登録メールアドレス</label>
                                    <div class="">
                                        <input id="email" type="email" placeholder="登録メールアドレス" class="form-control" name="email" value="{{ $email or old('email') }}" required autofocus>
                                        @if ($errors->has('email'))
                                            <span class="help-block text-danger">
                                                <strong>{{ $errors->first('email') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                    <label for="password" class="control-label">新しいパスワード</label>
                                    <div class="">
                                        <input id="password" type="password" class="form-control" name="password" placeholder="新しいパスワード" required>
                                        @if ($errors->has('password'))
                                            <span class="help-block text-danger">
                                                <strong>{{ $errors->first('password') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                                    <label for="password-confirm" class="control-label">新しいパスワード確認</label>
                                    <div class="">
                                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" placeholder="新しいパスワード確認" required>
                                        @if ($errors->has('password_confirmation'))
                                            <span class="help-block text-danger">
                                                <strong>{{ $errors->first('password_confirmation') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="">
                                        <button type="submit" class="btn btn-primary w6-18">
                                            更新する
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection