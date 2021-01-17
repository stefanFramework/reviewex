<?php

namespace App\Domain\Models;

use Illuminate\Database\Eloquent\Model;

class SystemSetting extends Model
{
    protected $table = 'system_settings';

    public static function apiKey()
    {
        return self::getValueByKey('api_key');
    }

    private static function getValueByKey($key)
    {
        $setting = self::where('key', $key)->first();
        return $setting->value;
    }
}
