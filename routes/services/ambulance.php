<?php

use App\Http\Controllers\AmbulanceController;
use Illuminate\Support\Facades\Route;


Route::controller(AmbulanceController::class)
    ->prefix('ambulance')
    ->name('ambulance.')
    ->group(function () {
        Route::get('/', 'index')->name('index');
        Route::post('/store', 'store')->name('store');
        Route::get('/{id}/fetch', 'fetch')->name('fetch');
        Route::get('/{id}/view', 'view')->name('view');
        Route::post('/update', 'update')->name('update');
        Route::get('/{id}/destroy', 'destroy')->name('destroy');
    });
