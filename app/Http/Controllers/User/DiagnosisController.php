<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DiagnosisController extends Controller
{
    //
    public function index(){
        return view('diagnosis.index');
    }
    public function future(){
        return view('diagnosis.future');
    }
    public function self(){
        return view('diagnosis.self');
    }
    public function result(){
        return view('diagnosis.result');
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
