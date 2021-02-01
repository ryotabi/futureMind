<?php 
namespace App\Services\Diagnosis;

use App\models\CompanyDiagnosisData;
use App\models\FutureDiagnosisData;
use App\models\SelfDiagnosisData;


class GetDiagnosisData {
    public static function GetCompanyDiagnosisData ($userId) {
        $chartCompanyData = array();
        if(CompanyDiagnosisData::where('user_id',$userId)->first() !== null){
            $companyData = CompanyDiagnosisData::where('user_id',$userId)->first();
            $chartCompanyData[] = $companyData->developmentvalue;
            $chartCompanyData[] = $companyData->socialvalue;
            $chartCompanyData[] = $companyData->stablevalue;
            $chartCompanyData[] = $companyData->teammatevalue;
            $chartCompanyData[] = $companyData->futurevalue;
        }
        return $chartCompanyData;
    }

    public static function GetStudentFutureDiagnosisData($userId) {
        $futureData = FutureDiagnosisData::where('user_id',$userId)->first();
        $chartFutureData = array();
        $chartFutureData[] = $futureData->developmentvalue;
        $chartFutureData[] = $futureData->socialvalue;
        $chartFutureData[] = $futureData->stablevalue;
        $chartFutureData[] = $futureData->teammatevalue;
        $chartFutureData[] = $futureData->futurevalue;
        return $chartFutureData;
    }

    public static function GetStudentSelfDiagnosisData($userId) {
        $selfData = SelfDiagnosisData::where('user_id',$userId)->first();
        $chartSelfData = array();
        $chartSelfData[] = $selfData->developmentvalue;
        $chartSelfData[] = $selfData->socialvalue;
        $chartSelfData[] = $selfData->stablevalue;
        $chartSelfData[] = $selfData->teammatevalue;
        $chartSelfData[] = $selfData->futurevalue;
        return $chartSelfData;
    }
}