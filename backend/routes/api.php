<?php

use Illuminate\Support\Facades\Route;
use App\Models\User;


Route::prefix('auth')->group(function (){
    Route::post('login', [App\Http\Controllers\Auth\AuthController::class, 'login']);
    Route::post('register', [App\Http\Controllers\Auth\AuthController::class, 'register']);
    Route::post('logout', [App\Http\Controllers\Auth\AuthController::class, 'logout']);
    Route::post('refresh', [App\Http\Controllers\Auth\AuthController::class, 'refresh']);
});


Route::get('', function(){
    return [];
});

