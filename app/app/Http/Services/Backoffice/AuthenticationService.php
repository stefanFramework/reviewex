<?php


namespace App\Http\Services\Backoffice;

use Exception;

use App\Http\Entities\AuthenticatedUser;
use App\Http\Entities\SessionElementKey;
use App\Domain\Repositories\UserRepository;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class AuthenticationService
{
    private UserRepository $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function authenticate(string $email, string $password): void
    {
        $user = $this->userRepository->getByEmail($email);

        if (empty($user)) {
            throw new Exception('Invalid User');
        }

        if (!Hash::check($password, $user->password)) {
            throw new Exception('Invalid Password');
        }

        Session::flush();
        Session::put(SessionElementKey::USER_ID, $user->id);
        Session::put(SessionElementKey::USER_NAME, $user->user_name);
    }

    public function getAuthenticatedUser(): ?AuthenticatedUser
    {
        if (!Session::has(SessionElementKey::USER_ID)) {
            return null;
        }

        $userId = Session::get(SessionElementKey::USER_ID);
        $user = $this->userRepository->getActiveUserById($userId);

        $authUser =  new AuthenticatedUser();
        $authUser->id = $user->id;
        $authUser->userName = $user->user_name;
        $authUser->email = $user->email;

        return $authUser;
    }

    public function removeAuthenticatedUser(): void
    {
        Session::flush();
    }

}
