<?php

namespace App\Http\Api\Services;

use Exception;

use App\Domain\Models\SystemSetting;

class AuthenticationService
{
    public function validateApiKey($apiKey)
    {
        $systemApiKey = SystemSetting::apiKey();

        if ($systemApiKey != $apiKey) {
            throw new Exception('Invalid Api Key');
        }
    }
}
