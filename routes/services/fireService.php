<?php

use App\Http\Controllers\FireServiceController;
use Illuminate\Support\Facades\Route;


Route::controller(FireServiceController::class)
    ->prefix('fire-service')
    ->name('fire-service.')
    ->group(function () {
        Route::get('/', 'index')->name('index');
        Route::post('/store', 'store')->name('store');
        Route::post('/update', 'update')->name('update');
        Route::delete('/{id}/destroy', 'destroy')->name('destroy');
    });
