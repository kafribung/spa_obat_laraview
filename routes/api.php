<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/page/', 'API\PageController@index');
Route::post('/create','API\PageController@strore');
Route::get('/edit/{id}', 'API\PageController@edit');
Route::put('/update/{id}','API\PageController@update');
Route::delete('/delete/{id}', 'API\PageController@destroy');

