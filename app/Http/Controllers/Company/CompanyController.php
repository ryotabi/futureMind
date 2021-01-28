<?php

namespace App\Http\Controllers\company;

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
use App\Services\GetIndustryArray;


class CompanyController extends Controller
{
    //
    public function index(){
        $userId = Auth::user()->id;
        $items = Company::find($userId);
        $chartCompanyData = array();
        if(CompanyDiagnosisData::where('user_id',Auth::user()->id)->first() !== null){
            $companyData = CompanyDiagnosisData::where('user_id',Auth::user()->id)->first();
            $chartCompanyData[] = $companyData->developmentvalue;
            $chartCompanyData[] = $companyData->socialvalue;
            $chartCompanyData[] = $companyData->stablevalue;
            $chartCompanyData[] = $companyData->teammatevalue;
            $chartCompanyData[] = $companyData->futurevalue;
        }
        return view('Company.index',compact('items','chartCompanyData'));
    }
    public function edit(){
        $userId = Auth::user()->id;
        $items = Company::find($userId);
        $chartCompanyData = array();
        if(CompanyDiagnosisData::where('user_id',Auth::user()->id)->first() !== null){
            $companyData = CompanyDiagnosisData::where('user_id',Auth::user()->id)->first();
            $company_data[] = $companyData->developmentvalue;
            $company_data[] = $companyData->socialvalue;
            $company_data[] = $companyData->stablevalue;
            $company_data[] = $companyData->teammatevalue;
            $company_data[] = $companyData->futurevalue;
            for($i = 0;$i<count($company_data);$i++){
                if($company_data[$i]/3<=1){
                    $chartCompanyData[$i] = 1;
                }
                if($company_data[$i]/3>1 && $company_data[$i]/3<=2){
                    $chartCompanyData[$i] = 2;
                }
                if($company_data[$i]/3>2 && $company_data[$i]/3<=3){
                    $chartCompanyData[$i] = 3;
                }
                if($company_data[$i]/3>3 && $company_data[$i]/3<=4){
                    $chartCompanyData[$i] = 4;
                }
                if($company_data[$i]/3>4){
                    $chartCompanyData[$i] = 5;
                }
            }
        }
        $optionIndustry = GetIndustryArray::GetIndustryArray($items->industry);
        return view('Company.edit',compact('items','chartCompanyData','optionIndustry'));
    }
    public function update(Request $request){
        $validate_rules = [
            'name' => 'required',   
            'industry' => 'required',   
            'office' => 'required',   
            'employee' => 'required|integer',   
            'homepage' => 'required|url',   
            'comment' => 'required',   
        ];
        $this->validate($request,$validate_rules);
        $UserId = Auth::user()->id;
        $company = Company::find($UserId);
        if(isset($request->company_icon)){
            $imageFile = $request->company_icon;
            $filenameWithExt = $imageFile->getClientOriginalName();
            $fileName = pathinfo($filenameWithExt,PATHINFO_FILENAME);
            $extension = $imageFile->getClientOriginalExtension();
            $fileNameToStore = $fileName . '_' . time() . '.' . $extension;
            $fileData = file_get_contents($imageFile->getRealPath());
            if($extension == 'jpg'){
                $data_url = 'data:image/jpg;base64,' . base64_encode($fileData);
            }
            if($extension == 'jpeg'){
                $data_url = 'data:image/jpg;base64,' . base64_encode($fileData);
            }
            if($extension == 'png'){
                $data_url = 'data:image/png;base64,' . base64_encode($fileData);
            }
            if($extension == 'gif'){
                $data_url = 'data:image/gif;base64,' . base64_encode($fileData);
            }
            $image = Image::make($data_url);
            $image->resize(150,150)->save(storage_path().'/app/public/images/'.$fileNameToStore);
            $company->company_icon = $fileNameToStore;
            
        }

        $data = $request->all();
        unset($data['_token']);
        $company->name = $request->name;
        $company->industry = $request->industry;
        $company->office = $request->office;
        $company->employee = $request->employee;
        $company->homepage = $request->homepage;
        $company->comment = $request->comment;
        $company->save();
        return redirect('/company');
    }
    public function diagnosis(){
        return view('Company.diagnosis');
    }
    public function diagnosisPost(Request $request){
        if(CompanyDiagnosisData::where('user_id',Auth::user()->id)->first() === null){
            $companyData = new CompanyDiagnosisData;
            $companyData->developmentvalue = $request->developmentvalue/3;
            $companyData->socialvalue = $request->socialvalue/3;
            $companyData->stablevalue = $request->stablevalue/3;
            $companyData->teammatevalue = $request->teammatevalue/3;
            $companyData->futurevalue = $request->futurevalue/3;
            $companyData->user_id = Auth::user()->id;
            $companyData->save();
        }else{
            $companyData = CompanyDiagnosisData::where('user_id',Auth::user()->id)->first();
            $companyData->developmentvalue = $request->developmentvalue/3;
            $companyData->socialvalue = $request->socialvalue/3;
            $companyData->stablevalue = $request->stablevalue/3;
            $companyData->teammatevalue = $request->teammatevalue/3;
            $companyData->futurevalue = $request->futurevalue/3;
            $companyData->save();
        }
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
}
