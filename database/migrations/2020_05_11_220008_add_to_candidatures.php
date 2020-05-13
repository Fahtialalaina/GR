<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddToCandidatures extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('candidatures', function (Blueprint $table) {
            $table->boolean('isSelectedToTest');
            $table->longText('Questions');
            $table->boolean('isTested');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('candidatures', function (Blueprint $table) {
            $table->dropColumn('isSelectedToTest');
            $table->dropColumn('Questions');
            $table->dropColumn('isTested');
        });
    }
}
