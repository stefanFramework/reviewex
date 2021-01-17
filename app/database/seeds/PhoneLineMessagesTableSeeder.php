<?php

use Carbon\Carbon;
use Faker\Generator as Faker;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PhoneLineMessagesTableSeeder extends Seeder
{
    protected $table = 'phone_line_messages';

    public function run(Faker $faker)
    {
        for ($i = 0; $i < 100; $i++) {
            DB::table($this->table)->insert([
                'phone_line_id' => 1,
                'from' => $faker->randomElement(['Amazon', 'Tu Hermana', 'Mercado Libre', 'Claro', 'Movistar']),
                'message' => $faker->paragraph,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]);
        }
    }
}
