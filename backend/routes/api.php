<?php

use App\Http\Controllers\Lesson\LessonController;
use Illuminate\Support\Facades\Route;


Route::prefix('/auth')->group(function (){
    Route::post('login', [App\Http\Controllers\Auth\AuthController::class, 'login'])->name('auth.login');
    Route::post('register', [App\Http\Controllers\Auth\AuthController::class, 'register'])->name('auth.register');
    Route::post('logout', [App\Http\Controllers\Auth\AuthController::class, 'logout'])->name('auth.logout');
    Route::post('refresh', [App\Http\Controllers\Auth\AuthController::class, 'refresh'])->name('auth.refresh');
});


Route::prefix('/profile')->group(function (){
    Route::post('create', [App\Http\Controllers\Profile\ProfileController::class, 'store'])->name('profile.create');
    Route::get('{profile}', [App\Http\Controllers\Profile\ProfileController::class, 'show'])->name('profile.show');
});


Route::prefix('/user')->group(function (){
    Route::get('self', [App\Http\Controllers\User\UserController::class, 'getSelf'])->name('user.self');
    Route::get('{user}', [App\Http\Controllers\User\UserController::class, 'show'])->name('user.show');
});


Route::prefix('/courses')->group(function (){
    Route::get('/', [App\Http\Controllers\Course\CourseController::class, 'index'])->name('course.index');
    Route::get('{course}/lessons', [App\Http\Controllers\Lesson\LessonController::class, 'index'])->name('course.lesson.index');
});