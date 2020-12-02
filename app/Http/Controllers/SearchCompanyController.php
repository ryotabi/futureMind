<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SearchCompanyController extends Controller
{
    public function search(){
        return view('companySearch.search');
    }

    public function result(){
        return view('companySearch.result');
    }

    public function single(){
        return view('companySearch.single');
    }
}
