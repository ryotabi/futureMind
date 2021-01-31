<?php

namespace App\Listeners;

use App\Events\CompanyDiagnosisDataEvent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use App\models\CompanyDiagnosisData;


class SetCompanyDiagnosisData
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
     * @param  CompanyDiagnosisDataEvent  $event
     * @return void
     */
    public function handle(CompanyDiagnosisDataEvent $event)
    {
         unset($event->data['_token']);
        if(CompanyDiagnosisData::where('user_id',$event->companyId)->first() === null){
            $companyData = new CompanyDiagnosisData;
            $companyData->developmentvalue = $event->data['developmentvalue']/3;
            $companyData->socialvalue = $event->data['socialvalue']/3;
            $companyData->stablevalue = $event->data['stablevalue']/3;
            $companyData->teammatevalue = $event->data['teammatevalue']/3;
            $companyData->futurevalue = $event->data['futurevalue']/3;
            $companyData->user_id = $event->companyId;
            $companyData->save();
        }else{
            $companyData = CompanyDiagnosisData::where('user_id',$event->companyId)->first();
            $companyData->developmentvalue = $event->data['developmentvalue']/3;
            $companyData->socialvalue = $event->data['socialvalue']/3;
            $companyData->stablevalue = $event->data['stablevalue']/3;
            $companyData->teammatevalue = $event->data['teammatevalue']/3;
            $companyData->futurevalue = $event->data['futurevalue']/3;
            $companyData->save();
        }
    }
}
