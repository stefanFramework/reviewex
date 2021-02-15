<?php


namespace App\Domain\Exceptions;

use Exception;
use App\ErrorCodes\ErrorCodes;

class InvalidCompanyException extends Exception
{
    protected $code = ErrorCodes::INVALID_COMPANY;
    protected $message = 'Invalid Company';
}
