<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMusicMetaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('music_meta', function (Blueprint $table) {
            $table->id();
            $table->foreignId('item_id');
            $table->foreignId('author_id');
            // $table->bigInteger('item_id');
            // $table->bigInteger('author_id');
            // $table->foreign('item_id')->references('id')->on('items');
            // $table->foreign('author_id')->references('id')->on('celebrities');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('music_meta');
    }
}
