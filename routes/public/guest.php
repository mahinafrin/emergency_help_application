<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


Route::middleware('guest')
    ->controller(HomeController::class)
    ->name('guest.user.')
    ->group(function () {
        Route::get('home', 'guestIndex')->name('guestIndex');
    });
