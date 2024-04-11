<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::post('/v1/register', '\App\Api\Auth\Controllers\AuthController@register');
Route::post('/v1/token', '\App\Api\Auth\Controllers\AuthController@token');

Route::group([
    'prefix' => 'v1',
    'middleware' => 'auth:sanctum',
    'namespace' => 'App\Api'
], function () {
    Route::apiResource('countries', '\Countries\Controllers\CountryController');
    Route::apiResource('cities', '\Cities\Controllers\CityController');
});
