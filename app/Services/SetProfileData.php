<?php

namespace App\Services;

class SetProfileData {
    public static function SetProfileData ($user, $data) {
        unset($data['_token']);
        $company->name = $data['name'];
        $company->industry = $data['industry'];
        $company->office = $data['office'];
        $company->employee = $data['employee'];
        $company->homepage = $data['homepage'];
        $company->comment = $data['comment'];
        $company->save();
    }
}