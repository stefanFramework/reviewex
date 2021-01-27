<?php


namespace App\Domain\Models;

use Illuminate\Database\Eloquent\Builder;
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

    public function scopeFilterByEmail(Builder $query, string $email)
    {
        return $query->where('email', '=' , $email);
    }

    public function scopeFilterByActive(Builder $query, bool $status)
    {
        return $query->where('is_active', '=', $status);
    }

}
