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

/*Route::group([
    'namespace' => 'webservice',
    'prefix' => 'api/v1',
], function () {
    Route::get('/create', 'CrudController@create');
    Route::get('/update', 'CrudController@update');
    Route::get('/list', 'CrudController@delete');
});*/

Route::get('/list', 'CouponManagerController@index');

Route::post('/create', 'CouponManagerController@create');
