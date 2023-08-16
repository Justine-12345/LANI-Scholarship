<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->id('transactionId');
            $table->date('transactionDateRecieving')->nullable();
            $table->bigInteger('transactionAmount')->unsigned()->nullable();
            $table->string('transactionGcashNum', 100)->nullable();
            $table->string('transactionGcashName', 100)->nullable();
            $table->string('transactionQRCode', 100)->nullable();
            $table->date('transactionDateReceived')->nullable();

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
        Schema::dropIfExists('transactions');
    }
}
