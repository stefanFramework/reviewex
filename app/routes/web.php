<?php

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
$webNamespace = 'Controllers';

Route::get('/', [
    'as' => 'home', 
    'uses' => $webNamespace . '\HomeController@index'
]);

Route::get('/messages/{id}',[
    'as' => 'web.messages' , 
    'uses' => $webNamespace . '\MessagesController@index'
]);
