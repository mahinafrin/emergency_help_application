<?php

use Illuminate\Support\Facades\Route;


Route::group(['prefix' => 'messages', 'as' => 'messages.'], function () {
 Route::get('/{id?}', 'MessengerController@index')->name('index')->whereNumber('id');
 Route::post('{messenger_id}/reply', 'MessengerController@reply')->name('reply');
});
