<?php

namespace App\Http\Controllers\company;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\models\Company;

class CompanyController extends Controller
{
    //
    public function index(){
        $userId = Auth::user()->id;
        $items = Company::find($userId);
        return view('Company.index',compact('items'));
    }
    public function edit(){
        $userId = Auth::user()->id;
        $items = Company::find($userId);
        return view('Company.edit',compact('items'));
    }
    public function update(Request $request){
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
        }
        $UserId = Auth::user()->id;
        $company = Company::find($UserId);
        $data = $request->all();
        unset($data['_token']);
        $company->fill($data);
        if(isset($request->comapny_icon)){
            $company->company_icon = $fileNameToStore;
        }
        $company->save();
        return redirect('/company');
    }
    public function diagnosis(){
        return view('Company.diagnosis');
    }
}
