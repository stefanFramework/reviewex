<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BusinessSectorTableSeeder extends Seeder
{
    protected $table = 'business_sectors';

    public function run()
    {
        DB::table($this->table)->insert([
            'name' => 'IT'
        ]);

        DB::table($this->table)->insert([
            'name' => 'Ciencia e Investigacion'
        ]);
    }
}
