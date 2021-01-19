<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
         $this->call([
             UsersTableSeeder::class,
             BusinessSectorTableSeeder::class,
             FeaturesTableSeeder::class,
             CountriesTableSeeder::class,
             StatesTableSeeder::class,
             CompaniesTableSeeder::class
         ]);
    }
}
