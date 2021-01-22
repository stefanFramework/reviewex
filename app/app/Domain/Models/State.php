<?php


namespace App\Domain\Models;


use Illuminate\Database\Eloquent\Model;

class State extends Model
{
    protected $table = 'states';

    public function countries()
    {
        return $this->belongsTo(Country::class);
    }
}
