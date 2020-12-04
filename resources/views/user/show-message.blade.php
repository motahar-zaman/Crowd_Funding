@extends('main_layout')
@section('custom_css')
    <style type="text/css">
        .wizard > .steps > ul > li {
            width: 20%;
        }

        .amount {
            border: 1px solid black !important;
            padding: 5px;
        }

        .no-border {
            border: none;
        }

        .box {
            border: 1px solid black !important;
        }

        .padding {
            padding: 10px;
        }

        .btn-bottom {
            color: #fff;
            background-color: #868e96;
            border-color: #868e96;
            width: 120px;

        }

        .btn-bottom:hover {
            color: #fff;
            background-color: #727b84;
            border-color: #6c757d;
        }

        .step {
            border: 2px solid #868e96;
        }

        .bg-dark {
            background-color: #CCCCCC;
        }

        tr {
            width: 750px;
        }

        .border-dark {
            border-color: #343a40 !important;
        }

        .form-control {
            border-radius: none !important;
        }

        .chat_box {
            padding: 8px;
            border: 1px solid #d6d6d6;
            background-color: #d6d6d6;
            border-radius: 8px;
            width: 83%
        }

        .text-center {
            text-align: center !important;
        }
    </style>
@stop

@section('ecommerce')
@stop

@section('content')
    @include('user.layouts.tab')
    <div class="container">
        <div class="row container_div">
            <div class="col-12 ">
                <div class="mt20">
                    <div class="row">
                        <div class="col-md-3">
                            @include('user.layouts.message')
                        </div>
                        <div class="col-md-9">
                            @if (session('success'))
                                <div class="row">
                                    <div class="col-md-12">
                                        <h4 class=" bg-info  p-3 text-white">{{ session('success') }}</h4>
                                    </div>
                                </div>
                            @endif
                            <div class="row ml-md-1 well">
                                {!! Form::open(['route' => 'delete-message', 'method' => 'get']) !!}
                                {!! Form::close() !!}

                                <div class="col-md-12 col-12">
                                    <div class="text-right" style="width: 83%">
                                        @if($thread->side_1 != 0)
                                            @if($thread->side_1 == Auth::user()->id)
                                                <span>{{$thread->side2->first_name}}{{$thread->side2->last_name}}</span>
                                            @else
                                                <span>{{$thread->side1->first_name}}{{$thread->side1->last_name}}</span>
                                            @endif
                                        @else
                                            <span>Admin</span>
                                        @endif
                                    </div>
                                    <div class="row">
                                        <div class="col-md-8 col-8 col-sm-8">
                                            <span class="font-weight-bold">{{$thread->title}}</span>
                                        </div>
                                    </div>

                                    <div class="col-md-12 p-0" style="">
                                        @foreach($messages as $msg)
                                            @if($msg->from_id == Auth::user()->id)
                                                <div class="col-md-12 col-12 col-sm-12 p-0 mt-3 text-left">
                                                    <div class="chat_box"
                                                         style="text-align: left; background-color: #96acb7;color:#fff">{!!nl2br($msg->message)!!}</div>
                                                </div>
                                            @else
                                                <div class="col-md-12 col-12 col-sm-12 p-0 mt-3 text-right">
                                                    <div class="chat_box"
                                                         style="text-align: left">{!!nl2br($msg->message)!!}</div>
                                                </div>
                                            @endif
                                        @endforeach
                                        <div>
                                            <div class="row mt-5">
                                                <div class="col-md-10 col-10">
                                                    {!! Form::open(['route' => 'send-reply', 'method' => 'post']) !!}
                                                    <div class="m-0">
                                                        <textarea name="message" rows="4" cols="80" class="form-control" required></textarea>
                                                        <input type="hidden" name="subject" value="{{ $thread->title }}">
                                                        <input type="hidden" name="thread_id" value="{{ $thread->id }}">
                                                        <input type="hidden" name="to_id" value="{{ $lastMessage[0]->from_id }}">
                                                        <input type="hidden" name="reply_message_id" value="{{ $messages[0]->id }}">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-10 col-10 text-center mt-3">
                                                <button type="submit" class="btn btn-md btn-bottom w6-18">更新する</button>
                                            </div>
                                            {!! Form::close() !!}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
			</div>
		</div>
	</div>
@stop
@section('custom_js')
@stop