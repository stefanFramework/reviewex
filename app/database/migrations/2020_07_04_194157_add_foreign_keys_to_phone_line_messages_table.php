<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToPhoneLineMessagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('phone_line_messages', function (Blueprint $table) {
            $table->foreign('phone_line_id')->references('id')->on('phone_lines');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('phone_line_messages', function (Blueprint $table) {
            $table->dropForeign(['phone_line_id']);
        });
    }
}
