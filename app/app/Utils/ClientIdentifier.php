<?php


namespace App\Utils;


class ClientIdentifier
{
    private function __construct()
    {

    }

    public static function fromName(string $name): string
    {
        $trimmed = trim($name);
        $lowerCase = strtolower($trimmed);
        return preg_replace('/\s+/', '-', $lowerCase);
    }
}
