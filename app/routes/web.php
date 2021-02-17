<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LegalImplicationsController;
use App\Http\Controllers\LocationController;
use App\Http\Controllers\CompanyInformationController;
use App\Http\Controllers\CompanyRegistrationController;
use App\Http\Controllers\ReviewRegistrationController;

use App\Http\Controllers\ReviewVotingController;
use Illuminate\Support\Facades\Route;


Route::get('/', [
    'as' => 'home',
    'uses' => HomeController::class . '@index'
]);

Route::get('/about', [
    'as' => 'about',
    'uses' => AboutController::class . '@index'
]);

Route::get('/terms-and-conditions', [
    'as' => 'terms',
    'uses' => LegalImplicationsController::class . '@termsAndConditions'
]);

Route::get('/privacy-policy', [
    'as' => 'privacy',
    'uses' => LegalImplicationsController::class . '@privacy'
]);

Route::post('/search', [
    'as' => 'home.search',
    'uses' => HomeController::class . '@search'
]);

Route::get('/location/{countryId}/states', [
    'as' => 'location.states',
    'uses' => LocationController::class . '@states'
]);

Route::prefix('/reviews/{id}')->group(function () {
    Route::post('/vote-positive', [
        'as' => 'reviews.vote_positive',
        'uses' => ReviewVotingController::class . '@votePositive'
    ]);

    Route::post('/vote-negative', [
        'as' => 'reviews.vote_negative',
        'uses' => ReviewVotingController::class . '@voteNegative'
    ]);
});

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

        Route::get('/create-review/success', [
            'as' => 'reviews.success',
            'uses' => ReviewRegistrationController::class . '@confirmationView'
        ]);
    });
});


include('backoffice.php');
