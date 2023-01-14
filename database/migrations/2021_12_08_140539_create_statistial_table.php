<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStatistialTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('statistial', function (Blueprint $table) {
            $table->id();
            $table->string('month');
            $table->integer('total_view');
            $table->integer('total_item_added');
            $table->integer('total_comment');
            $table->integer('total_review');
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
        Schema::dropIfExists('statistial');
    }
}
