<?php

use App\Http\Controllers\HelperController;
use Illuminate\Support\Facades\Route;


Route::controller(HelperController::class)
    ->prefix('helper')
    ->name('helper.')
    ->group(function () {
        Route::get('/', 'index')->name('index');
        Route::post('/store', 'store')->name('store');
        Route::get('/{id}/fetch', 'fetch')->name('fetch');
        Route::get('/{id}/view', 'view')->name('view');
        Route::post('/update', 'update')->name('update');
        Route::delete('/{id}/destroy', 'destroy')->name('destroy');
    });
