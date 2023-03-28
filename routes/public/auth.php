<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


Route::middleware('guest')
    ->name('user.')
    ->group(function () {
        Route::get('/user/login', [AuthController::class, 'userLoginView'])->name('login');
        Route::post('/user/login', [AuthController::class, 'userLogin'])->name('login');
        Route::get('/user/register', [AuthController::class, 'userRegisterView'])->name('register');
        Route::post('/user/register', [AuthController::class, 'userRegister'])->name('register');
    });
