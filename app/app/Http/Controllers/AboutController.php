<?php


namespace App\Http\Controllers;


use Illuminate\Support\Facades\View;

class AboutController extends ApplicationController
{
    public function index()
    {
        return View::make('application.about');
    }

}
