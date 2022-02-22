<?php

use Illuminate\Support\Facades\Route;

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

Route::group(['prefix' => 'stok', 'as' => 'stok.'], function () {
    Route::get('/', 'LogistikController@stok')->name('index');
    Route::post('/', 'LogistikController@stokStore')->name('store');
    Route::get('/{id}', 'LogistikController@stokEdit')->name('edit');
    Route::post('/{id}', 'LogistikController@stokUpdate')->name('update');
    Route::get('/destroy/{id}', 'LogistikController@stokDestroy')->name('destroy');
});


Route::group(['prefix' => 'distribusi', 'as' => 'distribusi.'], function () {
    Route::get('/', 'LogistikController@distribusi')->name('index');
    Route::post('/', 'LogistikController@distribusiStore')->name('store');
    Route::get('/{id}', 'LogistikController@distribusiEdit')->name('edit');
    Route::post('/{id}', 'LogistikController@distribusiUpdate')->name('update');
    Route::get('/destroy/{id}', 'LogistikController@distribusiDestroy')->name('destroy');
});


Route::get('/cek-stok', 'LogistikController@cekStok')->name('cekStok');
