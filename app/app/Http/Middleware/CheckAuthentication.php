<?php

namespace App\Http\Middleware;

use Closure;

use App\Http\Records\UserRecord;
use App\Http\Entities\SessionElementKey;
use App\Http\Services\Backoffice\AuthenticationService;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class CheckAuthentication
{
    private AuthenticationService $authService;

    public function __construct(AuthenticationService $authService)
    {
        $this->authService = $authService;
    }

    public function handle(Request $request, Closure $next)
    {
        $authenticatedUser = $this->authService->getAuthenticatedUser();

        if (empty($authenticatedUser)) {
            return Redirect::route('backoffice.login');
        }

        return $next($request);
    }
}
