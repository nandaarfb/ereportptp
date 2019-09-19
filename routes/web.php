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
    Route::get('/manajemen_report', function () {
        return view('report.management_report');
    });
    Route::get('/sop', function () {
        return view('sop.sop');
    });

    Route::get('getAjax/{action}/{id}', 'MasterController@get_ajax');

    //Sarmut
    //Sarmut Mst
    Route::get('/sarmut', 'SarmutController@sarmut_list');
    Route::get('/sarmut/form_sarmut', 'SarmutController@form_sarmut');
    Route::get('/sarmut/edit/form_mstsarmut/{id}', 'SarmutController@form_edit_mstsarmut');
    Route::post('/sarmut/master_sarmut_save', 'SarmutController@save_mst_sarmut');
    Route::post('/sarmut/master_sarmut_edit', 'SarmutController@edit_mst_sarmut');
    Route::get('/sarmut/master_sarmut_delete/{id}', 'SarmutController@delete_mst_sarmut');


    //Sarmut Tx
    Route::get('/txsarmut', 'SarmutController@txsarmut_list');
    Route::get('/txsarmut/form_txsarmut', 'SarmutController@form_txsarmut');
    Route::get('/txsarmut/edit/form_txsarmut/{id}', 'SarmutController@form_edit_txsarmut');
    Route::post('/txsarmut/sarmut_save', 'SarmutController@save_tx_sarmut');
    Route::post('/txsarmut/sarmut_edit', 'SarmutController@edit_tx_sarmut');
    Route::get('/txsarmut/sarmut_delete/{id}', 'SarmutController@delete_tx_sarmut');
    Route::get('/input_sarmut', 'SarmutController@form_input_sarmut'); 

    //KPI
    //KPI Mst
    Route::get('/kpi', 'KPIController@kpi_list');
    Route::get('/kpi/form_kpi', 'KPIController@form_kpi');
    Route::get('/kpi/edit/form_mstkpi/{id}', 'KPIController@form_edit_mstkpi');
    Route::post('/kpi/master_kpi_save', 'KPIController@save_mst_kpi');
    Route::post('/kpi/master_kpi_edit', 'KPIController@edit_mst_kpi');
    Route::get('/kpi/master_kpi_delete/{id}', 'KPIController@delete_mst_kpi');


    //KPI Tx
    Route::get('/txkpi', 'KPIController@txkpi_list');
    Route::get('/txkpi/form_txkpi', 'KPIController@form_txkpi');
    Route::get('/txkpi/edit/form_txkpi/{id}', 'KPIController@form_edit_txkpi');
    Route::post('/txkpi/kpi_save', 'KPIController@save_tx_kpi');
    Route::post('/txkpi/kpi_edit', 'KPIController@edit_tx_kpi');
    Route::get('/txkpi/kpi_delete/{id}', 'KPIController@delete_tx_kpi');
    Route::get('/input_kpi', 'KPIController@form_input_kpi');

    //TKP
    //TKP Mst
    Route::get('/tkp', 'TKPController@tkp_list');
    Route::get('/tkp/form_tkp', 'TKPController@form_tkp');
    Route::get('/tkp/edit/form_msttkp/{id}', 'TKPController@form_edit_msttkp');
    Route::post('/tkp/master_tkp_save', 'TKPController@save_mst_tkp');
    Route::post('/tkp/master_tkp_edit', 'TKPController@edit_mst_tkp');
    Route::get('/tkp/master_tkp_delete/{id}', 'TKPController@delete_mst_tkp');


    //TKP Tx
    Route::get('/txtkp', 'TKPController@txtkp_list');
    Route::get('/txtkp/form_txtkp', 'TKPController@form_txtkp');
    Route::get('/txtkp/edit/form_txtkp/{id}', 'TKPController@form_edit_txtkp');
    Route::post('/txtkp/tkp_save', 'TKPController@save_tx_tkp');
    Route::post('/txtkp/tkp_edit', 'TKPController@edit_tx_tkp');
    Route::get('/txtkp/tkp_delete/{id}', 'TKPController@delete_tx_tkp');
    Route::get('/input_tkp', 'TKPController@form_input_tkp');
    
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