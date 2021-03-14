<?php
namespace App\Services\SearchCompany;

use App\models\Company;


class GetSearchCompanyData {
    public static function GetSearchCompanyData($request) {
        if($request->employee === '~50'){
            $employee = [0,50];
        }
        if($request->employee === '51~100'){
            $employee = [51,100];
        }
        if($request->employee === '101~300'){
            $employee = [101,300];
        }
        if($request->employee === '301~500'){
            $employee = [301,500];
        }
        if($request->employee === '501~1000'){
            $employee = [501,1000];
        }
        if($request->employee === '1000~'){
            $employee = [1001,1000000000];
        }
        $development =$request->development;
        $social =$request->social;
        $stable =$request->stable;
        $teammate =$request->teammate;
        $future =$request->future;
        $companies = Company::where('industry',$request->industry)
                            ->Where('office','LIKE',"%{$request->area}%")
                            ->orWhereBetween('employee',$employee)
                            ->whereHas('diagnosis',function($query) use($development,$social,$stable,$teammate,$future){
                                $query->where('developmentvalue',$development);
                                $query->orWhere('socialvalue',$social);
                                $query->orWhere('stablevalue',$stable);
                                $query->orWhere('teammatevalue',$teammate);
                                $query->orWhere('futurevalue',$future);
                            })
                            ->paginate(6);
        return $companies; 
    }
}