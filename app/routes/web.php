<?php

use App\Http\Controllers\Backoffice\HomeController;
use App\Http\Controllers\Backoffice\LoginController;
use App\Http\Controllers\Backoffice\CompanyValidationController;

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

            Route::prefix('/companies')->group(function () {
                Route::get('/', [
                    'as' => 'backoffice.companies',
                    'uses' => CompanyValidationController::class . '@index'
                ]);

                Route::get('/{id}', [
                    'as' => 'backoffice.companies.view',
                    'uses' => CompanyValidationController::class . '@view'
                ]);

                Route::post('/{id}', [
                    'as' => 'backoffice.companies.update',
                    'uses' => CompanyValidationController::class . '@update'
                ]);

                Route::get('/{id}/dismiss', [
                    'as' => 'backoffice.companies.dismiss',
                    'uses' => CompanyValidationController::class . '@dismiss'
                ]);
            });

        });

    });
