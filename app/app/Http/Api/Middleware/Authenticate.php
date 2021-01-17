<?php

namespace App\Http\Api\Middleware;

use Closure;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

use App\Http\Api\Services\AuthenticationService;

class Authenticate
{
    const API_KEY = 'x-api-key';

    private AuthenticationService $authenticationService;

    public function __construct(AuthenticationService $authenticationService)
    {
        $this->authenticationService = $authenticationService;
    }

    public function handle(Request $request, Closure $next)
    {
        try {
            $apiKey = $request->header(self::API_KEY);
            $this->authenticationService->validateApiKey($apiKey);
            return $next($request);
        } catch (\Throwable $ex) {
            return Response::json([], 401);
        }
    }
}
