<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\models\FutureDiagnosisData;
use App\models\SelfDiagnosisData;
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
            $futureData->developmentvalue = $request->developmentvalue;
            $futureData->socialvalue = $request->socialvalue;
            $futureData->stablevalue = $request->stablevalue;
            $futureData->teammatevalue = $request->teammatevalue;
            $futureData->futurevalue = $request->futurevalue;
            $futureData->user_id = Auth::user()->id;
            $futureData->save();
        }else{
            $futureData = FutureDiagnosisData::where('user_id',Auth::user()->id)->first();
            $futureData->developmentvalue = $request->developmentvalue;
            $futureData->socialvalue = $request->socialvalue;
            $futureData->stablevalue = $request->stablevalue;
            $futureData->teammatevalue = $request->teammatevalue;
            $futureData->futurevalue = $request->futurevalue;
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
            $selfData->developmentvalue = $request->developmentvalue;
            $selfData->socialvalue = $request->socialvalue;
            $selfData->stablevalue = $request->stablevalue;
            $selfData->teammatevalue = $request->teammatevalue;
            $selfData->futurevalue = $request->futurevalue;
            $selfData->user_id = Auth::user()->id;
            $selfData->save();
        }else{
            $selfData = SelfDiagnosisData::where('user_id',Auth::user()->id)->first();
            $selfData->developmentvalue = $request->developmentvalue;
            $selfData->socialvalue = $request->socialvalue;
            $selfData->stablevalue = $request->stablevalue;
            $selfData->teammatevalue = $request->teammatevalue;
            $selfData->futurevalue = $request->futurevalue;
            $selfData->save();
        }
        return redirect('/diagnosis/result');
    }
    public function result(){
        $futureData = FutureDiagnosisData::where('user_id',Auth::user()->id)->first();
        $future_data[] = $futureData->developmentvalue;
        $future_data[] = $futureData->socialvalue;
        $future_data[] = $futureData->stablevalue;
        $future_data[] = $futureData->teammatevalue;
        $future_data[] = $futureData->futurevalue;
        $chartFutureData = array();
        for($i = 0;$i<count($future_data);$i++){
            if($future_data[$i]/3<=1){
                $chartFutureData[$i] = 1;
            }
            if($future_data[$i]/3>1 && $future_data[$i]/3<=2){
                $chartFutureData[$i] = 2;
            }
            if($future_data[$i]/3>2 && $future_data[$i]/3<=3){
                $chartFutureData[$i] = 3;
            }
            if($future_data[$i]/3>3 && $future_data[$i]/3<=4){
                $chartFutureData[$i] = 4;
            }
            if($future_data[$i]/3>4){
                $chartFutureData[$i] = 5;
            }
        }
        $selfData = SelfDiagnosisData::where('user_id',Auth::user()->id)->first();
        $self_data[] = $selfData->developmentvalue;
        $self_data[] = $selfData->socialvalue;
        $self_data[] = $selfData->stablevalue;
        $self_data[] = $selfData->teammatevalue;
        $self_data[] = $selfData->futurevalue;
        $chartSelfData = array();
        for($i = 0;$i<count($self_data);$i++){
            if($self_data[$i]/3<=1){
                $chartSelfData[$i] = 1;
            }
            if($self_data[$i]/3>1 && $self_data[$i]/3<=2){
                $chartSelfData[$i] = 2;
            }
            if($self_data[$i]/3>2 && $self_data[$i]/3<=3){
                $chartSelfData[$i] = 3;
            }
            if($self_data[$i]/3>3 && $self_data[$i]/3<=4){
                $chartSelfData[$i] = 4;
            }
            if($self_data[$i]/3>4){
                $chartSelfData[$i] = 5;
            }
        }
        return view('diagnosis.result',compact('chartFutureData','chartSelfData'));
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
