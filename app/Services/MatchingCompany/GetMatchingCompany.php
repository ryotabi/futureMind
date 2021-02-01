<?php

namespace App\Services\MatchingCompany;

use App\models\FutureDiagnosisData;
use App\models\SelfDiagnosisData;
use App\models\Company;
use App\models\FutureSingleCompanyComment;
use App\models\CompanyDiagnosisData;
use App\models\SelfSingleCompanyComment;





class GetMatchingCompany {
    public static function GetFutureCompany($userId) {
        $futureData = FutureDiagnosisData::where('user_id',$userId)->first();
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
        return $companies;
    }

    public static function GetSelfCompany($userId) {
        $selfData = SelfDiagnosisData::where('user_id',$userId)->first();
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
        return $companies;
    }

    public static function GetFutureSingleCompany($id, $userId) {
        $companyData = CompanyDiagnosisData::where('user_id',$id)->first();
        $selfData = selfDiagnosisData::where('user_id',$userId)->first();
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
        return $companyValue;
    }

    public static function GetSelfSingleCompany($id, $userId) {
        $companyData = CompanyDiagnosisData::where('user_id',$id)->first();
        $futureData = futureDiagnosisData::where('user_id',$userId)->first();
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
        return $companyValue;
    }
}