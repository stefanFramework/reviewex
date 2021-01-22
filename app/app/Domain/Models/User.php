<?php


namespace App\Domain\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Model
{
    use SoftDeletes;

    protected $table = 'users';

    protected $dates = ['deleted_at'];

    public function isActive() {
        return $this->is_active;
    }

}
