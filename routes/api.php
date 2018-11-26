<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
/*
Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});*/

Route::group([
    'namespace' => 'webservice',
    'prefix' => 'api/v1',
], function () {
    Route::get('/create', 'CrudController@create');
    Route::get('/update', 'CrudController@update');
    Route::get('/list', 'CrudController@list');
});

