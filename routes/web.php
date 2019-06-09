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


Route::get('/', 'LoginController@index');
Route::post('/login', 'LoginController@login')->name('login');
Route::get('/logout', 'LoginController@logout')->name('logout');
Route::get('/home', 'HomeController@index')->name('home')->middleware('verify-login');

Route::get('/datakasus', 'DataKasusController@datakasus')->name('datakasus')->middleware('verify-login');
Route::get('/dataimunisasi', 'DataImunisasiController@dataimunisasi')->name('dataimunisasi')->middleware('verify-login');
Route::get('/datajumpenduduk', 'DataJumlahPendudukController@datajumpenduduk')->name('datajumpenduduk')->middleware('verify-login');

Route::get('/kasus', 'KasusController@datakasus')->name('kasus')->middleware('verify-login');


Route::post('/crudkasus', 'DataKasusController@crudkasus')->name('crudkasus')->middleware('verify-login');
Route::post('/destroy', 'DataKasusController@destroy')->name('destroy')->middleware('verify-login');
Route::post('/save-crudkasus', 'DataKasusController@save')->name('crudkasus.create')->middleware('verify-login');
Route::get('/imunisasi', 'ImunisasiController@datakasus')->name('imunisasi')->middleware('verify-login');
Route::get('/jumpenduduk', 'JumlahPendudukController@datakasus')->name('jumpenduduk')->middleware('verify-login');