<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\LocationController;
use App\Http\Controllers\CompanyInformationController;
use App\Http\Controllers\CompanyRegistrationController;
use App\Http\Controllers\ReviewRegistrationController;

use App\Http\Controllers\Backoffice\HomeController as BackofficeHomeController;
use App\Http\Controllers\Backoffice\LoginController;
use App\Http\Controllers\Backoffice\CompanyValidationController;
use App\Http\Controllers\Backoffice\ReviewValidationController;

use Illuminate\Support\Facades\Route;


Route::get('/', [
    'as' => 'home',
    'uses' => HomeController::class . '@index'
]);

Route::post('/search', [
    'as' => 'home.search',
    'uses' => HomeController::class . '@search'
]);

Route::get('/location/{countryId}/states', [
    'as' => 'location.states',
    'uses' => LocationController::class . '@states'
]);

Route::prefix('/companies')->group(function () {
    Route::get('/register', [
        'as' => 'companies.register',
        'uses' => CompanyRegistrationController::class . '@view'
    ]);

    Route::post('/register', [
        'as' => 'companies.register',
        'uses' => CompanyRegistrationController::class . '@register'
    ]);

    Route::get('/success', [
        'as' => 'companies.success',
        'uses' => CompanyRegistrationController::class . '@confirmationView'
    ]);

    Route::get('/{code}', [
        'as' => 'companies.information',
        'uses' => CompanyInformationController::class . '@view'
    ]);
});

Route::prefix('/reviews/{code}')->group(function () {
    Route::get('/new', [
        'as' => 'reviews.new',
        'uses' => ReviewRegistrationController::class . '@view'
    ]);

    Route::post('/new', [
        'as' => 'reviews.new',
        'uses' => ReviewRegistrationController::class . '@create'
    ]);
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
                'uses' => BackofficeHomeController::class . '@index'
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

            Route::prefix('/reviews')->group(function () {
                Route::get('/', [
                    'as' => 'backoffice.reviews',
                    'uses' => ReviewValidationController::class . '@index'
                ]);

                Route::get('/{id}', [
                    'as' => 'backoffice.reviews.update',
                    'uses' => ReviewValidationController::class . '@update'
                ]);

                Route::get('/{id}/dismiss', [
                    'as' => 'backoffice.reviews.dismiss',
                    'uses' => ReviewValidationController::class . '@dismiss'
                ]);
            });

        });

    });
