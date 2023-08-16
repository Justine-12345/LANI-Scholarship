<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSignaturesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('signatures', function (Blueprint $table) {
            $table->id('signatureId');
            $table->string('scholarSignature', 255);
            $table->string('guardianSignature', 255);
            $table->date('signatureDate');
	    $table->date('signatureDateParent');
            $table->unsignedBigInteger('applicationId');
            $table->foreign('applicationId')->references('applicationId')->on('applications');

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
        Schema::dropIfExists('signatures');
    }
}
