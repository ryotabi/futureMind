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
        if(FutureDiagnosisData::where('user_id',Auth::user()->id)->first() === null){
            $futureData = new FutureDiagnosisData;
            $futureData->developmentvalue = $request->developmentvalue/3;
            $futureData->socialvalue = $request->socialvalue/3;
            $futureData->stablevalue = $request->stablevalue/3;
            $futureData->teammatevalue = $request->teammatevalue/3;
            $futureData->futurevalue = $request->futurevalue/3;
            $futureData->user_id = Auth::user()->id;
            $futureData->save();
        }else{
            $futureData = FutureDiagnosisData::where('user_id',Auth::user()->id)->first();
            $futureData->developmentvalue = $request->developmentvalue/3;
            $futureData->socialvalue = $request->socialvalue/3;
            $futureData->stablevalue = $request->stablevalue/3;
            $futureData->teammatevalue = $request->teammatevalue/3;
            $futureData->futurevalue = $request->futurevalue/3;
            $futureData->save();
        }

        return redirect('/diagnosis/result');
    }
    public function self(){
        return view('diagnosis.self');
    }
    public function selfPost(Request $request){
        if(SelfDiagnosisData::where('user_id',Auth::user()->id)->first() === null){
            $selfData = new SelfDiagnosisData;
            $selfData->developmentvalue = $request->developmentvalue/3;
            $selfData->socialvalue = $request->socialvalue/3;
            $selfData->stablevalue = $request->stablevalue/3;
            $selfData->teammatevalue = $request->teammatevalue/3;
            $selfData->futurevalue = $request->futurevalue/3;
            $selfData->user_id = Auth::user()->id;
            $selfData->save();
        }else{
            $selfData = SelfDiagnosisData::where('user_id',Auth::user()->id)->first();
            $selfData->developmentvalue = $request->developmentvalue/3;
            $selfData->socialvalue = $request->socialvalue/3;
            $selfData->stablevalue = $request->stablevalue/3;
            $selfData->teammatevalue = $request->teammatevalue/3;
            $selfData->futurevalue = $request->futurevalue/3;
            $selfData->save();
        }
        return redirect('/diagnosis/result');
    }
    public function result(){
        if(SelfDiagnosisData::where('user_id',Auth::user()->id)->first() === null){
            return view('diagnosis.self');
        }
        if(FutureDiagnosisData::where('user_id',Auth::user()->id)->first() === null){
            return view('diagnosis.future');
        }
        $futureData = FutureDiagnosisData::where('user_id',Auth::user()->id)->first();
        $chartFutureData = array();
        $chartFutureData[] = $futureData->developmentvalue;
        $chartFutureData[] = $futureData->socialvalue;
        $chartFutureData[] = $futureData->stablevalue;
        $chartFutureData[] = $futureData->teammatevalue;
        $chartFutureData[] = $futureData->futurevalue;
        $futureMaxes   = array_keys($chartFutureData, max($chartFutureData));
        $futureKey_max = $futureMaxes[0];
        if($futureKey_max === 0){
            $futureComment = '成長意欲';
        }
        if($futureKey_max === 1){
            $futureComment = '社会貢献';
        }
        if($futureKey_max === 2){
            $futureComment = '安定';
        }
        if($futureKey_max === 3){
            $futureComment = '仲間';
        }
        if($futureKey_max === 4){
            $futureComment = '将来性';
        }
        $futureCommentData = FutureDiagnosisComment::where('comment_type',$futureComment)->first();
        $selfData = SelfDiagnosisData::where('user_id',Auth::user()->id)->first();
        $chartSelfData = array();
        $chartSelfData[] = $selfData->developmentvalue;
        $chartSelfData[] = $selfData->socialvalue;
        $chartSelfData[] = $selfData->stablevalue;
        $chartSelfData[] = $selfData->teammatevalue;
        $chartSelfData[] = $selfData->futurevalue;
        $selfMaxes   = array_keys($chartSelfData, max($chartSelfData));
        $selfKey_max = $selfMaxes[0];
        $selfKey_max_sec = $selfMaxes[1];
        if($selfKey_max === 0){
            $selfComment = '成長意欲';
        }
        if($selfKey_max === 1){
            $selfComment = '社会貢献';
        }
        if($selfKey_max === 2){
            $selfComment = '安定';
        }
        if($selfKey_max === 3){
            $selfComment = '仲間';
        }
        if($selfKey_max === 4){
            $selfComment = '将来性';
        }
        if($selfKey_max_sec === 0){
            $selfComment_sec = '成長意欲';
        }
        if($selfKey_max_sec === 1){
            $selfComment_sec = '社会貢献';
        }
        if($selfKey_max_sec === 2){
            $selfComment_sec = '安定';
        }
        if($selfKey_max_sec === 3){
            $selfComment_sec = '仲間';
        }
        if($selfKey_max_sec === 4){
            $selfComment_sec = '将来性';
        }
        $selfCommentData = SelfDiagnosisComment::where('comment_type',$selfComment)->first();
        $selfCommentData_sec = SelfDiagnosisComment::where('comment_type',$selfComment_sec)->first();
        $toFutureMyself = array();
        for($i = 0;$i<count($chartFutureData);$i++){
            $toFutureMyself[$i] = $chartFutureData[$i] - $chartSelfData[$i];
        }
        $toFutureMaxes   = array_keys($toFutureMyself, max($toFutureMyself));
        $toFutureKey_max = $selfMaxes[0];
        if($toFutureKey_max === 0){
            $toFutureComment = '成長意欲';
        }
        if($toFutureKey_max === 1){
            $toFutureComment = '社会貢献';
        }
        if($toFutureKey_max === 2){
            $toFutureComment = '安定';
        }
        if($toFutureKey_max === 3){
            $toFutureComment = '仲間';
        }
        if($toFutureKey_max === 4){
            $toFutureComment = '将来性';
        }
        if(max($toFutureMyself) <= 0){
            $toFutureComment = 'なし';
        }
        $toFutureCommentData = ToFutureComment::where('comment_type',$toFutureComment)->first();
        return view('diagnosis.result',compact('chartFutureData','chartSelfData','futureCommentData','selfCommentData','selfCommentData_sec','toFutureCommentData'));
    }
    public function futureCompany(){
        $futureData = FutureDiagnosisData::where('user_id',Auth::user()->id)->first();
        $development =$futureData->developmentvalue;
        $social =$futureData->socialvalue;
        $stable =$futureData->stablevalue;
        $teammate =$futureData->teammatevalue;
        $future =$futureData->futurevalue;
        $companies = Company::whereHas('diagnosis',function($query) use($development,$social,$stable,$teammate,$future){
                                    $query->where('developmentvalue',$development);
                                    // $query->orWhere('socialvalue',$social);
                                    // $query->orWhere('stablevalue',$stable);
                                    // $query->orWhere('teammatevalue',$teammate);
                                    // $query->orWhere('futurevalue',$future);
                                })
                                ->paginate(6);
        return view('diagnosis.futureCompany',compact('companies'));
    }
    public function selfCompany(){
        $selfData = SelfDiagnosisData::where('user_id',Auth::user()->id)->first();
        $development =$selfData->developmentvalue;
        $social =$selfData->socialvalue;
        $stable =$selfData->stablevalue;
        $teammate =$selfData->teammatevalue;
        $future =$selfData->futurevalue;
        $companies = Company::whereHas('diagnosis',function($query) use($development,$social,$stable,$teammate,$future){
                                    $query->where('developmentvalue',$development);
                                    // $query->orWhere('socialvalue',$social);
                                    // $query->orWhere('stablevalue',$stable);
                                    // $query->orWhere('teammatevalue',$teammate);
                                    // $query->orWhere('futurevalue',$future);
                                })
                                ->paginate(6);
        return view('diagnosis.selfCompany',compact('companies'));
    }
    public function futureSingleCompany($id){
        $company = Company::find($id);
        $companyData = CompanyDiagnosisData::where('user_id',$id)->first();
        $selfData = selfDiagnosisData::where('user_id',Auth::user()->id)->first();
        $forCompanyData = array();
        $forCompanyData[] = $companyData->developmentvalue;
        $forCompanyData[] = $companyData->socialvalue;
        $forCompanyData[] = $companyData->stablevalue;
        $forCompanyData[] = $companyData->teammatevalue;
        $forCompanyData[] = $companyData->futurevalue;
        $forSelfData = array();
        $forSelfData[] = $selfData->developmentvalue;
        $forSelfData[] = $selfData->socialvalue;
        $forSelfData[] = $selfData->stablevalue;
        $forSelfData[] = $selfData->teammatevalue;
        $forSelfData[] = $selfData->futurevalue;
        $forCompanyValue = array();
        for($i = 0;$i<count($forCompanyData);$i++){
            $forCompanyValue[$i] = $forCompanyData[$i] - $forSelfData[$i];
        }
        $forCompanyMaxes   = array_keys($forCompanyValue, max($forCompanyValue));
        $forCompanyKey_max = $forCompanyMaxes[0];
        // $forCompanyKey_max_sec = $forCompanyMaxes[1];
        if($forCompanyKey_max === 0){
            $forCompanyValue = '成長意欲';
        }
        if($forCompanyKey_max === 1){
            $forCompanyValue = '社会貢献';
        }
        if($forCompanyKey_max === 2){
            $forCompanyValue = '安定';
        }
        if($forCompanyKey_max === 3){
            $forCompanyValue = '仲間';
        }
        if($forCompanyKey_max === 4){
            $forCompanyValue = '将来性';
        }
        if(max($forCompanyData) <= 0){
            $forCompanyValue = 'なし';
        }
        // if($forCompanyKey_max_sec === 0){
        //     $forCompanyValue_sec = '成長意欲';
        // }
        // if($forCompanyKey_max_sec === 1){
        //     $forCompanyValue_sec = '社会貢献';
        // }
        // if($forCompanyKey_max_sec === 2){
        //     $forCompanyValue_sec = '安定';
        // }
        // if($forCompanyKey_max_sec === 3){
        //     $forCompanyValue_sec = '仲間';
        // }
        // if($forCompanyKey_max_sec === 4){
        //     $forCompanyValue_sec = '将来性';
        // }
        // if(max($forCompanyData) <= 0){
        //     $forCompanyValue_sec = 'なし';
        // }
        $companyValue = FutureSingleCompanyComment::where('comment_type',$forCompanyValue)->first();
        if(DB::table('likes')->where('user_id',Auth::user()->id)->where('company_id',$id)->exists()){
            $isLiked=true;
        }else{
            $isLiked=false;
        }
        return view('diagnosis.futureSingleCompany',compact('company','companyValue','isLiked'));
    }
    public function selfSingleCompany($id){
        $company = Company::find($id);
        $companyData = CompanyDiagnosisData::where('user_id',$id)->first();
        $futureData = futureDiagnosisData::where('user_id',Auth::user()->id)->first();
        $forCompanyData = array();
        $forCompanyData[] = $companyData->developmentvalue;
        $forCompanyData[] = $companyData->socialvalue;
        $forCompanyData[] = $companyData->stablevalue;
        $forCompanyData[] = $companyData->teammatevalue;
        $forCompanyData[] = $companyData->futurevalue;
        $forFutureData = array();
        $forFutureData[] = $futureData->developmentvalue;
        $forFutureData[] = $futureData->socialvalue;
        $forFutureData[] = $futureData->stablevalue;
        $forFutureData[] = $futureData->teammatevalue;
        $forFutureData[] = $futureData->futurevalue;
        $forCompanyValue = array();
        for($i = 0;$i<count($forCompanyData);$i++){
            $forCompanyValue[$i] = $forFutureData[$i] - $forCompanyData[$i];
        }
        $forCompanyMaxes   = array_keys($forCompanyValue, max($forCompanyValue));
        $forCompanyKey_max = $forCompanyMaxes[0];
        // $forCompanyKey_max_sec = $forCompanyMaxes[1];
        if($forCompanyKey_max === 0){
            $forCompanyValue = '成長意欲';
        }
        if($forCompanyKey_max === 1){
            $forCompanyValue = '社会貢献';
        }
        if($forCompanyKey_max === 2){
            $forCompanyValue = '安定';
        }
        if($forCompanyKey_max === 3){
            $forCompanyValue = '仲間';
        }
        if($forCompanyKey_max === 4){
            $forCompanyValue = '将来性';
        }
        if(max($forCompanyData) <= 0){
            $forCompanyValue = 'なし';
        }
        // if($forCompanyKey_max_sec === 0){
        //     $forCompanyValue_sec = '成長意欲';
        // }
        // if($forCompanyKey_max_sec === 1){
        //     $forCompanyValue_sec = '社会貢献';
        // }
        // if($forCompanyKey_max_sec === 2){
        //     $forCompanyValue_sec = '安定';
        // }
        // if($forCompanyKey_max_sec === 3){
        //     $forCompanyValue_sec = '仲間';
        // }
        // if($forCompanyKey_max_sec === 4){
        //     $forCompanyValue_sec = '将来性';
        // }
        // if(max($forCompanyData) <= 0){
        //     $forCompanyValue_sec = 'なし';
        // }
        $companyValue = SelfSingleCompanyComment::where('comment_type',$forCompanyValue)->first();
        if(DB::table('likes')->where('user_id',Auth::user()->id)->where('company_id',$id)->exists()){
            $isLiked=true;
        }else{
            $isLiked=false;
        }
        return view('diagnosis.selfSingleCompany',compact('company','companyValue','isLiked'));
    }
    
    public function futureLikeCompany(Request $request){
        $company_id = $request->company_id;
        $companyData = CompanyDiagnosisData::where('user_id',$company_id)->first();
        $selfData = selfDiagnosisData::where('user_id',Auth::user()->id)->first();
        $forCompanyData = array();
        $forCompanyData[] = $companyData->developmentvalue;
        $forCompanyData[] = $companyData->socialvalue;
        $forCompanyData[] = $companyData->stablevalue;
        $forCompanyData[] = $companyData->teammatevalue;
        $forCompanyData[] = $companyData->futurevalue;
        $forSelfData = array();
        $forSelfData[] = $selfData->developmentvalue;
        $forSelfData[] = $selfData->socialvalue;
        $forSelfData[] = $selfData->stablevalue;
        $forSelfData[] = $selfData->teammatevalue;
        $forSelfData[] = $selfData->futurevalue;
        $forCompanyValue = array();
        for($i = 0;$i<count($forCompanyData);$i++){
            $forCompanyValue[$i] = $forCompanyData[$i] - $forSelfData[$i];
        }
        $forCompanyMaxes   = array_keys($forCompanyValue, max($forCompanyValue));
        $forCompanyKey_max = $forCompanyMaxes[0];
        // $forCompanyKey_max_sec = $forCompanyMaxes[1];
        if($forCompanyKey_max === 0){
            $forCompanyValue = '成長意欲';
        }
        if($forCompanyKey_max === 1){
            $forCompanyValue = '社会貢献';
        }
        if($forCompanyKey_max === 2){
            $forCompanyValue = '安定';
        }
        if($forCompanyKey_max === 3){
            $forCompanyValue = '仲間';
        }
        if($forCompanyKey_max === 4){
            $forCompanyValue = '将来性';
        }
        if(max($forCompanyData) <= 0){
            $forCompanyValue = 'なし';
        }
        // if($forCompanyKey_max_sec === 0){
        //     $forCompanyValue_sec = '成長意欲';
        // }
        // if($forCompanyKey_max_sec === 1){
        //     $forCompanyValue_sec = '社会貢献';
        // }
        // if($forCompanyKey_max_sec === 2){
        //     $forCompanyValue_sec = '安定';
        // }
        // if($forCompanyKey_max_sec === 3){
        //     $forCompanyValue_sec = '仲間';
        // }
        // if($forCompanyKey_max_sec === 4){
        //     $forCompanyValue_sec = '将来性';
        // }
        // if(max($forCompanyData) <= 0){
        //     $forCompanyValue_sec = 'なし';
        // }
        $companyValue = FutureSingleCompanyComment::where('comment_type',$forCompanyValue)->first();
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
        $companyData = CompanyDiagnosisData::where('user_id',$company_id)->first();
        $futureData = futureDiagnosisData::where('user_id',Auth::user()->id)->first();
        $forCompanyData = array();
        $forCompanyData[] = $companyData->developmentvalue;
        $forCompanyData[] = $companyData->socialvalue;
        $forCompanyData[] = $companyData->stablevalue;
        $forCompanyData[] = $companyData->teammatevalue;
        $forCompanyData[] = $companyData->futurevalue;
        $forFutureData = array();
        $forFutureData[] = $futureData->developmentvalue;
        $forFutureData[] = $futureData->socialvalue;
        $forFutureData[] = $futureData->stablevalue;
        $forFutureData[] = $futureData->teammatevalue;
        $forFutureData[] = $futureData->futurevalue;
        $forCompanyValue = array();
        for($i = 0;$i<count($forCompanyData);$i++){
            $forCompanyValue[$i] = $forFutureData[$i] - $forCompanyData[$i];
        }
        $forCompanyMaxes   = array_keys($forCompanyValue, max($forCompanyValue));
        $forCompanyKey_max = $forCompanyMaxes[0];
        // $forCompanyKey_max_sec = $forCompanyMaxes[1];
        if($forCompanyKey_max === 0){
            $forCompanyValue = '成長意欲';
        }
        if($forCompanyKey_max === 1){
            $forCompanyValue = '社会貢献';
        }
        if($forCompanyKey_max === 2){
            $forCompanyValue = '安定';
        }
        if($forCompanyKey_max === 3){
            $forCompanyValue = '仲間';
        }
        if($forCompanyKey_max === 4){
            $forCompanyValue = '将来性';
        }
        if(max($forCompanyData) <= 0){
            $forCompanyValue = 'なし';
        }
        // if($forCompanyKey_max_sec === 0){
        //     $forCompanyValue_sec = '成長意欲';
        // }
        // if($forCompanyKey_max_sec === 1){
        //     $forCompanyValue_sec = '社会貢献';
        // }
        // if($forCompanyKey_max_sec === 2){
        //     $forCompanyValue_sec = '安定';
        // }
        // if($forCompanyKey_max_sec === 3){
        //     $forCompanyValue_sec = '仲間';
        // }
        // if($forCompanyKey_max_sec === 4){
        //     $forCompanyValue_sec = '将来性';
        // }
        // if(max($forCompanyData) <= 0){
        //     $forCompanyValue_sec = 'なし';
        // }
        $companyValue = SelfSingleCompanyComment::where('comment_type',$forCompanyValue)->first();
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
