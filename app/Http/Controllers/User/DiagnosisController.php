<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\models\FutureDiagnosisData;
use App\models\SelfDiagnosisData;
use App\models\CompanyDiagnosisData;
use App\models\FutureDiagnosisComment;
use App\models\SelfDiagnosisComment;
use App\models\FutureSingleCompanyComment;
use App\models\SelfSingleCompanyComment;
use App\models\ToFutureComment;
use App\models\Company;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Services\Diagnosis\GetDiagnosisData;
use App\Services\Diagnosis\GetDiagnosisCommentData;
use App\Services\MatchingCompany\GetMatchingCompany;
use App\Events\StudentFutureDiagnosisData;
use App\Events\StudentSelfDiagnosisData;

class DiagnosisController extends Controller
{
    public function index(){
        return view('diagnosis.index');
    }

    public function about() {
        return view('user.about');
    }


    public function future(){
        return view('diagnosis.future');
    }

    public function futurePost(Request $request){
        $userId = Auth::user()->id;
        event(new StudentFutureDiagnosisData($userId,$request));
        return redirect('/diagnosis/result');
    }

    public function self(){
        return view('diagnosis.self');
    }

    public function selfPost(Request $request){
        $userId = Auth::user()->id;
        event(new StudentSelfDiagnosisData($userId,$request));
        return redirect('/diagnosis/result');
    }

    public function result(){
        $userId = Auth::user()->id;
        if(SelfDiagnosisData::where('user_id',$userId)->first() === null){
            return view('diagnosis.self');
        }
        if(FutureDiagnosisData::where('user_id',$userId)->first() === null){
            return view('diagnosis.future');
        }
        $chartFutureData = GetDiagnosisData::GetStudentFutureDiagnosisData($userId);
        $futureComments = GetDiagnosisCommentData::GetFutureDiagnosisCommentData($chartFutureData);
        $chartSelfData = GetDiagnosisData::GetStudentSelfDiagnosisData($userId);
        $selfComments = GetDiagnosisCommentData::GetSelfDiagnosisCommentData($chartSelfData);
        $toFutureComments = GetDiagnosisCommentData::GetToFutureCommentData($chartFutureData,$chartSelfData);
        return view('diagnosis.result',compact('chartFutureData','chartSelfData','futureComments','selfComments','toFutureComments'));
    }

    public function futureCompany(){
        $userId = Auth::user()->id;
        $companies = GetMatchingCompany::GetFutureCompany($userId);
        return view('diagnosis.futureCompany',compact('companies'));
    }

    public function selfCompany(){
        $userId = Auth::user()->id;
        $companies = GetMatchingCompany::GetSelfCompany($userId);
        return view('diagnosis.selfCompany',compact('companies'));
    }

    public function futureSingleCompany($id){
        $company = Company::find($id);
        $userId = Auth::user()->id;
        $companyValue = GetMatchingCompany::GetFutureSingleCompany($id, $userId);
        if(DB::table('likes')->where('user_id',Auth::user()->id)->where('company_id',$id)->exists()){
            $isLiked=true;
        }else{
            $isLiked=false;
        }
        return view('diagnosis.futureSingleCompany',compact('company','companyValue','isLiked'));
    }

    public function selfSingleCompany($id){
        $company = Company::find($id);
        $userId = Auth::user()->id;
        $companyValue = GetMatchingCompany::GetSelfSingleCompany($id, $userId);
        if(DB::table('likes')->where('user_id',Auth::user()->id)->where('company_id',$id)->exists()){
            $isLiked=true;
        }else{
            $isLiked=false;
        }
        return view('diagnosis.selfSingleCompany',compact('company','companyValue','isLiked'));
    }

    public function futureLikeCompany(Request $request){
        $company_id = $request->company_id;
        $userId = Auth::user()->id;
        $companyValue = GetMatchingCompany::GetFutureSingleCompany($company_id, $userId);
        DB::table('likes')->insert(
            ['user_id'=>Auth::user()->id,'company_id'=>$company_id]
        );
        if(DB::table('likes')->where('user_id',Auth::user()->id)->where('company_id',$company_id)->exists()){
            $isLiked=true;
        }else{
            $isLiked=false;
        }
        $company = Company::find($company_id);
        return view('diagnosis.futureSingleCompany',compact('company','companyValue','isLiked'));
    }

    public function selfLikeCompany(Request $request){
        $company_id = $request->company_id;
        $userId = Auth::user()->id;
        $companyValue = GetMatchingCompany::GetSelfSingleCompany($company_id, $userId);
        DB::table('likes')->insert(
            ['user_id'=>Auth::user()->id,'company_id'=>$company_id]
        );
        if(DB::table('likes')->where('user_id',Auth::user()->id)->where('company_id',$company_id)->exists()){
            $isLiked=true;
        }else{
            $isLiked=false;
        }
        $company = Company::find($company_id);
        return view('diagnosis.selfSingleCompany',compact('company','companyValue','isLiked'));
    }
}
