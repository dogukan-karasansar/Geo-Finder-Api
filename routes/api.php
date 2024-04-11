<?php

use Illuminate\Support\Facades\Route;

Route::post('/v1/register', '\App\Api\Auth\Controllers\AuthController@register');
Route::post('/v1/token', '\App\Api\Auth\Controllers\AuthController@token');

Route::group([
    'prefix' => 'v1',
    'middleware' => 'auth:sanctum',
], function () {
    Route::apiResource('countries', 'App\Api\Countries\Controllers\CountryController')
        ->only('index');
    Route::apiResource('cities', 'App\Api\Cities\Controllers\CitiesController')
        ->only('index');
});
