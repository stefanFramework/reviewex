<?php

use Carbon\Carbon;
use Faker\Generator as Faker;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SystemSettingsTableSeeder extends Seeder
{
    protected $table = 'system_settings';

    public function run(Faker $faker)
    {
        DB::table($this->table)->insert([
            'key' => 'api_key',
            'value' => '123456',
            'is_active' => true,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
    }
}
