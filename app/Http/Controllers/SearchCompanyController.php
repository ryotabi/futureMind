<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\models\Company;
use App\models\ChatRoom;
use App\models\Message;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Builder;
use Illuminate\Support\Facades\DB;
use App\Services\SearchCompany\GetSearchCompanyData;

class SearchCompanyController extends Controller
{
    public function search(){
        return view('companySearch.search');
    }

    public function searchPost(Request $request){
        $companies = GetSearchCompanyData::GetSearchCompanyData($request);
        return view('companySearch.result',compact('companies'));
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
