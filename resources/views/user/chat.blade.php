@extends('layouts.layout')
@section('content')
    <main>
        <div class="chat_wrap">
            <div class="container">
            <h3 class="chat_title">チャット</h3>
                <div class="row">
                    <div class="col-md-3">
                        <div class="text-center">
                            <p class="chat_name">{{$company_user->name}}</p>
                            <img class="chat_img" src="/storage/images/{{$company_user->company_icon}}" alt="画像">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="message_wrap message_wrap_student">
                            @if(isset($messages))
                            @foreach($messages as $message)
                            @if($message->student_user !== 0)
                            <div class="text-right">
                                <div class="balloon1-right">
                                    <p>{{$message->message}}</p>
                                </div>
                            </div>
                            @elseif($message->student_user === 0)
                            <div>
                                <div class="balloon1-left">
                                    <p>{{$message->message}}</p>
                                </div>
                            </div>
                            @endif
                            @endforeach
                            @endif
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="text-center">
                            <p class="chat_name">あなた</p>
                            <img class="chat_img" src="/storage/images/{{$student_user->img_name}}" alt="画像">
                        </div>
                    </div>
                </div>
                <form action="{{route('user.postMessage',['id'=>$room_id])}}" method="POST" class="chat_form_wrap ">
                    @csrf
                    <div class="input-group mb-3 chat_form">
                        <input type="text" class="form-control chat_input" name="message" aria-label="Recipient's username" aria-describedby="button-addon2">
                        <div class="input-group-append chat_btn_wrap">
                            <button class="btn btn-outline-secondary chat_btn" type="submit" >送信</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </main>
@endsection