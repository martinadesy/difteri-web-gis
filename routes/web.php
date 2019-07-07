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
Route::get('/', function () {
    return view('welcome');
});
//Auth
Route::get('/index', 'LoginController@index');
Route::post('/login', 'LoginController@login')->name('login');
Route::get('/logout', 'LoginController@logout')->name('logout');
Route::get('/home', 'HomeController@index')->name('home')->middleware('verify-login');
//Data
Route::get('/datakasus', 'DataKasusController@datakasus')->name('datakasus')->middleware('verify-login');
Route::get('/dataimunisasi', 'DataImunisasiController@dataimunisasi')->name('dataimunisasi')->middleware('verify-login');
Route::get('/datajumpenduduk', 'DataJumlahPendudukController@datajumpenduduk')->name('datajumpenduduk')->middleware('verify-login');
//CRUD
Route::post('/crudkasus', 'DataKasusController@crudkasus')->name('crudkasus')->middleware('verify-login');
Route::get('/destroy/{id}', 'DataKasusController@destroy')->name('destroy')->middleware('verify-login');
Route::post('/save-crudkasus', 'DataKasusController@save')->name('crudkasus.create')->middleware('verify-login');
Route::post('/update', 'DataKasusController@update')->name('update.update')->middleware('verify-login');
//Process
Route::get('/bobot', 'BobotController@bobot')->name('bobot')->middleware('verify-login');
Route::get('/bobotall', 'BobotAllController@bobotall')->name('bobotall')->middleware('verify-login');
Route::get('/prioritas', 'PrioritasController@prioritas')->name('prioritas')->middleware('verify-login');
Route::post('/prioritas/update/{id}', 'PrioritasController@update')->name('prioritas.update')->middleware('verify-login');
//Backend
Route::get('/grafiktahunan', 'GrafikTahunanController@grafiktahunan')->name('grafiktahunan')->middleware('verify-login');
Route::get('/grafikall', 'GrafikAllController@grafikall')->name('grafikall')->middleware('verify-login');
Route::get('/gis', 'GISController@gis')->name('gis')->middleware('verify-login');
Route::get('/gis-showgis', 'GISController@showgis')->middleware('verify-login');
Route::get('/gistahunan', 'GisTahunanController@gistahunan')->name('gistahunan')->middleware('verify-login');