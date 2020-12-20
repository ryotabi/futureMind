<?php

namespace App\models;

use App\models\Company;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $fillable = [
        'name', 'email', 'password','year','university','industry','hobby','club','hometown'
    ];

    public function likesCompany(){
        return $this->belongsToMany('App\models\Company','likes','user_id','company_id');
    }
}
