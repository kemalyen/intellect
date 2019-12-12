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

Auth::routes(['verify' => true]);

/**
 * Backend routes
 */
Route::group(['prefix' => 'admin', 'as' => 'admin.', 'middleware' => ['web', 'auth', 'verified'], 'namespace' => 'Admin'], function () {

    // Dashboard
    Route::get('/', 'DashboardController@index')->name('dashboard');

    // Products
    Route::get('/products', ['as' => 'products.index', 'uses' => 'ProductController@index']);
    Route::get('/products/data', ['as' => 'products.data', 'uses' => 'ProductController@data']);
    Route::get('/products/{product}/view', ['as' => 'products.view', 'uses' => 'ProductController@view']);
    Route::get('/products/{product}/pricing', ['as' => 'products.view_pricing', 'uses' => 'ProductController@view_pricing']);
    Route::get('/products/{product}/stocks', ['as' => 'products.view_stocks', 'uses' => 'ProductController@view_stocks']);

    // Stock CRUD
    Route::get('/products/{product}/create/stocks', ['as' => 'products.create_stock', 'uses' => 'ProductController@create_stock']);
    Route::post('/products/{product}/create/stocks', ['as' => 'products.create_stock.store', 'uses' => 'ProductController@store_stock']);
    Route::get('/products/{product}/edit/{stock}/stocks', ['as' => 'products.edit_stock', 'uses' => 'ProductController@edit_stock']);
    Route::post('/products/{product}/edit/{stock}/stocks', ['as' => 'products.edit_stock.update', 'uses' => 'ProductController@update_stock']);
    Route::get('/products/{product}/delete/{stock}/stocks', ['as' => 'products.delete_stock', 'uses' => 'ProductController@delete_stock']);
    Route::post('/products/{product}/delete/{stock}/stocks', ['as' => 'products.delete_stock.destroy', 'uses' => 'ProductController@destroy_stock']);

    //  PPRICING CRUD
    Route::get('/products/{product}/create/pricing', ['as' => 'products.create_pricing', 'uses' => 'ProductController@create_pricing']);
    Route::post('/products/{product}/create/pricing', ['as' => 'products.create_pricing.store', 'uses' => 'ProductController@store_pricing']);
    Route::get('/products/{product}/edit/{pricing}/pricing', ['as' => 'products.edit_pricing', 'uses' => 'ProductController@edit_pricing']);
    Route::post('/products/{product}/edit/{pricing}/pricing', ['as' => 'products.edit_pricing.update', 'uses' => 'ProductController@update_pricing']);
    Route::get('/products/{product}/delete/{pricing}/pricing', ['as' => 'products.delete_pricing', 'uses' => 'ProductController@delete_pricing']);
    Route::post('/products/{product}/delete/{pricing}/pricing', ['as' => 'products.delete_pricing.destroy', 'uses' => 'ProductController@destroy_pricing']);

    // Pricing Groups
    Route::get('/pricing-groups', ['as' => 'pricing_groups.index', 'uses' => 'PricingGroupController@index']);
    Route::get('/pricing-groups/create', ['as' => 'pricing_groups.create', 'uses' => 'PricingGroupController@create']);
    Route::post('/pricing-groups/create', ['as' => 'pricing_groups.store', 'uses' => 'PricingGroupController@store']);
    Route::get('/pricing-groups/{group}/edit', ['as' => 'pricing_groups.edit', 'uses' => 'PricingGroupController@edit']);
    Route::post('/pricing-groups/{group}/edit', ['as' => 'pricing_groups.update', 'uses' => 'PricingGroupController@update']);
    Route::get('/pricing-groups/{group}/delete', ['as' => 'pricing_groups.delete', 'uses' => 'PricingGroupController@delete']);
    Route::post('/pricing-groups/{group}/delete', ['as' => 'pricing_groups.destroy', 'uses' => 'PricingGroupController@destroy']);

    // Stock Type
    Route::get('/stock-types', ['as' => 'stock_types.index', 'uses' => 'StockTypeController@index']);
    Route::get('/stock-types/create', ['as' => 'stock_types.create', 'uses' => 'StockTypeController@create']);
    Route::post('/stock-types/create', ['as' => 'stock_types.store', 'uses' => 'StockTypeController@store']);
    Route::get('/stock-types/{stock_type}/edit', ['as' => 'stock_types.edit', 'uses' => 'StockTypeController@edit']);
    Route::post('/stock-types/{stock_type}/edit', ['as' => 'stock_types.update', 'uses' => 'StockTypeController@update']);
    Route::get('/stock-types/{stock_type}/delete', ['as' => 'stock_types.delete', 'uses' => 'StockTypeController@delete']);
    Route::post('/stock-types/{stock_type}/delete', ['as' => 'stock_types.destroy', 'uses' => 'StockTypeController@destroy']);
 
    // Categories
    Route::get('/categories', ['as' => 'categories.index', 'uses' => 'CategoryController@index']);
    Route::get('/categories/create', ['as' => 'categories.create', 'uses' => 'CategoryController@create']);
    Route::post('/categories/create', ['as' => 'categories.store', 'uses' => 'CategoryController@store']);
    Route::get('/categories/{category}/edit', ['as' => 'categories.edit', 'uses' => 'CategoryController@edit']);
    Route::post('/categories/{category}/edit', ['as' => 'categories.update', 'uses' => 'CategoryController@update']);
    Route::get('/categories/{category}/delete', ['as' => 'categories.delete', 'uses' => 'CategoryController@delete']);
    Route::post('/categories/{category}/delete', ['as' => 'categories.destroy', 'uses' => 'CategoryController@destroy']);

 
    // Warehouses
    Route::get('/warehouses', ['as' => 'warehouses.index', 'uses' => 'WarehouseController@index']);
    Route::get('/warehouses/create', ['as' => 'warehouses.create', 'uses' => 'WarehouseController@create']);
    Route::post('/warehouses/create', ['as' => 'warehouses.store', 'uses' => 'WarehouseController@store']);
    Route::get('/warehouses/{warehouse}/edit', ['as' => 'warehouses.edit', 'uses' => 'WarehouseController@edit']);
    Route::post('/warehouses/{warehouse}/edit', ['as' => 'warehouses.update', 'uses' => 'WarehouseController@update']);
    Route::get('/warehouses/{warehouse}/delete', ['as' => 'warehouses.delete', 'uses' => 'WarehouseController@delete']);
    Route::post('/warehouses/{warehouse}/delete', ['as' => 'warehouses.destroy', 'uses' => 'WarehouseController@destroy']);
 
    //
    Route::get('/categories', ['as' => 'categories.index', 'uses' => 'CategoryController@index']);

    // Profile
    Route::get('/profile', ['as' => 'profile.form', 'uses' => 'ProfileController@form']);
    Route::post('/profile', ['as' => 'profile.save', 'uses' => 'ProfileController@save']);
});


Route::get('/', 'HomeController@index');
