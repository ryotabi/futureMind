<?php 

namespace App\Services\Diagnosis;

use App\models\FutureDiagnosisComment;
use App\models\SelfDiagnosisComment;
use App\models\ToFutureComment;



class GetDiagnosisCommentData {
    public static function GetFutureDiagnosisCommentData ($chartFutureData) {
        $futureMaxes = array_keys($chartFutureData, max($chartFutureData));
        $futureCommentTypes = [];
        for ($i = 0; $i < count($futureMaxes); $i++) {
            $futureCommentType;
            if($futureMaxes[$i] === 0){
                $futureCommentType = '成長意欲';
            }
            if($futureMaxes[$i] === 1){
                $futureCommentType = '社会貢献';
            }
            if($futureMaxes[$i] === 2){
                $futureCommentType = '安定';
            }
            if($futureMaxes[$i] === 3){
                $futureCommentType = '仲間';
            }
            if($futureMaxes[$i] === 4){
                $futureCommentType = '将来性';
            }
            array_push($futureCommentTypes, $futureCommentType);
        }
        $futureComments = [];
        for ($i = 0; $i < count($futureCommentTypes); $i++) {
            $futureComment = FutureDiagnosisComment::where('comment_type',$futureCommentTypes[$i])->first();
            array_push($futureComments, $futureComment);
        }
        return $futureComments;
    }

    public static function GetSelfDiagnosisCommentData ($chartSelfData) {
        $selfMaxes   = array_keys($chartSelfData, max($chartSelfData));
        $selfCommentTypes = [];
        for ($i = 0; $i < count($selfMaxes); $i++) {
            $selfCommentType;
            if($selfMaxes[$i] === 0){
                $selfCommentType = '成長意欲';
            }
            if($selfMaxes[$i] === 1){
                $selfCommentType = '社会貢献';
            }
            if($selfMaxes[$i] === 2){
                $selfCommentType = '安定';
            }
            if($selfMaxes[$i] === 3){
                $selfCommentType = '仲間';
            }
            if($selfMaxes[$i] === 4){
                $selfCommentType = '将来性';
            }
            array_push($selfCommentTypes, $selfCommentType);
        }
        $selfComments = [];
        for ($i = 0; $i < count($selfCommentTypes); $i++) {
            $selfComment = SelfDiagnosisComment::where('comment_type',$selfCommentTypes[$i])->first();
            array_push($selfComments, $selfComment);
        }
        return $selfComments;
    }

    public static function GetToFutureCommentData($chartFutureData, $chartSelfData) {
        $comparedFutureAndSelfData = array();
        for($i = 0;$i<count($chartFutureData);$i++){
            $comparedFutureAndSelfData[$i] = $chartFutureData[$i] - $chartSelfData[$i];
        }
        $toFutureMaxes   = array_keys($comparedFutureAndSelfData, max($comparedFutureAndSelfData));
        $toFutureCommentTypes = [];
        for ($i = 0; $i < count($toFutureMaxes); $i++) {
            $toFutureCommentType;
            if($toFutureMaxes[$i] === 0){
                $toFutureCommentType = '成長意欲';
            }
            if($toFutureMaxes[$i] === 1){
                $toFutureCommentType = '社会貢献';
            }
            if($toFutureMaxes[$i] === 2){
                $toFutureCommentType = '安定';
            }
            if($toFutureMaxes[$i] === 3){
                $toFutureCommentType = '仲間';
            }
            if($toFutureMaxes[$i] === 4){
                $toFutureCommentType = '将来性';
            }
            array_push($toFutureCommentTypes, $toFutureCommentType);
        }
        $toFutureComments = [];
        for ($i = 0; $i < count($toFutureCommentTypes); $i++) {
            $toFutureComment = ToFutureComment::where('comment_type',$toFutureCommentTypes[$i])->first();
            array_push($toFutureComments, $toFutureComment);
        }
        return $toFutureComments;
    }
}