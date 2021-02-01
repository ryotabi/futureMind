<?php 

namespace App\Services\Diagnosis;

use App\models\FutureDiagnosisComment;
use App\models\SelfDiagnosisComment;
use App\models\ToFutureComment;



class GetDiagnosisCommentData {

    public static function GetFutureDiagnosisCommentData ($chartFutureData) {
        $futureMaxes   = array_keys($chartFutureData, max($chartFutureData));
        $futureKey_max = $futureMaxes[0];
        if($futureKey_max === 0){
            $futureComment = '成長意欲';
        }
        if($futureKey_max === 1){
            $futureComment = '社会貢献';
        }
        if($futureKey_max === 2){
            $futureComment = '安定';
        }
        if($futureKey_max === 3){
            $futureComment = '仲間';
        }
        if($futureKey_max === 4){
            $futureComment = '将来性';
        }
        $futureCommentData = FutureDiagnosisComment::where('comment_type',$futureComment)->first();
        return $futureCommentData;
    }

    public static function GetSelfDiagnosisCommentData ($chartSelfData) {
        $selfMaxes   = array_keys($chartSelfData, max($chartSelfData));
        $selfKey_max = $selfMaxes[0];
        $selfKey_max_sec = $selfMaxes[1];
        if($selfKey_max === 0){
            $selfComment = '成長意欲';
        }
        if($selfKey_max === 1){
            $selfComment = '社会貢献';
        }
        if($selfKey_max === 2){
            $selfComment = '安定';
        }
        if($selfKey_max === 3){
            $selfComment = '仲間';
        }
        if($selfKey_max === 4){
            $selfComment = '将来性';
        }
        if($selfKey_max_sec === 0){
            $selfComment_sec = '成長意欲';
        }
        if($selfKey_max_sec === 1){
            $selfComment_sec = '社会貢献';
        }
        if($selfKey_max_sec === 2){
            $selfComment_sec = '安定';
        }
        if($selfKey_max_sec === 3){
            $selfComment_sec = '仲間';
        }
        if($selfKey_max_sec === 4){
            $selfComment_sec = '将来性';
        }
        $selfCommentData = SelfDiagnosisComment::where('comment_type',$selfComment)->first();
        $selfCommentData_sec = SelfDiagnosisComment::where('comment_type',$selfComment_sec)->first();

        return [$selfCommentData, $selfCommentData_sec];
    }

    public static function GetToFutureCommentData($chartFutureData, $chartSelfData) {
        $toFutureMyself = array();
        for($i = 0;$i<count($chartFutureData);$i++){
            $toFutureMyself[$i] = $chartFutureData[$i] - $chartSelfData[$i];
        }
        $toFutureMaxes   = array_keys($toFutureMyself, max($toFutureMyself));
        $toFutureKey_max = $toFutureMaxes[0];
        if($toFutureKey_max === 0){
            $toFutureComment = '成長意欲';
        }
        if($toFutureKey_max === 1){
            $toFutureComment = '社会貢献';
        }
        if($toFutureKey_max === 2){
            $toFutureComment = '安定';
        }
        if($toFutureKey_max === 3){
            $toFutureComment = '仲間';
        }
        if($toFutureKey_max === 4){
            $toFutureComment = '将来性';
        }
        if(max($toFutureMyself) <= 0){
            $toFutureComment = 'なし';
        }
        $toFutureCommentData = ToFutureComment::where('comment_type',$toFutureComment)->first();
        return $toFutureCommentData;
    }
}