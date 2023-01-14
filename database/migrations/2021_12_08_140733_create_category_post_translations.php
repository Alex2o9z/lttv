<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategoryPostTranslations extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('category_post_translations', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('cate_post_id')->unsigned();
            $table->string('locale')->index();
            $table->string('title');
            $table->text('desc');

            $table->unique(['cate_post_id', 'locale']);
            $table->foreign('cate_post_id')->references('id')->on('categories_post')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('category_post_translations');
    }
}
