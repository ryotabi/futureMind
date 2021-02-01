<?php

namespace App\Listeners;

use App\Events\StudentSelfDiagnosisData;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use App\models\SelfDiagnosisData;


class SetStudentSelfDiagnosisData
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
     * @param  StudentSelfDiagnosisData  $event
     * @return void
     */
    public function handle(StudentSelfDiagnosisData $event)
    {
        if(SelfDiagnosisData::where('user_id',$event->userId)->first() === null){
            $selfData = new SelfDiagnosisData;
            $selfData->developmentvalue = $event->request->developmentvalue/3;
            $selfData->socialvalue = $event->request->socialvalue/3;
            $selfData->stablevalue = $event->request->stablevalue/3;
            $selfData->teammatevalue = $event->request->teammatevalue/3;
            $selfData->futurevalue = $event->request->futurevalue/3;
            $selfData->user_id = $event->userId;
            $selfData->save();
        }else{
            $selfData = SelfDiagnosisData::where('user_id',$event->userId)->first();
            $selfData->developmentvalue = $event->request->developmentvalue/3;
            $selfData->socialvalue = $event->request->socialvalue/3;
            $selfData->stablevalue = $event->request->stablevalue/3;
            $selfData->teammatevalue = $event->request->teammatevalue/3;
            $selfData->futurevalue = $event->request->futurevalue/3;
            $selfData->save();
        }
    }
}
