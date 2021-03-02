<?php

use Carbon\Carbon;
use Illuminate\Support\Facades\Config;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;


class FillFeaturesTable extends Migration
{
    private string $table = 'features';

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
            ['name' => 'Extensive challenge', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'Ghosting', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'No feedback', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'Extensive process (+3 interviews)', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'Racism', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'Compensation was never discussed', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'Unethical questions', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'Sexism', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'Meaningless Tests', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'Toxic environment', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'Exploitation', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()]
        ]);
    }

    private function fillForSpanish(): void
    {
        DB::table($this->table)->insert([
            ['name' => 'Challenge Extenso', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'Ghosting', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'No feedback', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'Proceso extenso (+3 entrevistas)', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'Racismo', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'No discuten salario', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'Preguntas no eticas', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'Sexismo', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'Tests sin sentido', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'Ambiente toxico', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'Explotacion', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()]
        ]);
    }
}
