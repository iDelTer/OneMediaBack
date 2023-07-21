<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompletedGamesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('completed_games', function (Blueprint $table) {
            // $table->bigInteger('user_id');
            // $table->bigInteger('game_id');
            $table->foreignId('user_id');
            $table->foreignId('game_id');
            // $table->foreign('user_id')->references('id')->on('users');
            // $table->foreign('game_id')->references('id')->on('games');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('completed_games');
    }
}
