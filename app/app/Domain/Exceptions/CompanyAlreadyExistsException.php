<?php


namespace App\Domain\Exceptions;


use Exception;
use App\ErrorCodes\ErrorCodes;

class CompanyAlreadyExistsException extends Exception
{
    protected $code = ErrorCodes::COMPANY_ALREADY_EXISTS;
    protected $message = 'Company Already Exists';
}
