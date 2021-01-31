<?php

namespace App\Listeners;

use App\Events\DiagnosisData;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use App\models\CompanyDiagnosisData;


class CreateDiagnosisData
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  DiagnosisData  $event
     * @return void
     */
    public function handle(DiagnosisData $event)
    {
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
    }
}
