<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>futureMind</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.bundle.js"></script>
</head>
<body>
    <main class="register_wrap">
        <div class="bg_line top self_color"></div>
        <div class="bg_line center self_color"></div>
        <div class="bg_line bottom self_color"></div>
        <h1 class="register_title text-center">futureMind</h1>
        <div class="register_form_wrap">
            <form action="{{route('register')}}" method="POST">
            @csrf
                <div class="form-group">
                    <label for="exampleInputEmail1">氏名</label>
                    @if($errors->has('name'))
                    <p class="error-text">{{$errors->first('name')}}</p>
                    @endif
                    <input type="text" class="form-control" id="exampleInputEmail1" name="name"  placeholder="山田太郎">
                </div>
                <div class="form-group">
                    <label for="disabledSelect">卒業年度</label>
                    @if($errors->has('year'))
                    <p class="error-text">{{$errors->first('year')}}</p>
                    @endif
                    <select id="disabledSelect" name="year" class="form-control">
                        <option value="" selected></option>
                        <option value="2022年">2022年</option>
                        <option value="2023年">2023年</option>
                        <option value="2024年">2024年</option>
                        <option value="2025年">2025年</option>
                        <option value="2026年">2026年</option>
                        <option value="2027年">2027年</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">在学大学</label>
                    @if($errors->has('university'))
                    <p class="error-text">{{$errors->first('university')}}</p>
                    @endif
                    <input type="text" class="form-control" id="exampleInputPassword1" name="university" placeholder="○○大学">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">メールアドレス</label>
                    @if($errors->has('email'))
                    <p class="error-text">{{$errors->first('email')}}</p>
                    @endif
                    <input type="email" class="form-control" id="exampleInputPassword1" name="email" placeholder="test@test.com">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">パスワード</label>
                    @if($errors->has('password'))
                    <p class="error-text">{{$errors->first('password')}}</p>
                    @endif
                    <input type="password" class="form-control" id="exampleInputPassword1" name="password" placeholder="*********">
                </div>
                <div class="text-center">
                    <button type="submit" class="btn btn-primary">新規登録</button>
                </div>
                <div class="text-center" style="margin-top:10px;">
                    <a href="{{route('login')}}" >ログイン</a>
                </div>
            </form>
        </div>
    </main>
    <script src="{{ asset('js/app.js')}}"></script>
</body>
</html>
