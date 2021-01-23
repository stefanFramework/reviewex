<?php


namespace App\Http\Controllers;

use Illuminate\Support\Facades\View;

class HomeController extends Controller
{

    public function __construct()
    {
    }

    public function index()
    {
        return View::make('backoffice.home', []);
    }
}
