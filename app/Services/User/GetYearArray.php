<?php
namespace App\Services\User;

class GetYearArray {
    public static function GetYearArray($selectedYear) {
        $years = ["2022年", "2023年", "2024年", "2025年" , "2026年", "2027年"];
        $optionYears = [];
        for($i = 0; $i<count($years); $i++){
            if($years[$i] === $selectedYear){
                continue;
            }
            array_push($optionYears,$years[$i]);
        }
        return $optionYears;
    }
}