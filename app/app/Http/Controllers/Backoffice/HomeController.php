<?php


namespace App\Http\Controllers\Backoffice;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\View;


class HomeController extends Controller
{
    public function index(Request $request)
    {
        $userName = Session::get('user');

        return View::make('backoffice.home', [
            'userName' => $userName
        ]);
    }
}