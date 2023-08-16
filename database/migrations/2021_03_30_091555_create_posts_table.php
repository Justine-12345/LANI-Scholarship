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
            $table->id('postId');
            $table->string('postTitle', 100);
            $table->string('postContent', 5000);
            $table->date('postDate');
            $table->unsignedBigInteger('adminId')->nullable();
            $table->foreign('adminId')->references('adminId')->on('admins');
            $table->unsignedBigInteger('scholarId')->nullable();
            $table->foreign('scholarId')->references('scholarId')->on('scholars');

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
        Schema::dropIfExists('posts');
    }
}
