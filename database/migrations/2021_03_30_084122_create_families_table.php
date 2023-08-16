<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFamiliesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('families', function (Blueprint $table) {
            $table->id('familyId');
            $table->string('familyFatherLiving', 100)->nullable();
            $table->string('familyFatherName', 100)->nullable();
            $table->string('familyFatherAddress', 100)->nullable();
            $table->string('familyFatherContact', 100)->nullable();
            $table->string('familyFatherOccupation', 100)->nullable();
            $table->string('familyFatherWorkPlace', 100)->nullable();
            $table->string('familyFatherHighestEduc', 100)->nullable();

            $table->string('familyMotherLiving', 100)->nullable();
            $table->string('familyMotherName', 100)->nullable();
            $table->string('familyMotherAddress', 100)->nullable();
            $table->string('familyMotherContact', 100)->nullable();
            $table->string('familyMotherOccupation', 100)->nullable();
            $table->string('familyMotherWorkPlace', 100)->nullable();
            $table->string('familyMotherHighestEduc', 100)->nullable();

            $table->string('familySpouseLiving', 100)->nullable();
            $table->string('familySpouseName', 100)->nullable();
            $table->string('familySpouseAddress', 100)->nullable();
            $table->string('familySpouseContact', 100)->nullable();
            $table->string('familySpouseOccupation', 100)->nullable();
            $table->string('familySpouseWorkPlace', 100)->nullable();
            $table->string('familySpouseHighestEduc', 100)->nullable();
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
        Schema::dropIfExists('families');
    }
}
