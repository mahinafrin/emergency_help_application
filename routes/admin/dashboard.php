<?php

use Illuminate\Support\Facades\Route;

Route::get('dashboard', 'HomeController@index')->name('dashboard');
