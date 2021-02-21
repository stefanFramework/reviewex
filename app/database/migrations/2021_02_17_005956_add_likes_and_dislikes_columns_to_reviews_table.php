<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddLikesAndDislikesColumnsToReviewsTable extends Migration
{
    public function up()
    {
        Schema::table('reviews', function (Blueprint $table) {
            $table->integer('social_score')->default(0);
            $table->integer('likes')->default(0);
            $table->integer('dislikes')->default(0);
        });
    }

    public function down()
    {
        Schema::table('reviews', function (Blueprint $table) {
            $table->dropColumn(['likes', 'dislikes', 'social_score']);
        });
    }
}
