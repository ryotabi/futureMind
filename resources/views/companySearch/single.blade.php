@extends('layouts.company_single')
@section('content')
    <main>
        <div class="singleCompany_wrap">
            <div class="singleCompany_title primary_color">株式会社やる気</div>
            <div class="singleCompany_content">
                <div class="container">
                    <div class="row">
                        <div class="company_chart col-md-6">
                            <canvas id="companyChart" width="60%" height="40%"></canvas>
                        </div>
                        <div class="col-md-6   company_details">
                            <div class="company_logo"></div>
                            <div class="company_info">
                                <ul>
                                    <li>企業名：株式会社やる気</li>
                                    <li>業界：不動産</li>
                                    <li>場所：東京都港区〇〇ー○○</li>
                                    <li>社員数：100人</li>
                                    <li>ホームページ：https:test.com</li>
                                    <li>企業からのコメント<br>
                                        株式会社やる気では、やる気に満ち溢れた成長意欲の高い人を求めています。一緒に日本の明日を作りましょう。
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