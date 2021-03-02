<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Config;
use Illuminate\Database\Migrations\Migration;



class FillCountriesTable extends Migration
{
    private string $table = 'countries';

    public function up()
    {
        $language = Config::get('app.locale');

        switch ($language) {
            case 'en':
                $this->fillForEnglish();
                break;

            case 'es':
                $this->fillForSpanish();
                break;

            default:
                break;
        }
    }

    public function down() {}

    private function fillForEnglish(): void
    {
        DB::table($this->table)->insert([
            ['name' => 'United States']
        ]);
    }

    private function fillForSpanish(): void
    {
        DB::table($this->table)->insert([
            ['name' => 'Argentina']
        ]);
    }
}
