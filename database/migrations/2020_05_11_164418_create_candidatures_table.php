<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCandidaturesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('candidatures', function (Blueprint $table) {
            $table->id();
            $table->string('nom');
            $table->string('Prénoms');
            $table->string('DateNaissance');
            $table->string('Adresse');
            $table->string('cin');
            $table->mediumText('resumeCV');
            $table->mediumText('experience');
            $table->mediumText('lm');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('candidatures');
    }
}
