<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateApplicationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('applications', function (Blueprint $table) {
            $table->id('applicationId');
            $table->string('applicationScholarStatus', 255);
            $table->string('applicationIdPicture', 255)->nullable();
            $table->string('applicationScholarType', 100);
            $table->string('applicationEnrollmentForm', 255)->nullable();
            $table->string('applicationReportCard', 255)->nullable();
            $table->string('applicationDiploma', 255)->nullable();
            $table->string('applicationGoodMoral', 255)->nullable();
            $table->string('applicationSchoolId', 255)->nullable();
            $table->string('applicationAcademicExcellence', 255)->nullable();
            $table->string('applicationVotersCertificate', 255)->nullable();
            $table->string('applicationVotersCertificateP', 255)->nullable();
            $table->string('applicationBirthCertificate', 255)->nullable();
            $table->string('applicationOtherDocs', 255)->nullable();
            $table->unsignedBigInteger('scholarId');
            $table->foreign('scholarId')->references('scholarId')->on('scholars');
	    $table->Date('applicationSubmitDate', 20)->nullable();
            $table->string('applicationApplicant', 255)->nullable();
            $table->string('applicationApplicantParent', 255)->nullable();
	    $table->integer('applicationNumOfEdit', false, true)->nullable();

	 

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
        Schema::dropIfExists('applications');
    }
}
