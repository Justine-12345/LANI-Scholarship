<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAnnouncementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('announcements', function (Blueprint $table) {
            $table->id('announcementId');
            $table->string('announcementImage', 255);
            $table->date('announcementDate');
            $table->string('announcementContent', 5000);
            
            $table->unsignedBigInteger('adminId');
            $table->foreign('adminId')->references('adminId')->on('admins');

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
        Schema::dropIfExists('announcements');
    }
}
