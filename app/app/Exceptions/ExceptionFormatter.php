<?php


namespace App\Exceptions;

use Throwable;

class ExceptionFormatter
{
    public static function format(Throwable $e, array $defaultContext = []): array
    {
        return [
            'message' => $e->getMessage(),
            'context' => static::generateContext($e, $defaultContext),
            'file' => $e->getFile() . ':' . $e->getLine(),
            'class' => static::generateMethodName($e->getTrace())
        ];
    }

    private static function generateMethodName(array $trace): string
    {
        $method = '';

        if (isset($trace[0])) {
            $method .= $trace[0]['class'] ?? '';
            $method .= $trace[0]['type'] ?? '';
            $method .= $trace[0]['function'] ?? '';
        }

        return $method;
    }

    private static function generateContext(Throwable $e, array $defaultContext = []): array
    {
        $context = method_exists($e, 'getContext') ? $e->getContext() : [];
        return $context + $defaultContext;
    }
}
