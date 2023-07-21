<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCelebrityMetaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('celebrity_meta', function (Blueprint $table) {
            // $table->bigInteger('celebrity_id');
            $table->foreignId('celebrity_id');
            $table->string('borndate');
            $table->integer('height');
            // $table->foreign('celebrity_id')->references('id')->on('celebrities');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('celebrity_meta');
    }
}
