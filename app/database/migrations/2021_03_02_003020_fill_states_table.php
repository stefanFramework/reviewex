<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Config;
use Illuminate\Database\Migrations\Migration;

class FillStatesTable extends Migration
{
    private string $table = 'states';

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
            ['name' => 'Alabama', 'country_id' => 1],
            ['name' => 'Alaska', 'country_id' => 1],
            ['name' => 'Arizona', 'country_id' => 1],
            ['name' => 'Arkansas', 'country_id' => 1],
            ['name' => 'California', 'country_id' => 1],
            ['name' => 'Colorado', 'country_id' => 1],
            ['name' => 'Connecticut', 'country_id' => 1],
            ['name' => 'Delaware', 'country_id' => 1],
            ['name' => 'Florida', 'country_id' => 1],
            ['name' => 'Georgia', 'country_id' => 1],
            ['name' => 'Hawaii', 'country_id' => 1],
            ['name' => 'Idaho', 'country_id' => 1],
            ['name' => 'Illinois', 'country_id' => 1],
            ['name' => 'Indiana', 'country_id' => 1],
            ['name' => 'Iowa', 'country_id' => 1],
            ['name' => 'Kansas', 'country_id' => 1],
            ['name' => 'Kentucky', 'country_id' => 1],
            ['name' => 'Louisiana', 'country_id' => 1],
            ['name' => 'Maine', 'country_id' => 1],
            ['name' => 'Maryland', 'country_id' => 1],
            ['name' => 'Massachusetts', 'country_id' => 1],
            ['name' => 'Michigan', 'country_id' => 1],
            ['name' => 'Minnesota', 'country_id' => 1],
            ['name' => 'Mississippi', 'country_id' => 1],
            ['name' => 'Missouri', 'country_id' => 1],
            ['name' => 'Montana', 'country_id' => 1],
            ['name' => 'Nebraska', 'country_id' => 1],
            ['name' => 'Nevada', 'country_id' => 1],
            ['name' => 'New Hampshire', 'country_id' => 1],
            ['name' => 'New Jersey', 'country_id' => 1],
            ['name' => 'New Mexico', 'country_id' => 1],
            ['name' => 'New York', 'country_id' => 1],
            ['name' => 'North Carolina', 'country_id' => 1],
            ['name' => 'North Dakota', 'country_id' => 1],
            ['name' => 'Ohio', 'country_id' => 1],
            ['name' => 'Oklahoma', 'country_id' => 1],
            ['name' => 'Oregon', 'country_id' => 1],
            ['name' => 'Pennsylvania', 'country_id' => 1],
            ['name' => 'Rhode Island', 'country_id' => 1],
            ['name' => 'South Carolina', 'country_id' => 1],
            ['name' => 'South Dakota', 'country_id' => 1],
            ['name' => 'Tennessee', 'country_id' => 1],
            ['name' => 'Texas', 'country_id' => 1],
            ['name' => 'Utah', 'country_id' => 1],
            ['name' => 'Vermont', 'country_id' => 1],
            ['name' => 'Virginia', 'country_id' => 1],
            ['name' => 'Washington', 'country_id' => 1],
            ['name' => 'West Virginia', 'country_id' => 1],
            ['name' => 'Wisconsin', 'country_id' => 1],
            ['name' => 'Wyoming', 'country_id' => 1],
        ]);
    }

    private function fillForSpanish(): void
    {
        DB::table($this->table)->insert([
            ['name' => 'Buenos Aires', 'country_id' => 1],
            ['name' => 'Capital Federal', 'country_id' => 1],
            ['name' => 'Catamarca', 'country_id' => 1],
            ['name' => 'Chaco', 'country_id' => 1],
            ['name' => 'Chubut', 'country_id' => 1],
            ['name' => 'Córdoba', 'country_id' => 1],
            ['name' => 'Corrientes', 'country_id' => 1],
            ['name' => 'Entre Ríos', 'country_id' => 1],
            ['name' => 'Formosa', 'country_id' => 1],
            ['name' => 'Jujuy', 'country_id' => 1],
            ['name' => 'La Pampa', 'country_id' => 1],
            ['name' => 'La Rioja', 'country_id' => 1],
            ['name' => 'Mendoza', 'country_id' => 1],
            ['name' => 'Misiones', 'country_id' => 1],
            ['name' => 'Neuquén', 'country_id' => 1],
            ['name' => 'Río Negro', 'country_id' => 1],
            ['name' => 'Salta', 'country_id' => 1],
            ['name' => 'San Juan', 'country_id' => 1],
            ['name' => 'San Luis', 'country_id' => 1],
            ['name' => 'Santa Cruz', 'country_id' => 1],
            ['name' => 'Santa Fe', 'country_id' => 1],
            ['name' => 'Santiago del Estero', 'country_id' => 1],
            ['name' => 'Tierra del Fuego', 'country_id' => 1],
            ['name' => 'Tucumán', 'country_id' => 1]
        ]);
    }
}
