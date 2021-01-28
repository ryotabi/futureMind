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
use App\Services\GetYearArray;
use App\Services\GetPrefectureArray;
use App\Services\GetIndustryArray;

use App\Events\ChatPusher;


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
        // $years = ["2022年", "2023年", "2024年", "2025年" , "2026年", "2027年"];
        // $optionYears = [];
        // for($i = 0; $i<count($years); $i++){
        //     if($years[$i] === $items->year){
        //         continue;
        //     }
        //     array_push($optionYears,$years[$i]);
        // }
        $optionYear = GetYearArray::GetYearArray($items->year);
        $optionPrefecture = GetPrefectureArray::GetPrefectureArray($items->hometown);
        $optionIndustry = GetIndustryArray::GetIndustryArray($items->industry);
        return view('user.edit',compact('items', 'optionYear','optionPrefecture','optionIndustry'));
    }
    public function update(Request $request){
        $validate_rule = [
            'industry' => 'required',
            'name' => 'required',
            'year' => 'required',
            'university' => 'required',
            'hobby' => 'required',
            'hometown' => 'required',
            'email' => 'required|email',
        ];
        $this->validate($request, $validate_rule);
        if(isset($request->img_name)){
            $imageFile = $request->img_name;
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
        }
        $UserId = Auth::user()->id;
        $user = User::find($UserId);
        $data = $request->all();
        unset($data['_token']);
        $user->fill($data);
        if(isset($request->img_name)){
            $user->img_name = $fileNameToStore;
        }
        $user->save();
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
