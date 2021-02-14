<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\LocationController;
use App\Http\Controllers\CompanyInformationController;
use App\Http\Controllers\CompanyRegistrationController;
use App\Http\Controllers\ReviewRegistrationController;

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

    Route::prefix('/{code}')->group(function () {
        Route::get('/', [
            'as' => 'companies.information',
            'uses' => CompanyInformationController::class . '@view'
        ]);

        Route::get('/create-review', [
            'as' => 'reviews.new',
            'uses' => ReviewRegistrationController::class . '@view'
        ]);

        Route::post('/create-review', [
            'as' => 'reviews.new',
            'uses' => ReviewRegistrationController::class . '@create'
        ]);
    });
});

include('backoffice.php');
