<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class InsertDataIntoGenresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::table('genres')->insert([
            ['web_id' => 12, 'name' => 'Aventura'],
            ['web_id' => 14, 'name' => 'Fantasía'],
            ['web_id' => 16, 'name' => 'Animación'],
            ['web_id' => 18, 'name' => 'Drama'],
            ['web_id' => 27, 'name' => 'Terror'],
            ['web_id' => 28, 'name' => 'Acción'],
            ['web_id' => 35, 'name' => 'Comedia'],
            ['web_id' => 36, 'name' => 'Historia'],
            ['web_id' => 37, 'name' => 'Western'],
            ['web_id' => 53, 'name' => 'Suspense'],
            ['web_id' => 80, 'name' => 'Crimen'],
            ['web_id' => 99, 'name' => 'Documental'],
            ['web_id' => 878, 'name' => 'Ciencia ficción'],
            ['web_id' => 9648, 'name' => 'Misterio'],
            ['web_id' => 10402, 'name' => 'Música'],
            ['web_id' => 10749, 'name' => 'Romance'],
            ['web_id' => 10751, 'name' => 'Familia'],
            ['web_id' => 10752, 'name' => 'Bélica'],
            ['web_id' => 10770, 'name' => 'Pelicula TV'],
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('genres', function (Blueprint $table) {
            //
        });
    }
}
