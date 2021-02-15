<?php


namespace App\Utils;

use App\ErrorCodes\ErrorCodes;
use Illuminate\Support\Facades\Lang;

class ErrorForView
{
    private static array $messages = [
        ErrorCodes::GENERAL_ERROR => 'application.errors.general_error',
        ErrorCodes::COMPANY_ALREADY_EXISTS => 'application.company.registration.duplicated_company',
        ErrorCodes::INVALID_COMPANY => 'application.review.invalid_company'
    ];


    public static function mapErrorFromCode(int $code): string
    {
        if (!array_key_exists($code, self::$messages)) {
            # Default error message
            return Lang::get('application.errors.general_error');
        }

        return Lang::get(self::$messages[$code]);
    }
}
