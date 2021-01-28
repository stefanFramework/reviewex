<?php


namespace App\Http\Controllers\Backoffice;

use Exception;
use Throwable;

use App\Utils\Logger;
use App\Http\Controllers\Controller;
use App\Exceptions\ExceptionFormatter;
use App\Domain\Repositories\UserRepository;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

class LoginController extends Controller
{
    const USER_SESSION_KEY = 'user';

    private UserRepository $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
        Logger::setDefaultPrefix('backoffice');
    }

    public function index()
    {
        if (Session::has(self::USER_SESSION_KEY)) {
            return Redirect::route('backoffice.home');
        }

        return View::make('backoffice.login', [
            'loginRoute' => route('backoffice.login')
        ]);
    }

    public function login(Request $request)
    {
        try {
            $inputData = $request->all();
            $this->validateData($inputData);
            $user = $this->userRepository->getByEmail($inputData['email']);

            if (empty($user)) {
                throw new Exception('Invalid User');
            }

            if (!Hash::check($inputData['password'], $user->password)) {
                throw new Exception('Invalid Password');
            }

            $request->session()->regenerate();
            $request->session()->put(self::USER_SESSION_KEY, $user->user_name);

            return Redirect::route('backoffice.home');

        } catch(Throwable $ex) {
            Logger::error('login_error', ['error' => ExceptionFormatter::format($ex)]);
            return Redirect::back()->withErrors(['Invalid User']);
        }
    }

    public function logout()
    {
        try {
            Session::flush();
        } catch(Throwable $ex) {
            Logger::error('log_out_error', ['error' => ExceptionFormatter::format($ex)]);
        } finally {
            return Redirect::route('backoffice.login');
        }
    }

    private function validateData(array $data)
    {
        $rules = [
            'email' => 'required',
            'password' => 'required',
        ];

        $validator = Validator::make($data, $rules, []);

        if ($validator->fails()) {
            throw new ValidationException($validator);
        }
    }
}
