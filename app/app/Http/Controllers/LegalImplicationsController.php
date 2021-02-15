<?php


namespace App\Http\Controllers;


use Illuminate\Support\Facades\View;

class LegalImplicationsController extends ApplicationController
{

    public function termsAndConditions()
    {
        return View::make('application.terms_and_conditions');
    }

    public function privacy()
    {
        return View::make('application.privacy');
    }
}
