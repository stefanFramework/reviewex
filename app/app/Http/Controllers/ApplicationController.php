<?php


namespace App\Http\Controllers;


use App\Utils\Logger;

class ApplicationController extends Controller
{
    public function __construct()
    {
        Logger::setDefaultPrefix('app');
    }
}
