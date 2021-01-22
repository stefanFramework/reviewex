<?php


namespace App\Domain\Models;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SystemSetting extends Model
{
    use SoftDeletes;

    protected $table = 'system_settings';

    protected $dates = ['deleted_at'];
}
