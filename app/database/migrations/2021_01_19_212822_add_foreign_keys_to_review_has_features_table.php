<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToReviewHasFeaturesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('review_has_features', function (Blueprint $table) {
            $table->foreign('feature_id')->references('id')->on('features');
            $table->foreign('review_id')->references('id')->on('reviews');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('review_has_features', function (Blueprint $table) {
            $table->dropForeign(['feature_id']);
            $table->dropForeign(['review_id']);
        });
    }
}
