<?php

namespace App\Domain\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PhoneLine extends Model
{
    use SoftDeletes;

    protected $table = 'phone_lines';
    
    public function country()
    {
        return $this->belongsTo(Country::class);
    }

    public function getLatestMessages(int $limit = 50) 
    {
        return $this
        ->hasMany(PhoneLineMessage::class)
        ->orderBy('created_at', 'desc')
        ->take($limit)
        ->get();
    }

    public function phoneLineMessages()
    {
        return $this->hasMany(PhoneLineMessage::class);
    }

    public function isActive()
    {
        return (bool) $this->is_active;
    }

}
