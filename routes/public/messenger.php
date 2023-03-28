<?php

use Illuminate\Support\Facades\Route;

Route::post('/messenger-info', 'MessengerController@messengerInfoStore')->name('messanger.info');
Route::post('/message/send', 'MessengerController@store')->name('messanger.store-message');

Route::get('messages/fetch', "MessengerController@getMessages");
