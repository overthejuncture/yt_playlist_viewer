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
        Schema::create('videos', function (Blueprint $table) {
            $table->id();
            $table->string('title', 1000);
            $table->string('real_id');
            $table->string('author_id');
            $table->string('author_title');
            $table->string('user_id');
            $table->text('thumbnail')->nullable();
            $table->boolean('is_watch_later')->nullable();

            $table->unique(['real_id', 'user_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('videos');
    }
};
