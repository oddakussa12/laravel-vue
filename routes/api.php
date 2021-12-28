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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('getContacts','App\Http\Controllers\ContactController@getContacts');
Route::get('getContact/{id}','App\Http\Controllers\ContactController@getContact');
Route::patch('updateContact/{id}','App\Http\Controllers\ContactController@updateContact');
Route::post('saveContacts','App\Http\Controllers\ContactController@saveContact');
Route::delete('deleteContact/{id}','App\Http\Controllers\ContactController@deleteContact');
