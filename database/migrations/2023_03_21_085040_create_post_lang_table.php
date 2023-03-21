<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostLangTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('post_lang', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->foreign('lang_id')->references('id')->on('langs');
            $table->foreign('post_id')->references('id')->on('posts');
            $table->string('title');
            $table->text('description');
            $table->longText('information');
            $table->softDeletes();
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
        Schema::dropIfExists('post_lang');
    }
}
