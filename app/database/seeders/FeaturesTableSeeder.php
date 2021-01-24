<?php
namespace Database\Seeders;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FeaturesTableSeeder extends Seeder
{
    protected $table = 'features';

    public function run()
    {
        DB::table($this->table)->insert([
            'name' => 'Expectativas irrealistas',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        DB::table($this->table)->insert([
            'name' => 'Te acosan sexualmente',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        DB::table($this->table)->insert([
            'name' => 'Nunca te responden',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
    }
}
