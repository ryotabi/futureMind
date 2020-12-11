<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\models\Company;
use App\Http\Controllers\Builder;

class SearchCompanyController extends Controller
{
    public function search(){
        return view('companySearch.search');
    }

    public function searchPost(Request $request){
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
                            ->whereBetween('employee',$employee)
                            ->whereHas('diagnosis',function($query) use($development,$social,$stable,$teammate,$future){
                                $query->where('developmentvalue',$development);
                                $query->where('socialvalue',$social);
                                $query->where('stablevalue',$stable);
                                $query->where('teammatevalue',$teammate);
                                $query->where('futurevalue',$future);
                            })
                            ->get();
        return view('companySearch.result',compact('companies'));
    }

    public function result(){
        return view('companySearch.result');
    }

    public function single($id){
        $company = Company::find($id);
        return view('companySearch.single',compact('company'));
    }
}
