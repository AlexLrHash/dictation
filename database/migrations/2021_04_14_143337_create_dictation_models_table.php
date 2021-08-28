<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDictationModelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    // roolback to refresh migratoins
    {
        Schema::create('dictation_models', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string("title");
            $table->string("link");
            $table->boolean("status");
            $table->text("description");
            $table->dateTime("started_at");
            $table->dateTime("finished_at");
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
        Schema::dropIfExists('dictation_models');
    }
}
