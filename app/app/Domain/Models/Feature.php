<?php


namespace App\Domain\Models;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Feature extends Model
{
    use SoftDeletes;

    protected $table = 'features';

    protected $dates = ['deleted_at'];

}
