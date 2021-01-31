<?php
namespace App\Services\User;

class GetIndustryArray {
    public static function GetIndustryArray($selectedIndustry) {
        $optionindustry = [];
        $industry_array = array(
            'メーカー',
            '商社',
            'マスコミ',
            '物流',
            '不動産',
            'IT',
            '医療',
            '教育',
            '流通',
            '金融',
            'コンサルティング',
            '環境',
            'その他'
        );
        for ($i = 0; $i<count($industry_array); $i++) {
            if ($industry_array[$i] === $selectedIndustry) {
                continue;
            }
            array_push($optionindustry,$industry_array[$i]);
        }
        return $optionindustry;
    }
}