@extends('layouts.company_header')

@section('content')
<main>
        @if(isset($chartCompanyData[0]))
        <span id="js_company_developmentValue" data-companydevelopmentvalue="{{$chartCompanyData[0]}}"></span>
        <span id="js_company_socialValue" data-companysocialvalue="{{$chartCompanyData[1]}}"></span>
        <span id="js_company_stableValue" data-companystablevalue="{{$chartCompanyData[2]}}"></span>
        <span id="js_company_teammateValue" data-companyteammatevalue="{{$chartCompanyData[3]}}"></span>
        <span id="js_company_futureValue" data-companyfuturevalue="{{$chartCompanyData[4]}}"></span>
        @endif
        <div class="singleCompany_wrap">
            <div class="companyProfile_title">プロフィール</div>
            <p class="companyProfile_text">（以下の情報が企業データとして記載されます）</p>
            <div class="singleCompany_content mt-0">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-6 company_chart">
                            <canvas id="companyChart" width="60%" height="40%"></canvas>
                        </div>
                        <div class="col-xl-6 company_details">
                            <div class="text-center">
                                <img class="company_logo" src="/storage/app/public/images/{{$items->company_icon}}" alt="">
                            </div>
                            <div class="company_info">
                                <ul>
                                    <li>企業名：{{$items->name}}</li>
                                    <li>業界：{{$items->industry}}</li>
                                    <li>場所：{{$items->office}}</li>
                                    <li>社員数：{{$items->employee}}人</li>
                                    <li>ホームページ：{{$items->homepage}}</li>
                                    <li class="company_comment">企業からのコメント<br>{{$items->comment}}</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="text-center">
                        <a href="{{route('company.edit')}}" class="toEdit_btn">編集</a>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
