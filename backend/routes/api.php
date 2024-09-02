<?php

use App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::post('/login',  [Controllers\Api\Auth\ApiLoginController::class,'__invoke'])->name('login');

Route::group(['middleware' => 'auth:sanctum'], function () {
    Route::post('/logout',
        Controllers\Api\Auth\ApiLogoutController::class)->name('logout');
    Route::post('/createdEmployer',
        Controllers\Api\Employer\ApiCreatedEmployerController::class)->name('createdEmployer');
});
