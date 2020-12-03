@extends('main_layout')
@section('title') 
お問い合わせ | Crofun
@stop
@section('custom_css')
<style>
       
		@media (max-width: 575.73px) {
			.submit_button{
				width:100%;
			}
		}
    </style>
@stop

@section('content')

<div class="row breadcrump p-0 m-0 project_sorting">
    <div class="container">
        <div class="row container_div">
            <div class="col-md-12 col-12 ">
                <ul class="list-inline project_category_data pt-4">
                    <li class="list-inline-item">TOP &gt; お問い合わせ</li>
                </ul>
            </div>
        </div>
    </div>
</div>

<div class="container ">
    <div class="mt20"></div>
    <div class="row justify-content-center container_div">
        <div class="card col-md-7">
            <div class="row">
                <div class="col-md-8 col-sm-12 offset-md-2 part_1">
                    @if (session('success_message'))
                        <h4 class="py-2  text-primary ">{{session('success_message')}}</h4>
                    @elseif (session('error_message'))
                        <h4 class="py-2  text-danger">{{session('error_message')}}</h4>
                    @endif
                </div>
            </div>

            <div class="row">
                <div class="col-md-8 col-sm-12 offset-md-2 part_1">
                    <h4 class="font-weight-bold pt-3">お問い合わせフォーム</h4>
                    <h6 class="mt-3">お気軽にお問い合わせください</h6>
                    <h6 class="mt-4 mb-5" style="color:red;">*必須</h6>
                        
                    <form class="form-horizontal" method="POST" action="{{ route('front-contact-action') }}">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label for="name">お名前  <span style="color:red;">*</span> </label>
                            <input type="text" name="name" id="name" class="form-control col-md-6 required" value="{{ isset($username) ? $username : '' }}" required>
                        </div>

                        <div class="form-group">
                            <label for="name">メールアドレス  <span style="color:red;">*</span> </label>
                            <input type="email" name="email" id="email" class="form-control col-md-6 required" value="{{ isset($useremail) ? $useremail : '' }}" required>
                        </div>

                        <div class="form-group">
                            <label for="name">お問い合せ内容  <span style="color:red;">*</span> </label>
                            <textarea name="details" id="details" cols="20" rows="6" class="form-control required" required></textarea>
                        </div>

                        <div class="g-recaptcha "
                            data-sitekey="6Lc0isIZAAAAAC3_JcwmvB-TpOG1mi-lkoKoRLPs">
                        </div>
                        <div>
                            @if(isset($captcha_err))
                                <span style="color: red">{{$captcha_err}}</span>
                            @endif
                        </div>

                        <div class="form-group">
                            <input type="submit"  value="送信" class="btn btn-md btn-primary submit_button" style="cursor:pointer;">
                        </div>
                        
                        <p>内容を確認次第、担当よりご連絡いたします。</p>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@stop

@section('custom_js')



@stop













