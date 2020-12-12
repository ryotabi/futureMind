<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\models\FutureDiagnosisData;
use App\models\SelfDiagnosisData;
use App\models\Company;
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
        $selfData = SelfDiagnosisData::where('user_id',Auth::user()->id)->first();
        $chartSelfData = array();
        $chartSelfData[] = $selfData->developmentvalue;
        $chartSelfData[] = $selfData->socialvalue;
        $chartSelfData[] = $selfData->stablevalue;
        $chartSelfData[] = $selfData->teammatevalue;
        $chartSelfData[] = $selfData->futurevalue;
        return view('diagnosis.result',compact('chartFutureData','chartSelfData'));
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
        return view('diagnosis.selfCompany');
    }
    public function futureSingleCompany(){
        return view('diagnosis.futureSingleCompany');
    }
    public function selfSingleCompany(){
        return view('diagnosis.selfSingleCompany');
    }
}
