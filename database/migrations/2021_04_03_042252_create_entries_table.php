<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEntriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('entries', function (Blueprint $table) {
            $table->id('entriesId');
            $table->string('entriesStatus', 24)->nullable();
            $table->string('entriesComment', 5000)->nullable();

            $table->unsignedBigInteger('submissionId');
            $table->foreign('submissionId')->references('submissionId')->on('submissions');


            $table->unsignedBigInteger('applicationId');
            $table->foreign('applicationId')->references('applicationId')->on('applications');


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
        Schema::dropIfExists('entries');
    }
}
