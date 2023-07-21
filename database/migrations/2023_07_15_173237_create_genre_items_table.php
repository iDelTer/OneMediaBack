<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGenreItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('genre_items', function (Blueprint $table) {
            // $table->bigInteger('item_id');
            $table->foreignId('item_id');
            // $table->bigInteger('genre_id');
            $table->foreignId('genre_id');
            $table->timestamps();
            // $table->foreign('item_id')->references('id')->on('items');
            // $table->foreign('genre_id')->references('id')->on('genres');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('genre_items');
    }
}
