<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSiblingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('siblings', function (Blueprint $table) {
            $table->id();
            $table->string('siblingName', 100)->nullable();
            $table->integer('siblingAge')->unsigned()->nullable();
            $table->string('siblingCivilStatus', 100)->nullable();
            $table->string('siblingHighestEduc', 100)->nullable();
            $table->string('siblingWork', 100)->nullable();
            $table->bigInteger('siblingMontlyIncome')->unsigned()->nullable();
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
        Schema::dropIfExists('siblings');
    }
}
