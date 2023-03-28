<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return redirect()->route('admin.dashboard');
});

Auth::routes();

Route::group(['middleware' => 'web', 'namespace' => 'App\Http\Controllers'], function () {
    foreach (glob(base_path('routes/public/*.php')) as $route) {
        require_once $route;
    }
});

foreach (glob(base_path('routes/services/*.php')) as $route) {
    require_once $route;
}

Route::group(['prefix' => 'admin', 'middleware' => 'auth', 'as' => 'admin.', 'namespace' => 'App\Http\Controllers'], function () {
    foreach (glob(base_path('routes/admin/*.php')) as $route) {
        require_once $route;
    }
});
