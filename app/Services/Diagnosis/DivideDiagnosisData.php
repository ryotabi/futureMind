<?php

namespace App\Services\Diagnosis;




class DivideDiagnosisData extends Controller
{
    public static function DivideDiagnosisData($data,$request){
        $Data->developmentvalue = $request->developmentvalue/3;
        $Data->socialvalue = $request->socialvalue/3;
        $Data->stablevalue = $request->stablevalue/3;
        $Data->teammatevalue = $request->teammatevalue/3;
        $Data->futurevalue = $request->futurevalue/3;
    }
}
