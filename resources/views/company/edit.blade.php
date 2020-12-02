@extends('layouts.company_header')

@section('content')
<main>
        <div class="singleCompany_wrap">
            <div class="companyProfile_title">プロフィール編集</div>
            <div class="singleCompany_content mt-0">
                <div class="container">
                    <div class="row">
                        <div class="company_chart col-md-6">
                            <canvas id="companyChart" width="60%" height="40%"></canvas>
                        </div>
                        <div class="col-md-6  company_details">
                            <form action="{{route('company.update')}}" method="POST" enctype="multipart/form-data">
                            @csrf
                                <div class="text-center">
                                    <img class="company_logo company_admin" src="/storage/images/{{$items->company_icon}}" alt="">
                                </div>
                                <div class="text-center mb-10"><input type="file" name="company_icon"></div>
                                <div class="company_info company_edit">
                                    <ul>
                                        <li><label for="company">企業名</label>：<input type="text" id="company" name="name" value="{{$items->name}}"></li>
                                        <li><label for="industry">業界</label>：<input type="text" id="industry" name="industry" value="{{$items->industry}}"></li>
                                        <li><label for="office">場所</label>：<input type="text" id="office" name="office" value="{{$items->office}}"></li>
                                        <li><label for="employee">社員数</label>：約<input type="text" id="employee" name="employee" value="{{$items->employee}}">人</li>
                                        <li><label for="homepage">ホームページ</label>：<input type="text" id="homepage" name="homepage" value="{{$items->homepage}}"></li>
                                        <li><label for="comment">企業からのコメント</label><br>
                                            <textarea type="text" id="comment" name="comment" style="width:100%;">{{$items->comment}}</textarea>
                                        </li> 
                                    </ul>
                                </div>
                        </div>
                    </div>
                    <div class="text-center">
                        <button type="submit" class="toEdit_btn">更新</button>
                    </div>
                    </form>

                </div>
            </div>
        </div>
    </main>
@endsection
