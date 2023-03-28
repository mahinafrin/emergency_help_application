<?php

use App\Http\Controllers\FoodController;
use Illuminate\Support\Facades\Route;


Route::controller(FoodController::class)
    ->prefix('food')
    ->name('food.')
    ->group(function () {
        Route::get('/', 'index')->name('index');
        Route::post('/store', 'store')->name('store');
        Route::get('/{id}/fetch', 'fetch')->name('fetch');
        Route::get('/{id}/view', 'view')->name('view');
        Route::post('/update', 'update')->name('update');
        Route::delete('/{id}/destroy', 'destroy')->name('destroy');
    });
