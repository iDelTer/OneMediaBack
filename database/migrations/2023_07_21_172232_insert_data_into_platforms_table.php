<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class InsertDataIntoPlatformsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::table('genres')->insert([
            ['name' => 'Netflix', 'web_url' => 'https://netflix.com'],
            ['name' => 'HBO', 'web_url' => 'https://hbomax.com'],
            ['name' => 'Disney Plus', 'web_url' => 'https://disneyplus.com'],
            ['name' => 'Amazon Prime Video', 'web_url' => 'https://primvevideo.com'],
            ['name' => 'Steam', 'web_url' => 'https://store.steampowered.com'],
            ['name' => 'PS4', 'web_url' => 'https://playstation.com'],
            ['name' => 'XBOX', 'web_url' => 'https://xbox.com'],
            ['name' => 'Nintendo', 'web_url' => 'https://nintendo.com'],
            ['name' => 'Uplay', 'web_url' => 'https://ubisoftconnect.com'],
            ['name' => 'Origin', 'web_url' => 'https://ea.com'],
            ['name' => 'GOG', 'web_url' => 'https://gog.com'],
            ['name' => 'Epic Games', 'web_url' => 'https://epicgames.com'],
            ['name' => 'SoundCloud', 'web_url' => 'https://soundloud.com'],
            ['name' => 'Spotify', 'web_url' => 'https://spotify.com'],
            ['name' => 'Apple Music', 'web_url' => 'https://apple.com/apple-music'],
            ['name' => 'Apple TV Plus', 'web_url' => 'https://apple.com/apple-tv-plus'],
            ['name' => 'Amazon Music', 'web_url' => 'https://amazon.com/music'],
            ['name' => 'Youtube Music', 'web_url' => 'https://music.youtube.com'],
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('platforms', function (Blueprint $table) {
            //
        });
    }
}
