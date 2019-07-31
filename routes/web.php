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

Route::get('/', ['as'=>'login', 'uses'=>'Auth\LoginController@login']);
Route::get('/login','Auth\LoginController@login');
Route::get('/signup','Auth\LoginController@signup');
Route::get('/signin','Auth\LoginController@login');
Route::post('/postlogin','Auth\LoginController@postLogin');
Route::middleware(['auth'])->group(function(){
    // Route::get('/home', function () {
    //     return view('index');
    // });

    Route::get('/master_menu', 'MasterController@master_menu');    
    // Route::get('/dashboard', 'HomeController@index')->name('dashboard');
    Route::get('dashboard', ['as'=>'dashboard', 'uses'=>'HomeController@index']);
    
    // view sementara
    Route::get('/sarmut', function () {
        return view('sarmut.tabel_sarmut');
    });
    Route::get('/input_sarmut', function () {
        return view('sarmut.input_sarmut');
    });
    Route::get('/manajemen_report', function () {
        return view('report.management_report');
    });
    Route::get('/kpi', function () {
        return view('kpi.tabel_kpi');
    });
    Route::get('/tkp', function () {
        return view('tkp.tabel_tingkat_kesehatan');
    });
    Route::get('/sop', function () {
        return view('sop.sop');
    });
    
    // Master
    // Master Indicator
    Route::get('/master/indicator_list', 'MasterController@indicator_list');
    Route::get('/master/form_indicator', 'MasterController@form_indicator');
    Route::post('/master/indicator_save', 'MasterController@save_indicator');
    Route::post('/master/indicator_delete', 'MasterController@delete_indicator');

    // Master Indicator Target
    Route::get('/master/indicator_target_list', 'MasterController@indicator_target_list');
    Route::get('/master/form_indicator_target', 'MasterController@form_indicator_target');
    Route::post('/master/indicator_target_save', 'MasterController@save_indicator_target');
    Route::post('/master/indicator_target_delete', 'MasterController@delete_indicator_target');

    // Master Sub Indicator
    Route::get('/master/sub_indicator_list', 'MasterController@sub_indicator_list');
    Route::get('/master/form_sub_indicator', 'MasterController@form_sub_indicator');
    Route::post('/master/sub_indicator_save', 'MasterController@save_sub_indicator');
    Route::post('/master/sub_indicator_delete', 'MasterController@delete_sub_indicator');

    Route::get('/logout', 'Auth\LoginController@logout');

});