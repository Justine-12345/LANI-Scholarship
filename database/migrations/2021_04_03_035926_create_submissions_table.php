<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubmissionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('submissions', function (Blueprint $table) {
            $table->id('submissionId');
            $table->string('submissionBatch', 20);
            $table->string('submissionSem', 20);
            $table->string('submissionYear',20 );
            $table->string('submissionDesc',5000);
            $table->date('submissionStart');
            $table->date('submissionEnd');
            $table->unsignedBigInteger('adminId');
            $table->foreign('adminId')->references('adminId')->on('admins');
            $table->string('submissionStatus',20 );

        $table->timestamps();
        $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('submissions');
    }
}
