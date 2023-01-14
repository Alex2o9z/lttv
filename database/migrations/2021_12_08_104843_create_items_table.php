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
            $table->increments('id');
            $table->string('poster');
            $table->string('running_time');
            $table->integer('release_year');
            $table->string('quality');
            $table->string('age')->nullable();
            $table->tinyInteger('status');
            $table->tinyInteger('type');
            $table->tinyInteger('premium');
            $table->bigInteger('view');
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
        Schema::dropIfExists('items');
    }
}
