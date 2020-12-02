@extends('layouts.layout')
@section('content')
    <main>
        <span id="js_getValue" data-chartValue="{{$num}}"></span>
        <div class="result_wrap">
        <h3 class="diagnosis_title primary_title">分析結果</h3>
        <div class="result_content">
            <div class="container">
                <div class="row">
                    <div class="result_chart">
                        <canvas id="resultChart" width="60%" height="40%"></canvas>
                    </div>
                    <div class="result_text">
                        <div class="result_tabs">
                            <div class="result_tab self_tab checked"><span >今の自分</span></div>
                            <div class="result_tab future_tab"><span >理想の自分</span></div>
                            <div class="result_tab want_tab"><span>なりたい自分へ</span></div>
                        </div>
                        <div class="self_text content_wrap active">
                            <div class="text_wrap">
                                <h3 class="text_title">今の自分</h3>
                                <p class="text_content">
                                    サンプルテキストサンプルテキストサンプルテキストサンプルテキストサンプルテキストサンプルテキストサンプルテキストサンプルテキストサンプルテキストサンプルテキストサンプルテキストサンプルテキストサンプルテキストサンプルテキストサンプルテキスト
                                </p>
                            </div>
                            <div class="result_btn_wrap">
                                <a href="{{route('diagnosis.selfCompany')}}" class="result_btn self_btn"><span>オススメの企業</span></a>
                            </div>
                        </div>
                        <div class="future_text content_wrap">
                            <div class="text_wrap">
                                <h3 class="text_title">理想の自分</h3>
                                <p class="text_content">
                                成長意欲が高く、将来性があることを望んでいるあなたは、高い壁に果敢に挑戦し、それを乗り越えることを望んでいます。
                                生活が目まぐるしく変わり、仲間と共に切磋琢磨しながら、仕事をするのがあなたの理想です。
                                </p>
                            </div>
                            <div class="result_btn_wrap">
                                <a href="{{route('diagnosis.futureCompany')}}" class="result_btn future_btn"><span>オススメの企業</span></a>
                            </div>
                        </div>
                        <div class="gap_text content_wrap">
                            <div class="text_wrap">
                                <h3 class="text_title">理想の自分</h3>
                                <p class="text_content">
                                サンプルテキストサンプルテキストサンプルテキストサンプルテキストサンプルテキストサンプルテキストサンプルテキストサンプルテキストサンプルテキストサンプルテキストサンプルテキストサンプルテキストサンプルテキストサンプルテキストサンプルテキスト
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </main>
@endsection