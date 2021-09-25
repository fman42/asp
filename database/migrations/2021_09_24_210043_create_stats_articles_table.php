<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStatsArticlesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stats_articles', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('article_id')->unsigned();
            $table->integer('likes_count');
            $table->integer('viewers_count');

            $table->foreign('article_id')
                ->references('id')->on('articles')
                ->onDelete('cascade')
                ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('stats_articles');
    }
}
