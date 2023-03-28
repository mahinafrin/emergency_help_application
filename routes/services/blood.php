<?php

use App\Http\Controllers\BloodController;
use Illuminate\Support\Facades\Route;


Route::controller(BloodController::class)
    ->prefix('blood')
    ->name('blood.')
    ->group(function () {
        Route::get('/', 'index')->name('index');
        Route::post('/store', 'store')->name('store');
        Route::get('/{id}/fetch', 'fetch')->name('fetch');
        Route::get('/{id}/view', 'view')->name('view');
        Route::post('/update', 'update')->name('update');
        Route::get('/{id}/destroy', 'destroy')->name('destroy');
    });
