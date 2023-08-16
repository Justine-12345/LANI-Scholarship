<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCoursesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('courses', function (Blueprint $table) {
            $table->id('courseId');
            $table->string('courseName', 100);
            $table->string('courseLadderized', 100);
            $table->string('courseGwa', 100);
            $table->string('courseYearLevel', 100);
            $table->string('courseUnitsEnrolled', 100);
            $table->string('courseDuration', 100);
            $table->string('courseGraduating', 100);
            $table->string('courseGraduatingHonor', 100);
            $table->string('courseNeededSemester', 100);
            $table->string('courseOthers', 100);
            $table->string('courseTransferee', 100)->nullable();
            $table->string('courseShiftee', 100)->nullable();
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
        Schema::dropIfExists('courses');
    }
}
