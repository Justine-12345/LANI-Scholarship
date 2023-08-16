<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEducationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('education', function (Blueprint $table) {
            $table->id('educationId');
            $table->string('educationSHName', 100);
            $table->string('educationSHType', 100);
	    $table->string('educationSHAddress', 255);
            $table->string('educationSHGraduated', 100);
            $table->string('educationSHHonor', 255)->nullable();

            $table->string('educationJHName', 100);
            $table->string('educationJHType', 100);
            $table->string('educationJHAddress', 255);
            $table->string('educationJHGraduated', 100);
            $table->string('educationJHHonor', 255)->nullable();

            $table->string('educationELName', 100);
            $table->string('educationELType', 100);
            $table->string('educationELAddress', 255);
            $table->string('educationELGraduated', 100);
            $table->string('educationELHonor', 255)->nullable();
            $table->unsignedBigInteger('scholarId');
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
        Schema::dropIfExists('education');
    }
}
