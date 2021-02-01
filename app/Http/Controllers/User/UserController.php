<?php

namespace App\Http\Controllers\User;
use App\Http\Controllers\Controller;
use App\models\User;
use App\models\Company;
use App\models\ChatRoom;
use App\models\Message;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;
use Illuminate\Http\Request;
use App\Services\User\GetYearArray;
use App\Services\User\GetPrefectureArray;
use App\Services\User\GetIndustryArray;
use App\Services\ImgToDatabase;
use App\Services\GetValidate;
use App\Events\ChatPusher;
use App\Events\StudentProfileData;

class UserController extends Controller
{
    public function index(){
        $UserId = Auth::user()->id;
        $items = User::find($UserId);
        return view('user.index',compact('items'));
    }

    public function edit(){
        $UserId = Auth::user()->id;
        $items = User::find($UserId);
        $optionYear = GetYearArray::GetYearArray($items->year);
        $optionPrefecture = GetPrefectureArray::GetPrefectureArray($items->hometown);
        $optionIndustry = GetIndustryArray::GetIndustryArray($items->industry);
        return view('user.edit',compact('items', 'optionYear','optionPrefecture','optionIndustry'));
    }

    public function update(Request $request){
        $validate_rule = GetValidate::GetStudentEditData();
        $this->validate($request, $validate_rule);
        $user = User::find(Auth::user()->id);
        $data = $request->all();
        event(new StudentProfileData($request,$data, $user));
        return redirect('/user');
    }

    public function likesCompany(){
        $likeCompanies = User::find(Auth::user()->id)->likesCompany()->paginate(6);
        return view('user.likes',compact('likeCompanies'));
    }

    public function chat($id){
        $room_id = $id;
        $company_id_column = ChatRoom::where('id',$room_id)->pluck('company_id');
        $company_id = $company_id_column[0];
        $student_user = User::where('id',Auth::user()->id)->first();
        $company_user = Company::where('id',$company_id)->first();
        if(Message::where('room_id',$room_id)->first() !== null){
            $messages = Message::where('room_id',$room_id)->get(['message','student_user','company_user']);
        }else{
            $messages = null;
        }
        return view('user.chat',compact('room_id','messages','student_user','company_user'));
    }

    public function postMessage(Request $request,$id){
        $message = New Message;
        $message->room_id = $id;
        $message->student_user = Auth::user()->id;
        $message->company_user = 0;
        $message->message = $request->message;
        $message->save();
        event(new ChatPusher($message));
    }
}
