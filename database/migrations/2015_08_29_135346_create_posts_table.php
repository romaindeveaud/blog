<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();

            $table->string('title');
            $table->string('image')->default('outdoor-bg.jpg');
            $table->string('urlified_title');
            $table->text('content');
            $table->integer('author_id')->unsigned();
            $table->integer('count_read')->default(0);
            $table->boolean('is_draft')->default(true);

            $table->foreign('author_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('posts');
    }
}
