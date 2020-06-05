<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->bigIncrements('id');
            $table->integer('user_id');
            $table->foreign('user_id')->references('id')->on('users');
            $table->integer('category_id');
            $table->foreign('category_id')->references('id')->on('categories');
            $table->string('title', 250)->unique();
            $table->string('slug', 250)->unique();
            $table->longText('content');
            $table->string('image')->nullable();
            $table->boolean('is_publish')->default(false);
            $table->dateTime('deleted_at')->nullable();
            $table->dateTime('published_at')->nullable();
            $table->timestamps();
        });

        Schema::table('posts', function (Blueprint $table) {
            $table->engine = 'InnoDB';
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('posts');
    }
}
