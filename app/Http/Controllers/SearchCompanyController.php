<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\models\Company;
use App\models\ChatRoom;
use App\models\Message;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Builder;
use Illuminate\Support\Facades\DB;

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
                            ->orWhereBetween('employee',$employee)
                            ->whereHas('diagnosis',function($query) use($development,$social,$stable,$teammate,$future){
                                $query->where('developmentvalue',$development);
                                $query->orWhere('socialvalue',$social);
                                $query->orWhere('stablevalue',$stable);
                                $query->orWhere('teammatevalue',$teammate);
                                $query->orWhere('futurevalue',$future);
                            })
                            ->get();
        return view('companySearch.result',compact('companies'));
    }

    public function result(){
        return view('companySearch.result');
    }

    public function single($id){
        $company = Company::find($id);
        if(DB::table('likes')->where('user_id',Auth::user()->id)->where('company_id',$id)->exists()){
            $isLiked=true;
        }else{
            $isLiked=false;
        }
        if(ChatRoom::where('user_id',Auth::user()->id)->where('company_id',$id)->exists()){
            $chat = true;
            $room_id_column = ChatRoom::where('user_id',Auth::user()->id)->where('company_id',$id)->get(['id']);
            $room = $room_id_column->pluck('id');
            $room_id = $room[0];
        }else{
            $chat = false;
            $room_id = 0;
        }
        $company_id = $id;


        return view('companySearch.single',compact('company','isLiked','chat','room_id','company_id'));
    }

    public function likeCompany(Request $request){
        $company_id = $request->company_id;
        DB::table('likes')->insert(
            ['user_id'=>Auth::user()->id,'company_id'=>$company_id]
        );
        if(DB::table('likes')->where('user_id',Auth::user()->id)->where('company_id',$company_id)->exists()){
            $isLiked=true;
        }else{
            $isLiked=false;
        }
        if(ChatRoom::where('user_id',Auth::user()->id)->where('company_id',$company_id)->first()->exists()){
            $chat = true;
        }else{
            $chat = false;
        }
        $company = Company::find($company_id);
        return view('companySearch.single',compact('company','isLiked','chat'));
    }
}
