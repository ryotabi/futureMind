@extends('layouts.layout')
@section('content')
    <main>
        <div class="singleCompany_wrap">
            <div class="singleCompany_title future_color">株式会社やる気</div>
            <div class="singleCompany_content">
                <div class="container">
                    <div class="row">
                        <div class="col-md-6 singleCompany_analysis">
                            <div class="analysis_title future_color">あなたが足りない点</div>
                            <div class="analysis_content">
                                <ul>
                                    <li>〇{{$companyValue->comment_type}}<br>
                                    　{{$companyValue->comment}}
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-md-6   company_details">
                            <div class="text-center"><img class="company_logo future_logo" src="/storage/images/{{$company->company_icon}}" alt=""></div>
                            <div class="company_info">
                                <ul>
                                    <li>企業名：{{$company->name}}</li>
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
@endsection