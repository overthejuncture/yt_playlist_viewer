<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('youtube_playlists', function (Blueprint $table) {
            $table->increments('id');
            $table->string('youtube_id');
            $table->string('channel_id');
            $table->string('status');
            $table->integer('item_count');
            $table->string('title');
            $table->string('description', 5000);
            $table->json('thumbnails');
            $table->foreignId('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('youtube_playlists');
    }
};
