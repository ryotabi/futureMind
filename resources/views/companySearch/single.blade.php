@extends('layouts.company_single')
@section('content')
    <main>
    <span id="js_company_developmentValue" data-companydevelopmentvalue="{{$company->diagnosis->developmentvalue}}"></span>
        <span id="js_company_socialValue" data-companysocialvalue="{{$company->diagnosis->socialvalue}}"></span>
        <span id="js_company_stableValue" data-companystablevalue="{{$company->diagnosis->stablevalue}}"></span>
        <span id="js_company_teammateValue" data-companyteammatevalue="{{$company->diagnosis->teammatevalue}}"></span>
        <span id="js_company_futureValue" data-companyfuturevalue="{{$company->diagnosis->futurevalue}}"></span>
        <div class="singleCompany_wrap">
            <div class="singleCompany_title primary_color">{{$company->name}}</div>
            <div class="singleCompany_content">
                <div class="container">
                    <div class="row">
                        <div class="company_chart col-md-6">
                            <canvas id="companyChart" width="60%" height="40%"></canvas>
                        </div>
                        <div class="col-md-6   company_details">
                            <div class="text-center"><img class="company_logo" src="/storage/images/{{$company->company_icon}}" alt=""></div>
                            <div class="company_info">
                                <ul>
                                    <li>企業名:{{$company->name}}</li>
                                    <li>業界：{{$company->industry}}</li>
                                    <li>場所：{{$company->office}}</li>
                                    <li>社員数：{{$company->employee}}人</li>
                                    <li>ホームページ：{{$company->homepage}}</li>
                                    <li>企業からのコメント<br>
                                        {{$company->comment}}
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <script src="{{ asset('js/companyChart.js')}}"></script>

@endsection