<?php

use Carbon\Carbon;
use Faker\Generator as Faker;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CountriesTableSeeder extends Seeder
{
    protected $table = 'countries';

    public function run(Faker $faker)
    {
        DB::table($this->table)->insert([
            'id' => 'arg',
            'name' => 'Argentina',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
    }
}
