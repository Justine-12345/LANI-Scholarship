<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdminsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('admins', function (Blueprint $table) {
            $table->id('adminId');
            $table->string('adminFirstName', 100);
            $table->string('adminLastName', 100);
            $table->string('adminMiddleName', 100)->nullable();
            $table->string('adminPassword', 100);
            $table->string('adminEmail', 100);
            $table->string('adminAddressline', 100);
            $table->date('adminBirthDate');
            $table->string('adminStatus', 100);
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
        Schema::dropIfExists('admins');
    }
}
