<?php


namespace App\Http\Controllers;

use Illuminate\Support\Facades\Redirect;
use Throwable;
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
        try {
            $data = $request->all();
            $this->validate($data);


            echo json_encode($data);
        } catch(Throwable $ex) {
            Redirect::back()->withErrors($ex);
        }
    }

    private function validate(array $data)
    {
        return;
    }
}
