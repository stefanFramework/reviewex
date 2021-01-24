<?php
namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CompaniesTableSeeder extends Seeder
{
    protected $table = 'companies';

    public function run()
    {
        DB::table($this->table)->insert([
            'code' => 'aligator-systems',
            'name' => 'Aligator Systems',
            'company_status_id' => 'published',
            'business_sector_id' => 1,
            'state_id' => 1,
            'city' => 'Caballito',
            'website_url' => 'https://www.aligator.com',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        DB::table($this->table)->insert([
            'code' => 'techint',
            'name' => 'Techint',
            'company_status_id' => 'published',
            'business_sector_id' => 1,
            'state_id' => 1,
            'city' => 'Villa Lugano',
            'website_url' => 'https://www.techint.com',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        DB::table($this->table)->insert([
            'code' => 'infobae',
            'name' => 'Infobae',
            'company_status_id' => 'pending',
            'business_sector_id' => 1,
            'state_id' => 1,
            'city' => 'Microcentro',
            'website_url' => 'https://www.infobae.com',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
    }
}
