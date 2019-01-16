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

Route::group(['prefix' => 'admin'], function() {
    Route::middleware(['auth'])->group(function() {
    	Route::resource('tanaman','tanamanController');
    	Route::group(['prefix' => 'penyakit'], function() {
    	    Route::get('list','penyakitController@list')->name('penyakit.list');
    	});
    	Route::resource('penyakit','penyakitController');
    	Route::group(['prefix' => 'daerah_gejala'], function() {
    	    Route::get('list','daerahGejalaController@list')->name('daerah_gejala.list');
    	});
    	Route::resource('daerah_gejala','daerahGejalaController');
    	Route::resource('gejala','gejalaController');
    });
});


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
