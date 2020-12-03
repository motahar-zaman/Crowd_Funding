@extends('admin.layouts.main')

@section('content')

<!-- Page Content-->
        <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    Add New Admin User
                    <a href="{{ route('admin-admin-user-list') }}" class="btn btn-success btn-sm pull-right"><i class="fa fa-list"></i> 管理者一覧 </a>
                </div>
                <div class="card-body">
                <form role="form" action="{{ route('admin-admin-user-add-action') }}" method="post">
                     <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <div class="form-body">

                        <div class="form-group">
                            <label class="">氏名 <span class="text-danger">*</span> : </label>
                                <div class="">
                                        <input type="text" name="name" value="{{ old('name') }}" class="form-control " placeholder="Name">
                                </div>
                                <div class="red">{{ $errors->first('name') }}</div>
                        </div>

                        <div class="form-group">
                            <label class="">メールアドレス <span class="text-danger">*</span> : </label>
                                <div class="">
                                        <input type="text" name="email" value="{{ old('email') }}" class="form-control " placeholder="Email">
                                </div>
                                <div class="red">{{ $errors->first('email') }}</div>
                        </div>

                        <div class="form-group">
                            <label class="">パスワード <span class="text-danger">*</span> : </label>
                                <div class="">
                                        <input type="text" name="password" value="{{ old('password') }}" class="form-control " placeholder="password">
                                </div>
                                <div class="red">{{ $errors->first('password') }}</div>
                        </div>


                        {{--<div class="form-group">
                                <label class="">状態 <span class="red">*</span> : </label>
                                <div class="">
                                    <div class="mt-radio-inline">
                                        <label class="mt-radio">
                                            <input type="radio" name="status" value="1" @if(old('status') == 1) checked @endif> Enable
                                            <span></span>
                                        </label>
                                        <label class="mt-radio">
                                            <input type="radio" name="status" value="0" @if(old('status') == 0) checked @endif> Disable
                                            <span></span>
                                        </label>
                                    </div>
                                    <div class="red">{{ $errors->first('status') }}</div>
                                </div>
                        </div>     --}}                                       

                        <div class="form-actions">
                                <button type="submit" class="btn blue">追加</button>
                                {{--<a href="{{ route('admin-admin-user-list') }}" class="btn default">Cancel</a>--}}
                        </div>
                   </div> 
                </form>
            </div>
            </div>
        </div>

        
    </div>
<!-- Page Content-->
@stop


@section('custom_js')


@stop