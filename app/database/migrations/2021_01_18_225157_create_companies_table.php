<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompaniesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('companies', function (Blueprint $table) {
            $table->increments('id');
            $table->string('code');
            $table->string('name');
            $table->enum('company_status_id', ['pending', 'published'])->default('published');
            $table->integer('business_sector_id')->unsigned();
            $table->integer('state_id')->unsigned();
            $table->string('city');
            $table->string('website_url');
            $table->integer('score')->default(0);
            $table->integer('reviewed_by')->nullable()->unsigned();

            $table->timestamps();
            $table->softDeletes();

            $table->unique('code');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('companies');
    }
}
