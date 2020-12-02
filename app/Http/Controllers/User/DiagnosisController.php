<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\models\Test;
use Illuminate\Support\Facades\Auth;


class DiagnosisController extends Controller
{
    //
    public function index(){
    
        return view('diagnosis.index');
    }
    public function future(){
        return view('diagnosis.future');
    }
    public function futurePost(Request $request){
        // dd($request->value);
        $test = new Test;
        $test->test_value = $request->value;
        $test->save();
        return redirect('/diagnosis/result');
    }
    public function self(){
        return view('diagnosis.self');
    }
    public function result(){
        $test = Test::find(Auth::user()->id);
        $num = $test->test_value;
        if($num<=10){
            $num = 1;
        }
        if($num>10 && $num<=20){
            $num = 2;
        }
        if($num>20 && $num<=30){
            $num = 3;
        }
        if($num>30 && $num<=40){
            $num = 4;
        }
        if($num>40){
            $num = 5;
        }
        return view('diagnosis.result',compact('num'));
    }
    public function futureCompany(){
        return view('diagnosis.futureCompany');
    }
    public function selfCompany(){
        return view('diagnosis.selfCompany');
    }
    public function futureSingleCompany(){
        return view('diagnosis.futureSingleCompany');
    }
    public function selfSingleCompany(){
        return view('diagnosis.selfSingleCompany');
    }
}
