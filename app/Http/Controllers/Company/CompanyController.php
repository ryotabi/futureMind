<?php

namespace App\Http\Controllers\Company;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\models\CompanyDiagnosisData;
use Illuminate\Http\Request;
use App\models\Company;
use App\models\User;
use App\models\Like;
use App\models\ChatRoom;
use App\models\Message;
use Intervention\Image\Facades\Image;
use App\Events\ChatPusher;
use App\Events\CompanyProfileData;
use App\Events\CompanyDiagnosisDataEvent;
use App\Services\User\GetIndustryArray;
use App\Services\ImgToDatabase;
use App\Services\GetValidate;
use App\Services\Diagnosis\GetDiagnosisData;


class CompanyController extends Controller
{
    public function index(){
        $userId = Auth::user()->id;
        $items = Company::find($userId);
        $chartCompanyData = GetDiagnosisData::GetCompanyDiagnosisData($userId);
        return view('Company.index',compact('items','chartCompanyData'));
    }

    public function edit(){
        $userId = Auth::user()->id;
        $items = Company::find($userId);
        $chartCompanyData = GetDiagnosisData::GetCompanyDiagnosisData($userId);
        $optionIndustry = GetIndustryArray::GetIndustryArray($items->industry);
        return view('Company.edit',compact('items','chartCompanyData','optionIndustry'));
    }

    public function update(Request $request){
        $validate_rules = GetValidate::GetCompanyEditValidate();
        $this->validate($request,$validate_rules);
        $UserId = Auth::user()->id;
        $company = Company::find($UserId);
        $data = $request->all();
        event(new CompanyProfileData($company,$data));
        return redirect('/company');
    }

    public function diagnosis(){
        return view('Company.diagnosis');
    }

    public function diagnosisPost(Request $request){
        $companyId = Auth::user()->id;
        $data = $request->all();
        event(new CompanyDiagnosisDataEvent($data, $companyId));
        return redirect('/company');
    }

    public function student(){
        $likeUsers = Company::find(Auth::user()->id)->likesStudent()->paginate(6);
        return view('Company.student',compact('likeUsers'));
    }

    public function singleStudent($id){
        $user = User::find($id);
        $Room = Like::where('company_id',Auth::user()->id)->where('user_id',$user->id)->first();
        $Room_id = $Room->id;
        return view('Company.single',compact('user','Room_id'));
    }

    public function chat(Request $request){
        $student_id = $request->input('student_id');
        if(ChatRoom::where('company_id',Auth::user()->id)->where('user_id',$student_id)->first() === null){
            $chatRoom = New ChatRoom;
            $chatRoom->company_id = Auth::user()->id; 
            $chatRoom->user_id = $student_id; 
            $chatRoom->save();
            $room = ChatRoom::where('company_id',Auth::user()->id)->where('user_id',$student_id)->first();
            $room_id = $room->id;
            $company_user = Company::where('id',Auth::user()->id)->first();
            $student_user = User::where('id',$student_id)->first();
        }else{
            $room = ChatRoom::where('company_id',Auth::user()->id)->where('user_id',$student_id)->first();
            $room_id = $room->id;
            $company_user = Company::where('id',Auth::user()->id)->first();
            $student_user = User::where('id',$student_id)->first();
        }
        if(Message::where('room_id',$room_id)->first() !== null){
            $messages = Message::where('room_id',$room_id)->get(['message','company_user','student_user']);
        }else{
            $messages = null;
        }
        return view('Company.chat',compact('room_id','messages','company_user','student_user'));
    }

    public function postMessage(Request $request,$id){
        $message = New Message;
        $message->room_id = $id;
        $message->company_user = Auth::user()->id;
        $message->student_user = 0;
        $message->message = $request->message;
        $message->save();
        event(new ChatPusher($message));
    }

    public function logout(){
        Auth::logout();
        return redirect('/company/login');
    }
}
