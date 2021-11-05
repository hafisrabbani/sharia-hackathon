<?php
use Illuminate\Support\Facades\Route;


// Client Routing
Route::get('/login','clientController@loginIndex')->name('client.login');
Route::get('/logout','clientController@logout')->name('client.logout');
Route::post('/login','clientController@loginPost')->name('client.login');

Route::group(['middleware' => 'clientLogin'],function(){
    // Client Menu
    Route::get('/','clientController@index')->name('client.index');
    Route::get('/donasi','clientController@donate')->name('client.donate');
    Route::get('/donasi/{id}','clientController@donateAct')->name('client.donate.action');
    Route::get('/lelang','clientController@lelangIndex')->name('client.lelang');
    Route::get('/lelang/{id}','clientController@lelangAct')->name('client.lelang.action');
});
// Admin Routing
Route::get('/admin/verifikasi/donasi','adminController@donasi')->name('admin.donasi');
Route::get('/admin/verifikasi/lelang','adminController@lelang')->name('admin.lelang');
Route::get('/admin/marketplace','adminController@market')->name('admin.marketplace');