<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StatesTableSeeder extends Seeder
{
    protected $table = 'states';

    public function run()
    {
        DB::table($this->table)->insert([
            'name' => 'Ciudad Autonoma de Buenos Aires',
            'country_id' => 1
        ]);

        DB::table($this->table)->insert([
            'name' => 'Buenos Aires',
            'country_id' => 1
        ]);

    }
}
