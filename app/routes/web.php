<?php

use App\Http\Controllers\Backoffice\HomeController;
use App\Http\Controllers\Backoffice\LoginController;

use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/example', function () {
    return view('example');
});

Route::prefix('/backoffice')->group(function () {
        Route::get('/login', [
            'as' => 'backoffice.login',
            'uses' => LoginController::class . '@index'
        ]);

        Route::post('/login', [
            'as' => 'backoffice.login',
            'uses' => LoginController::class . '@login'
        ]);

        Route::get('/logout', [
            'as' => 'backoffice.logout',
            'uses' => LoginController::class . '@logout'
        ]);

        Route::group(['middleware' => 'check.auth'], function () {
            Route::get('/home', [
                'as' => 'backoffice.home',
                'uses' => HomeController::class . '@index'
            ]);
        });

    });
