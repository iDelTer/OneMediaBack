<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('items', function (Blueprint $table) {
            $table->id();
            // $table->bigInteger('family_id');
            $table->string('name');
            $table->foreignId('family_id');
            $table->boolean('has_childs');
            $table->string('description');
            $table->text('release');
            $table->integer('height_picture')->nullable()->default(null);
            $table->integer('width_picture')->nullable()->default(null);
            // $table->foreign('family_id')->references('id')->on('families');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('items');
    }
}
