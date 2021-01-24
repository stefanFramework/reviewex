<?php


namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;



class LoginController extends Controller
{
    public function index()
    {
        return View::make('backoffice.login', [
            'loginRoute' => route('backoffice.login')
        ]);
    }

    public function login(Request $request)
    {
        $data = $request->all();
        echo json_encode($data);
    }
}
