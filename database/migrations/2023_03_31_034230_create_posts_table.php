<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class () extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cta', function (Blueprint $table) {
            $table->unsignedBigInteger('id')->primary();
            $table->string('cta_text');
            $table->string('cta_link');
            $table->timestamps();
        });

        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->timestamps();
        });

        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('description');
            $table->unsignedBigInteger('cta_id');
            $table->unsignedBigInteger('user_id');
            $table
                ->foreign('cta_id')
                ->references('id')
                ->on('cta');
            $table
                ->foreign('user_id')
                ->references('id')
                ->on('users');
            $table->softDeletes();
            $table->timestamps();
        });

        Schema::create('category_post', function (Blueprint $table) {
            $table->unsignedBigInteger('category_id');
            $table->unsignedBigInteger('post_id');
            $table
                ->foreign('category_id')
                ->references('id')
                ->on('categories')
                ->onDelete('cascade');
            $table
                ->foreign('post_id')
                ->references('id')
                ->on('posts')
                ->onDelete('cascade');
            $table->primary(['category_id', 'post_id']);
            $table->timestamps();
        });

        Schema::create('post_images', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('post_id');
            $table
                ->foreign('post_id')
                ->references('id')
                ->on('posts');
            $table->string('banner_image');
            $table->string('name');
            $table->string('url');
            $table->timestamps();
        });

        Schema::table('cta', function (Blueprint $table) {
            $table->index('id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('category_post');
        Schema::table('posts', function (Blueprint $table) {
            $table->dropForeign(['cta_id']);
            $table->dropForeign(['user_id']);
        });
        Schema::dropIfExists('posts');
        Schema::dropIfExists('categories');
        Schema::dropIfExists('cta');
        Schema::dropIfExists('post_images');
    }
};
