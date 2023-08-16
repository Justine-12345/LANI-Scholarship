<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateScholarsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('scholars', function (Blueprint $table) {
            $table->id('scholarId');
            $table->string('scholarStatus', 100)->nullable();
            $table->string('scholarLastName', 100);
            $table->string('scholarFirstName', 100);
            $table->string('scholarSuffix', 100)->nullable();
            $table->string('scholarMiddleName', 100)->nullable();
            $table->string('scholarAddress', 100);
            $table->string('scholarBarangay', 100);
            $table->integer('scholarDistrict', false, true)->length(10);
            $table->string('scholarCity', 100);
            $table->string('scholarStartedDate');
            $table->integer('scholarAge', false, true)->length(10);
            $table->string('scholarGender', 100);
            $table->string('scholarEmail', 100)->unique();
            $table->string('scholarContactNum', 20);
            $table->string('scholarReligion', 100)->nullable();
            $table->date('scholarBirthDate');
            $table->string('scholarBirthPlace', 100);
            $table->string('scholarCivilStatus', 100);
            $table->string('scholarPassword', 100);
	        $table->string('scholarProfilePic', 100)->nullable();
            $table->string('username', 100);
            $table->string('userTitle', 100);
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
        Schema::dropIfExists('scholars');
    }
}
