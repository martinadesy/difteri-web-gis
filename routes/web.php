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

//Auth
Route::get('/', 'LoginController@index');
Route::post('/login', 'LoginController@login')->name('login');
Route::get('/logout', 'LoginController@logout')->name('logout');
Route::get('/home', 'HomeController@index')->name('home')->middleware('verify-login');
//Data
Route::get('/datakasus', 'DataKasusController@datakasus')->name('datakasus')->middleware('verify-login');
Route::get('/dataimunisasi', 'DataImunisasiController@dataimunisasi')->name('dataimunisasi')->middleware('verify-login');
Route::get('/datajumpenduduk', 'DataJumlahPendudukController@datajumpenduduk')->name('datajumpenduduk')->middleware('verify-login');
//CRUD
Route::post('/crudkasus', 'DataKasusController@crudkasus')->name('crudkasus')->middleware('verify-login');
Route::post('/destroy', 'DataKasusController@destroy')->name('destroy')->middleware('verify-login');
Route::post('/save-crudkasus', 'DataKasusController@save')->name('crudkasus.create')->middleware('verify-login');
//Process
Route::get('/bobot', 'BobotController@bobot')->name('bobot')->middleware('verify-login');
Route::get('/naturalbreaks', 'NBController@naturalbreaks')->name('naturalbreaks')->middleware('verify-login');
//Backend
Route::get('/grafikkab', 'GrafikKabController@grafikkab')->name('grafikkab')->middleware('verify-login');
Route::get('/grafikjatim', 'GrafikJatimController@grafikjatim')->name('grafikjatim')->middleware('verify-login');
Route::get('/gis', 'GISController@gis')->name('gis')->middleware('verify-login');
