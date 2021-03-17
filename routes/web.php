<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/', 'User\DiagnosisController@index')->name('diagnosis.index')->middleware('auth');
Route::group(['namespace'=>'User','prefix'=>'diagnosis','middleware'=>'auth'],function(){
    Route::get('future', 'DiagnosisController@future')->name('diagnosis.future');
    Route::post('future', 'DiagnosisController@futurePost')->name('diagnosis.futurePost');
    Route::get('self', 'DiagnosisController@self')->name('diagnosis.self');
    Route::post('self', 'DiagnosisController@selfPost')->name('diagnosis.selfPost');
    Route::get('result', 'DiagnosisController@result')->name('diagnosis.result');
    Route::get('futureCompany', 'DiagnosisController@futureCompany')->name('diagnosis.futureCompany');
    Route::get('selfCompany', 'DiagnosisController@selfCompany')->name('diagnosis.selfCompany');
    Route::get('futureSingleCompany/{id}', 'DiagnosisController@futureSingleCompany')->name('diagnosis.futureSingleCompany');
    Route::post('futureSingleCompany/{id}', 'DiagnosisController@futureLikeCompany')->name('diagnosis.futureLikeCompany');
    Route::get('selfSingleCompany/{id}', 'DiagnosisController@selfSingleCompany')->name('diagnosis.selfSingleCompany');
    Route::post('selfSingleCompany/{id}', 'DiagnosisController@selfLikeCompany')->name('diagnosis.selfLikeCompany');

});
Route::group(['namespace'=>'User','prefix'=>'user','middleware'=>'auth'],function(){
        Route::get('','UserController@index')->name('user.index');
        Route::get('edit','UserController@edit')->name('user.edit');
        Route::post('edit','UserController@update')->name('user.update');
        Route::get('likes','UserController@likesCompany')->name('user.likes');
        Route::get('chat/{id}','UserController@chat')->name('user.chat');
        Route::post('chat/{id}','UserController@postMessage')->name('user.postMessage');

});

Route::get('/company/login', 'Auth\LoginController@showCompanyLoginForm')->name('company.login');
Route::get('/login/company', 'Auth\LoginController@showCompanyLoginForm');
Route::get('/company/register', 'Auth\RegisterController@showCompanyRegisterForm')->name('company.register');

Route::post('/company/login', 'Auth\LoginController@companyLogin');
Route::post('/company/register', 'Auth\RegisterController@createCompany');
Route::get('/company', 'company\CompanyController@index')->middleware('auth:company')->name('company.home');
Route::get('/company/edit','company\CompanyController@edit')->middleware('auth:company')->name('company.edit');
Route::get('/company/logout','company\CompanyController@logout')->middleware('auth:company')->name('company.logout');
Route::post('/company/edit','company\CompanyController@update')->middleware('auth:company')->name('company.update');
Route::get('/company/diagnosis','company\CompanyController@diagnosis')->middleware('auth:company')->name('company.diagnosis');
Route::post('/company/diagnosis','company\CompanyController@diagnosisPost')->middleware('auth:company')->name('company.diagnosisPost');
Route::get('/company/student','company\CompanyController@student')->middleware('auth:company')->name('company.student');
Route::get('/company/student/{id}','company\CompanyController@singleStudent')->middleware('auth:company')->name('company.singleStudent');
Route::get('/company/chat/{id}','company\CompanyController@chat')->middleware('auth:company')->name('company.chat');
Route::post('/company/chat/{id}','company\CompanyController@postMessage')->middleware('auth:company')->name('company.postMessage');



Route::get('/search','SearchCompanyController@search')->middleware('auth')->name('search.search');
Route::post('/search/result','SearchCompanyController@searchPost')->middleware('auth')->name('search.searchPost');
Route::get('/search/result','SearchCompanyController@searchPost')->middleware('auth')->name('search.result');
Route::get('/search/company/{id}','SearchCompanyController@single')->middleware('auth')->name('search.single');
Route::post('/search/company/{id}','SearchCompanyController@likeCompany')->middleware('auth')->name('search.likeCompany');




