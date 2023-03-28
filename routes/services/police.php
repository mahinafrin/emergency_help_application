<?php

use App\Http\Controllers\PoliceController;
use Illuminate\Support\Facades\Route;


Route::controller(PoliceController::class)
    ->prefix('police')
    ->name('police.')
    ->group(function () {
        Route::get('/', 'index')->name('index');
        Route::post('/store', 'store')->name('store');
        Route::post('/update', 'update')->name('update');
        Route::delete('/{id}/destroy', 'destroy')->name('destroy');
    });
