<?php

use Carbon\Carbon;
use Faker\Generator as Faker;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PhoneLinesTableSeeder extends Seeder
{
    protected $table = 'phone_lines';

    public function run(Faker $faker)
    {
        for ($i = 0; $i < 9; $i++) {
            DB::table($this->table)->insert([
                'country_id' => 'arg',
                'number' => $faker->phoneNumber,
                'is_active' => true,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]);
        }
    }
}
