<?php


namespace App\Http\Controllers;

use Exception;
use Throwable;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

use App\Domain\Repositories\UserRepository;


class LoginController extends Controller
{
    private UserRepository $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
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
            $user = $this->userRepository->getByEmail($inputData['email']);

            if (empty($user)) {
                throw new Exception('Invalid User');
            }

            if (!Hash::check($inputData['password'], $user->password)) {
                throw new Exception('Invalid User');
            }

            $request->session()->regenerate();
            $request->session()->put('user', $user->user_name);

            return Redirect::to('backoffice.home');

        } catch(Throwable $ex) {
            Log::error(get_class($this) . '@login', ['ex' => $ex->getMessage()]);
            return Redirect::back()->withErrors(['Invalid User']);
        }
    }

//    private function validateData(array $data)
//    {
//        $rules = [
//            'email' => 'required|email',
//            'password' => 'required',
//        ];
//
//        $messages = [
//            'email' => 'Invalid User name',
//            'password' => 'Invalid password',
//        ];
//
//        $validator = Validator::make($data, $rules, $messages);
//
//        if ($validator->fails()) {
//            throw ValidationException::withMessages($messages);
//        }
//    }
}
