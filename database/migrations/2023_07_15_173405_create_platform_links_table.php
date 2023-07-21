<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePlatformLinksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('platform_links', function (Blueprint $table) {
            $table->id();
            // $table->bigInteger('platform_id');
            $table->foreignId('platform_id');
            $table->string('url_link');
            $table->timestamps();
            // $table->foreign('platform_id')->references('id')->on('platforms');

            // $table->bigInteger('item_id');
            // $table->foreign('item_id')->references('id')->on('items');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('platform_links');
    }
}