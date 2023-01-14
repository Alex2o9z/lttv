<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEposideVideoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('eposide_video', function (Blueprint $table) {
            $table->id();
            $table->integer('season_id')->unsigned();
            $table->string('link');
            $table->string('size');
            $table->tinyInteger('type');
            $table->timestamps();

            $table->foreign('season_id')->references('id')->on('item_seasons')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('eposide_video');
    }
}
