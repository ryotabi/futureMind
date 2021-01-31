<?php 
namespace App\Services\Diagnosis;

use App\models\CompanyDiagnosisData;


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
}