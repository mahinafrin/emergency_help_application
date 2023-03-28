<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\AboutController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


Route::controller(AboutController::class)
    ->name('about.')
    ->group(function () {
        Route::get('about/', 'index')->name('index');
    });
