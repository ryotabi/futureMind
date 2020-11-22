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



Route::name('user.')->namespace('User')->prefix('user')->group(function(){
    Auth::route([
        'register' => true,
        'reset'    => false,
        'verify'   => false
    ]);
    Route::middleware('auth')->group(function(){
        Route::get('/','UserController@index')->name('index');
        Route::get('/edit','UserController@edit')->name('edit');
        Route::post('/edit','UserController@update')->name('update');
    });
});
Route::name('diagnosis.')->namespace('User')->prefix('diagnosis')->group(function(){
    Auth::route([
        'register' => true,
        'reset'    => false,
        'verify'   => false
    ]);
    Route::middleware('auth')->group(function(){
        Route::get('/future', '\DiagnosisController@future')->name('diagnosis.future');
        Route::get('/self', '\DiagnosisController@self')->name('diagnosis.self');
        Route::get('/result', '\DiagnosisController@result')->name('diagnosis.result');
        Route::get('/futureCompany', '\DiagnosisController@futureCompany')->name('diagnosis.futureCompany');
        Route::get('/selfCompany', '\DiagnosisController@selfCompany')->name('diagnosis.selfCompany');
        Route::get('/futureSingleCompany', '\DiagnosisController@futureSingleCompany')->name('diagnosis.futureSingleCompany');
        Route::get('/selfSingleCompany', '\DiagnosisController@selfSingleCompany')->name('diagnosis.selfSingleCompany');
    });
});
// Route::name('company.')->namespace('Company')->prefix('company')->group(function(){
//     Auth::route([
//         'register' => true,
//         'reset'    => false,
//         'verify'   => false
//     ]);
//     Route::middleware('auth:company')->group(function(){
//         Route::get('/','\HomeController@index')->name('index');
//     });
// });
