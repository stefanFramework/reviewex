<?php


namespace App\Http\Controllers\Backoffice;

use Throwable;

use App\Http\Records\UserRecord;
use App\Http\Controllers\Controller;
use App\Http\Entities\SessionElementKey;
use App\Http\Services\Backoffice\AuthenticationService;

use App\Utils\Logger;
use App\Exceptions\ExceptionFormatter;
use App\Domain\Repositories\UserRepository;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

class LoginController extends Controller
{

    private AuthenticationService $authService;
    private UserRepository $userRepository;


    public function __construct(
        UserRepository $userRepository,
        AuthenticationService $authenticationService
    )
    {
        $this->userRepository = $userRepository;
        $this->authService = $authenticationService;

        Logger::setDefaultPrefix('backoffice');
    }

    public function index()
    {
        return View::make('backoffice.login', [
            'loginRoute' => route('backoffice.login')
        ]);
    }

    public function login(Request $request)
    {
        try {
            $inputData = $request->all();
            $this->validateData($inputData);

            $userRecord = new UserRecord();
            $userRecord->email = $inputData['email'];
            $userRecord->password = $inputData['password'];

            $user = $this->authService->authenticate($userRecord);

            $request->session()->regenerate();
            $request->session()->put(SessionElementKey::USER_NAME, $user->user_name);
            $request->session()->put(SessionElementKey::USER_ID, $user->id);

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
