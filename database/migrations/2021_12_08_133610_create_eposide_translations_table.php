<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEposideTranslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('eposide_translations', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('eposide_id')->unsigned();
            $table->string('locale')->index();
            $table->string('ep_title');
            $table->text('ep_desc')->nullable();

            $table->unique(['eposide_id', 'locale']);
            $table->foreign('eposide_id')->references('id')->on('eposides')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('eposide_translations');
    }
}
