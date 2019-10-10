<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSongsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('songs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('file_name');
            $table->string('image');
            $table->float('size');
            $table->bigInteger('category_id')->unsigned();
            $table->text('lyric');
            $table->bigInteger('singer_id')->unsigned();
            $table->bigInteger('artist_id')->unsigned();
            $table->bigInteger('user_id')->unsigned();
            $table->foreign('category_id')->references('id')->on('categories');
            $table->foreign('singer_id')->references('id')->on('singers');
            $table->foreign('artist_id')->references('id')->on('artists');
            $table->foreign('user_id')->references('id')->on('users');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('songs');
    }
}
