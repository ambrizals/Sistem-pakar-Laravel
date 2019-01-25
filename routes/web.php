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

Route::get('/', 'diagnosaController@index')->name('diagnosa.index');
Route::get('diagnostic/{id}','diagnosaController@preDiagnostic')->name('diagnosa.preform');
Route::post('diagnostic/{id}','diagnosaController@postDiagnostic')->name('diagnosa.start');
Route::get('penyakit/{id}','diagnosaController@penyakit')->name('detail.penyakit');
Route::get('penyakit/{id}/gejalalist','diagnosaController@gejalaList')->name('detail.penyakit.gejala');
Route::get('daftarpenyakit/{id}','diagnosaController@daftarPenyakit')->name('daftar.penyakit');

Route::group(['prefix' => 'admin'], function() {
    Route::middleware(['auth'])->group(function() {
    	Route::resource('tanaman','tanamanController');
    	Route::group(['prefix' => 'penyakit'], function() {
    	    Route::get('list','penyakitController@list')->name('penyakit.list');
            Route::post('{id}/gejala','penyakitController@setGejala')->name('penyakit.setgejala');
            Route::get('{id}/gejalaSuggest', 'penyakitController@gejalaSuggest')->name('penyakit.gejalaSuggest');
            Route::get('{id}/gejalaList','penyakitController@gejalaList')->name('penyakit.gejalalist');
            Route::delete('{id}/gejala','penyakitController@destroyGejala')->name('penyakit.delgejala');
    	});         
    	Route::resource('penyakit','penyakitController');      
    	Route::group(['prefix' => 'daerah_gejala'], function() {
    	    Route::get('list','daerahGejalaController@list')->name('daerah_gejala.list');
    	});
    	Route::resource('daerah_gejala','daerahGejalaController');
        Route::group(['prefix' => 'gejala'], function() {
            Route::get('list','gejalaController@listGejala')->name('gejala.list');
        });
    	Route::resource('gejala','gejalaController');
    });
});
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
