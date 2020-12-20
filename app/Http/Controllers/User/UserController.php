<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\models\User;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;
use Illuminate\Http\Request;

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
        return view('user.edit',compact('items'));
    }
    public function update(Request $request){
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
}
