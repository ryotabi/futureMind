<?php

namespace App\Listeners;

use App\Events\StudentFutureDiagnosisData;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use App\models\FutureDiagnosisData;

class SetStudentFutureDiagnosisData
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
     * @param  StudentFutureDiagnosisData  $event
     * @return void
     */
    public function handle(StudentFutureDiagnosisData $event)
    {
        if(FutureDiagnosisData::where('user_id',$event->userId)->first() === null){
            $futureData = new FutureDiagnosisData;
            $futureData->developmentvalue = $event->request->developmentvalue/3;
            $futureData->socialvalue = $event->request->socialvalue/3;
            $futureData->stablevalue = $event->request->stablevalue/3;
            $futureData->teammatevalue = $event->request->teammatevalue/3;
            $futureData->futurevalue = $event->request->futurevalue/3;
            $futureData->user_id = $event->userId;
            $futureData->save();
        }else{
            $futureData = FutureDiagnosisData::where('user_id',$event->userId)->first();
            $futureData->developmentvalue = $event->request->developmentvalue/3;
            $futureData->socialvalue = $event->request->socialvalue/3;
            $futureData->stablevalue = $event->request->stablevalue/3;
            $futureData->teammatevalue = $event->request->teammatevalue/3;
            $futureData->futurevalue = $event->request->futurevalue/3;
            $futureData->save();
        }
    }
}
