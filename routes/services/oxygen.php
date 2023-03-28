<?php

use App\Http\Controllers\OxygenController;
use Illuminate\Support\Facades\Route;


Route::controller(OxygenController::class)
    ->prefix('oxygen')
    ->name('oxygen.')
    ->group(function () {
        Route::get('/', 'index')->name('index');
        Route::post('/store', 'store')->name('store');
        Route::post('/update', 'update')->name('update');
        Route::delete('/{id}/destroy', 'destroy')->name('destroy');
    });
