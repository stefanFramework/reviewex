<?php

use App\Http\Controllers\Backoffice\HomeController;
use App\Http\Controllers\LoginController;
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
    return view('welcome');
});

Route::get('/home', function () {
    return view('home');
});

Route::prefix('backoffice')->group(function () {
    Route::get('/login', [
        'as' => 'backoffice.login',
        'uses' => LoginController::class . '@index'
    ]);

    Route::post('/login', [
        'as' => 'backoffice.login',
        'uses' => LoginController::class . '@login'
    ]);

    Route::get('/home', [
        'as' => 'backoffice.home',
        'uses' => HomeController::class . '@index'
    ]);
});
