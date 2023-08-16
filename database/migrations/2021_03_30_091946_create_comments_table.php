<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comments', function (Blueprint $table) {
            $table->id('commentId');
            $table->string('commentContent', 5000);
            $table->date('commentDate');

            $table->unsignedBigInteger('postId');
            $table->foreign('postId')->references('postId')->on('posts');

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
        Schema::dropIfExists('comments');
    }
}
