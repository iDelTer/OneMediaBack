<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCelebritiesItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('celebrities_items', function (Blueprint $table) {
            // $table->bigInteger('item_id');
            // $table->bigInteger('celebrity_id');
            $table->foreignId('item_id');
            $table->foreignId('celebrity_id');
            $table->string('character_name');
            $table->timestamps();
            // $table->foreign('item_id')->references('id')->on('items');
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
        Schema::dropIfExists('celebrities_items');
    }
}
