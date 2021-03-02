<?php

use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Config;
use Illuminate\Database\Migrations\Migration;

class FillBusinessSectorsTable extends Migration
{
    private string $table = 'business_sectors';

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
            ['name' => 'Aeronautics', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'Nutritional', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'Automotive', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'Bank', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'Cooperative', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'Trade', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'Construction', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'Consultancy', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'Education', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'Entertainment', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'sports', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'Gastronomy', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'Governmental', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'Dress', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'Internet', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'Research', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'IT', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'Legal', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'Marketing', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'Mobile', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'Military', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'Media', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'Naval', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'NGO', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'Oil', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'Advertising', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'Health', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'Security', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'Software Factory', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'Technical support', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'Telecommunications', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'Transport', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'Tourism', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'Video game', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'Web', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'Other', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
        ]);
    }

    private function fillForSpanish(): void
    {
        DB::table($this->table)->insert([
            ['name' => 'Aeronautica', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'Alimenticia', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'Automotriz', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'Banco', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'Cooperativa', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'Comercio', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'Construccion', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'Consultoria', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'Educacion', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'Entretenimiento', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'Deportes', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'Gastronomia', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'Gubernamental', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'Indumentaria', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'Internet', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'Investigacion', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'IT', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'Legal', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'Marketing', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'Mobile', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'Militar', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'Medios', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'Naval', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'ONG', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'Petrolera', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'Publicidad', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'Salud', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'Seguridad', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'Software Factory', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'Soporte Tecnico', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'Telecomunicaciones', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'Transporte', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'Turismo', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'Videojuegos', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'Web', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'Otra', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
        ]);
    }
}
