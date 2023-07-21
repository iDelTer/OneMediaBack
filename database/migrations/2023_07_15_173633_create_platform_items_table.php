<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePlatformItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('platform_items', function (Blueprint $table) {
            $table->id();
            // $table->bigInteger('item_id');
            // $table->bigInteger('platform_id');
            $table->foreignId('item_id');
            $table->foreignId('platform_id');
            // $table->foreign('item_id')->references('id')->on('items');
            // $table->foreign('platform_id')->references('id')->on('platforms');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('platform_items');
    }
}
