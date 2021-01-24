<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CountriesTableSeeder extends Seeder
{
    protected $table = 'countries';

    public function run()
    {
        DB::table($this->table)->insert([
            'name' => 'Argentina'
        ]);
    }
}
