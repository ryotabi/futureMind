<?php

namespace App\Services;

class GetValidate {
    public static function GetCompanyEditValidate() {
        $validate_rules = [
            'name' => 'required',   
            'industry' => 'required',   
            'office' => 'required',   
            'employee' => 'required|integer',   
            'homepage' => 'required|url',   
            'comment' => 'required',   
        ];
        return $validate_rules;
    }
}