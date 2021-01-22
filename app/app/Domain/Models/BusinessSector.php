<?php


namespace App\Domain\Models;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class BusinessSector extends Model
{
    use SoftDeletes;

    protected $table = 'business_sectors';

    protected $dates = ['deleted_at'];

}
