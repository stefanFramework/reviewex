<?php


namespace App\Http\Services\Backoffice;

use Exception;

use App\Domain\Models\User;
use App\Http\Records\UserRecord;
use App\Domain\Repositories\UserRepository;

use Illuminate\Support\Facades\Hash;

class AuthenticationService
{
    private UserRepository $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function authenticate(UserRecord $userRecord): User
    {
        $user = $this->userRepository->getByEmail($userRecord->email);

        if (empty($user)) {
            throw new Exception('Invalid User');
        }

        if (!Hash::check($userRecord->password, $user->password)) {
            throw new Exception('Invalid Password');
        }

        return $user;
    }

    public function isValidUser(UserRecord $userRecord)
    {
        $user = $this->userRepository->getActiveUserById($userRecord->id);
        return empty($user) ? false : true;
    }

}
