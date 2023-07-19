<?php

use Illuminate\Support\Facades\Route;


Route::prefix('/auth')->group(function (){
    Route::post('login', [App\Http\Controllers\Auth\AuthController::class, 'login'])->name('auth.login');
    Route::post('register', [App\Http\Controllers\Auth\AuthController::class, 'register'])->name('auth.register');
    Route::post('logout', [App\Http\Controllers\Auth\AuthController::class, 'logout'])->name('auth.logout');
    Route::post('refresh', [App\Http\Controllers\Auth\AuthController::class, 'refresh'])->name('auth.refresh');
});


Route::prefix('/profile')->middleware('auth')->group(function (){
    Route::post('create', [App\Http\Controllers\Profile\StoreController::class, 'createUserData']);

});

