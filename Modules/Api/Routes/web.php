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

Route::group(['prefix' => 'admin/api', 'as' => 'admin.', 'middleware' => ['web', 'auth', 'verified']], function () {    
    Route::get('/', 'ApiController@index')->name('api.index');
});
