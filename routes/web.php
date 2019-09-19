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
    Route::get('/input_sarmut', function () {
        return view('sarmut.input_sarmut');
    });
    Route::get('/manajemen_report', function () {
        return view('report.management_report');
    });
    Route::get('/dokumen_pendukung', function () {
        return view('dokumen.dokumen_pendukung');
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

    //Sarmut Mst
    Route::get('/sarmut', 'SarmutController@sarmut_list');
    Route::get('/sarmut/form_sarmut', 'SarmutController@form_sarmut');
    Route::get('/sarmut/edit/form_mstsarmut/{id}', 'SarmutController@form_edit_mstsarmut');
    Route::post('/sarmut/master_sarmut_save', 'SarmutController@save_mst_sarmut');
    Route::post('/sarmut/master_sarmut_edit', 'SarmutController@edit_mst_sarmut');
    Route::get('/sarmut/master_sarmut_delete/{id}', 'SarmutController@delete_mst_sarmut');

    Route::get('getAjax/{action}/{id}', 'MasterController@get_ajax');

    //Sarmut Tx
    Route::get('/txsarmut', 'SarmutController@txsarmut_list');
    Route::get('/txsarmut/form_txsarmut', 'SarmutController@form_txsarmut');
    Route::get('/txsarmut/edit/form_txsarmut/{id}', 'SarmutController@form_edit_txsarmut');
    Route::post('/txsarmut/sarmut_save', 'SarmutController@save_tx_sarmut');
    Route::post('/txsarmut/sarmut_edit', 'SarmutController@edit_tx_sarmut');
    Route::get('/txsarmut/sarmut_delete/{id}', 'SarmutController@delete_tx_sarmut');

     // Dokument
     Route::get('/dokumen/dokumen_pendukung_list', 'DokumenController@dokumen_pendukung_list');
     Route::get('/dokumen/dokumen_pendukung', 'DokumenController@dokumen_pendukung');
    //  Route::post('/master/organization_structure_save', 'MasterController@save_organization_structure');
    //  Route::post('/master/organization_structure_delete', 'MasterController@delete_organization_structure');
    
    // Master
    // Master Indicator
    Route::get('/master/indicator_list', 'MasterController@indicator_list');
    Route::get('/master/form_indicator', 'MasterController@form_indicator');
    Route::get('/master/edit/form_indicator/{id}', 'MasterController@form_edit_indicator');
    Route::post('/master/indicator_save', 'MasterController@save_indicator');
    Route::post('/master/indicator_edit', 'MasterController@edit_indicator');
    Route::get('/master/indicator_delete/{id}', 'MasterController@delete_indicator');

    // Master Indicator Target
    Route::get('/master/indicator_target_list', 'MasterController@indicator_target_list');
    Route::get('/master/form_indicator_target', 'MasterController@form_indicator_target');
    Route::get('/master/edit/form_indicator_target/{id}', 'MasterController@form_edit_indicator_target');
    Route::post('/master/indicator_target_save', 'MasterController@save_indicator_target');
    Route::post('/master/indicator_target_edit', 'MasterController@edit_indicator_target');
    Route::get('/master/indicator_target_delete/{id}', 'MasterController@delete_indicator_target');

    // Master Sub Indicator
    Route::get('/master/sub_indicator_list', 'MasterController@sub_indicator_list');
    Route::get('/master/form_sub_indicator', 'MasterController@form_sub_indicator');
    Route::get('/master/edit/form_sub_indicator/{id}', 'MasterController@form_edit_sub_indicator');
    Route::post('/master/sub_indicator_save', 'MasterController@save_sub_indicator');
    Route::post('/master/sub_indicator_edit', 'MasterController@edit_sub_indicator');
    Route::get('/master/sub_indicator_delete/{id}', 'MasterController@delete_sub_indicator');

     // Master Orgnization Structure
     Route::get('/master/organization_structure', 'MasterController@organization_structure_list');
     Route::get('/master/form_organization_structure', 'MasterController@form_organization_structure');
     Route::post('/master/organization_structure_save', 'MasterController@save_organization_structure');
     Route::post('/master/organization_structure_delete', 'MasterController@delete_organization_structure');

     // Master User
     Route::get('/master/master_user', 'MasterController@master_user_list');
     Route::get('/master/form_master_user', 'MasterController@form_master_user');
     Route::post('/master/master_user_save', 'MasterController@save_master_user');
     Route::post('/master/master_user_delete', 'MasterController@delete_master_user');

    Route::get('/logout', 'Auth\LoginController@logout');

});