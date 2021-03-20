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
                                    $query->Where('socialvalue',$social);
                                    $query->Where('stablevalue',$stable);
                                    $query->orWhere('teammatevalue',$teammate);
                                    $query->orWhere('futurevalue',$future);
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
                                    $query->Where('socialvalue',$social);
                                    $query->Where('stablevalue',$stable);
                                    $query->orWhere('teammatevalue',$teammate);
                                    $query->orWhere('futurevalue',$future);
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
        $forCompanyCommentTypes = [];
        for($i = 0; $i < count($forCompanyMaxes); $i++) {
            if(max($forCompanyValue) <= 0){
                $commentType = 'なし';
                break;
            }
            if($forCompanyMaxes[$i] === 0){
                $commentType = '成長意欲';
            }
            if($forCompanyMaxes[$i] === 1){
                $commentType = '社会貢献';
            }
            if($forCompanyMaxes[$i] === 2){
                $commentType = '安定';
            }
            if($forCompanyMaxes[$i] === 3){
                $commentType = '仲間';
            }
            if($forCompanyMaxes[$i] === 4){
                $commentType = '将来性';
            }
            array_push($forCompanyCommentTypes, $commentType);
        }
        $forCompanyComments = [];
        for($i = 0; $i < count($forCompanyCommentTypes); $i++) {
            $forCompanyComment = FutureSingleCompanyComment::where('comment_type',$forCompanyCommentTypes[$i])->first();
            array_push($forCompanyComments, $forCompanyComment);
        }
        return $forCompanyComments;
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
        $forCompanyCommentTypes = [];
        for($i = 0; $i < count($forCompanyMaxes); $i++) {
            if(max($forCompanyValue) <= 0){
                $commentType = 'なし';
                break;
            }
            if($forCompanyMaxes[$i] === 0){
                $commentType = '成長意欲';
            }
            if($forCompanyMaxes[$i] === 1){
                $commentType = '社会貢献';
            }
            if($forCompanyMaxes[$i] === 2){
                $commentType = '安定';
            }
            if($forCompanyMaxes[$i] === 3){
                $commentType = '仲間';
            }
            if($forCompanyMaxes[$i] === 4){
                $commentType = '将来性';
            }
            array_push($forCompanyCommentTypes, $commentType);
        }
        $forCompanyComments = [];
        for($i = 0; $i < count($forCompanyCommentTypes); $i++) {
            $forCompanyComment = SelfSingleCompanyComment::where('comment_type',$forCompanyCommentTypes[$i])->first();
            array_push($forCompanyComments, $forCompanyComment);
        }
        return $forCompanyComments;
    }
}