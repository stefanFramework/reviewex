<?php


namespace App\Utils;


use Illuminate\Support\Facades\Log;

class Logger extends Log
{
    protected static string $defaultPrefix = '';

    public static function setDefaultPrefix(string $prefix): void
    {
        static::$defaultPrefix = $prefix;
    }

    public static function getDefaultPrefix(): string
    {
        return static::$defaultPrefix;
    }

    private static function addMessagePrefix(string $message): string
    {
        return static::$defaultPrefix . '.' . $message;
    }

    public static function debug($message, $context = [])
    {
        return parent::debug(static::addMessagePrefix($message), $context);
    }

    public static function info($message, $context = [])
    {
        return parent::info(static::addMessagePrefix($message), $context);
    }

    public static function notice($message, $context = [])
    {
        return parent::notice(static::addMessagePrefix($message), $context);
    }

    public static function warning($message, $context = [])
    {
        return parent::warning(static::addMessagePrefix($message), $context);
    }

    public static function error($message, $context = [])
    {
        return parent::error(static::addMessagePrefix($message), $context);
    }

    public static function critical($message, $context = [])
    {
        return parent::critical(static::addMessagePrefix($message), $context);
    }

    public static function alert($message, $context = [])
    {
        return parent::alert(static::addMessagePrefix($message), $context);
    }

    public static function emergency($message, $context = [])
    {
        return parent::emergency(static::addMessagePrefix($message), $context);
    }
}
