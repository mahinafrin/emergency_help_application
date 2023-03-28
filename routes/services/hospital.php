<?php

use App\Http\Controllers\HospitalController;
use Illuminate\Support\Facades\Route;


Route::controller(HospitalController::class)
    ->prefix('hospital')
    ->name('hospital.')
    ->group(function () {
        Route::get('/', 'index')->name('index');
        Route::post('/store', 'store')->name('store');
        Route::post('/update', 'update')->name('update');
        Route::delete('/{id}/destroy', 'destroy')->name('destroy');
    });
