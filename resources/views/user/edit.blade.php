@extends('layouts.layout')
@section('content')
    <main>
        <div class="user_wrap">
            <div class="container">
                <form action="{{route('user.update')}}" enctype="multipart/form-data" method="POST">
                @csrf
                    <div class="row row_wrap">
                        <div class="col-md-3 info_wrap">
                            <div class="info_title border_future">
                                <p><label for="industry">志望業界</label></p>
                                @if($errors->has('industry'))
                                <p class="error-text">{{$errors->first('industry')}}</p>
                                @endif
                            </div>
                            <div class="info_content">
                                <select id="industry" name="industry" >
                                    <option value="{{$items->industry}}" selected>{{$items->industry}}</option>
                                    @foreach($optionIndustry as $industry)
                                    <option value="{{$industry}}" >{{$industry}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3 info_wrap">
                            <div class="info_title border_future">
                                <p><label for="name">氏名</label></p>
                                @if($errors->has('name'))
                                <p class="error-text">{{$errors->first('name')}}</p>
                                @endif
                            </div>
                            <div class="info_content">
                                <p><input type="text" id="name" name="name" value="{{$items->name}}"></p>
                            </div>
                        </div>
                        <div class="col-md-3 info_wrap">
                            <div class="info_title border_future">
                                <p><label for="year">卒業年度</label></p>
                                @if($errors->has('year'))
                                <p class="error-text">{{$errors->first('year')}}</p>
                                @endif
                            </div>
                            <div class="info_content">
                                <select id="year" name="year" >
                                    <option value="{{$items->year}}" selected>{{$items->year}}</option>
                                    @foreach($optionYear as $year)
                                    <option value="{{$year}}" >{{$year}}</option>
                                    @endforeach
                                </select>
                            </div> 
                        </div>
                    </div>
                    <div class="row row_wrap">
                        <div class="col-md-3 info_wrap">
                            <div class="info_title border_future">
                                <p><label for="club">部活動・サークル</label></p>
                            </div>
                            <div class="info_content">
                                <p><input type="text" id="club" name="club" value="{{$items->club}}"></p>
                            </div>
                        </div>
                        <div class="col-md-3 info_wrap">
                            <div >
                                <img class="info_img" src="http://s-ryota.sakura.ne.jp/futureMind/storage/images/{{$items->img_name}}" alt="画像">
                            </div>
                            <input type="file" name="img_name" value="{{$items->img_name}}">
                            <input type="submit" value="更新" class="toEdit_btn">
                        </div>
                        <div class="col-md-3 info_wrap text-center">
                            <div class="info_title border_self">
                                <p><label for="university">在学学校</label></p>
                                @if($errors->has('university'))
                                <p class="error-text">{{$errors->first('university')}}</p>
                                @endif
                            </div>
                            <div class="info_content">
                                <p><input type="text" id="university" name="university" value="{{$items->university}}"></p>
                            </div>
                        </div>
                    </div>
                    <div class="row row_wrap">
                        <div class="col-md-3 info_wrap">
                            <div class="info_title border_self">
                                <p><label for="hobby">趣味</label></p>
                                @if($errors->has('hobby'))
                                <p class="error-text">{{$errors->first('hobby')}}</p>
                                @endif
                            </div>
                            <div class="info_content">
                                <p><input type="text" id="hobby" name="hobby" value="{{$items->hobby}}"></p>
                            </div>
                        </div>
                        <div class="col-md-3 info_wrap">
                            <div class="info_title border_self">
                                <p><label for="hometown">出身</label></p>
                                @if($errors->has('hometown'))
                                <p class="error-text">{{$errors->first('hometown')}}</p>
                                @endif
                            </div>
                            <div class="info_content">
                                <select id="hometown" name="hometown" >
                                    <option value="{{$items->hometown}}" selected>{{$items->hometown}}</option>
                                    @foreach($optionPrefecture as $hometown)
                                    <option value="{{$hometown}}" >{{$hometown}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3 info_wrap">
                            <div class="info_title border_self">
                                <p><label for="email">メールアドレス</label></p>
                                @if($errors->has('email'))
                                <p class="error-text">{{$errors->first('email')}}</p>
                                @endif
                            </div>
                            <div class="info_content">
                                <p><input type="email" id="email" name="email" value="{{$items->email}}"></p>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </main>
@endsection