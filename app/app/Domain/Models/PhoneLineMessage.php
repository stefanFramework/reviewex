<?php

namespace App\Domain\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PhoneLineMessage extends Model
{
    use SoftDeletes;

    protected $table = 'phone_line_messages';

    public function phoneLine() 
    {
        return $this->belongsTo(PhoneLine::class);
    }
}
