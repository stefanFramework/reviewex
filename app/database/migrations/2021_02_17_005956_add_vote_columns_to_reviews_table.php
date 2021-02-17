<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddVoteColumnsToReviewsTable extends Migration
{
    public function up()
    {
        Schema::table('reviews', function (Blueprint $table) {
            $table->integer('consolidated_votes')->default(0);
            $table->integer('positive_votes')->default(0);
            $table->integer('negative_votes')->default(0);
        });
    }

    public function down()
    {
        Schema::table('reviews', function (Blueprint $table) {
            $table->dropColumn([
                'positive_votes',
                'negative_votes',
                'consolidated_votes'
            ]);
        });
    }
}
