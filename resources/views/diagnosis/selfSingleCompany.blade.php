@extends('layouts.layout')
@section('content')
    <main>
        <div class="singleCompany_wrap">
            <div class="singleCompany_title self_color">株式会社やる気</div>
            <div class="singleCompany_content">
                <div class="container">
                    <div class="row">
                        <div class="col-md-6 singleCompany_analysis">
                            <div class="analysis_title self_color">あなたに物足りない点</div>
                            <div class="analysis_content">
                                <ul>
                                    <li>〇安定<br>
                                    　この企業は、新しい技術や新規事業に積極的に挑戦しています。そのため、毎日の業務が忙しい上に新しい技術を常に吸収しなければいけないため、あなたが求める安定は手に入りにくいかもしれません。
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-md-6  company_details">
                        <div class="text-center"><img class="company_logo self_logo" src="/storage/images/{{$company->company_icon}}" alt=""></div>
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