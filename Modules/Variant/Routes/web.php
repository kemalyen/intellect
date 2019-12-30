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
 
Route::group(['prefix' => 'admin/variants', 'as' => 'admin.', 'middleware' => ['web', 'auth', 'verified']], function () {    
    Route::get('/', 'VariantController@index')->name('variants.index');
});