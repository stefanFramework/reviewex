<?php

use App\Http\Api\Middleware\Authenticate;

$apiNamespace = 'Api\Controllers';

Route::group(['middleware' => [Authenticate::class]], function () use ($apiNamespace) {
    Route::group(['prefix' => 'messages', 'namespace' => $apiNamespace], function () {
        Route::post('store', 'PhoneLineMessagesController@store');
    });
});
