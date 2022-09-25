<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMpesaPaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mpesa_payments', function (Blueprint $table) {
            $table->id();
            $table->string('MerchantRequestID');
            $table->string('CheckoutRequestID');
            $table->integer('ResultCode');
            $table->integer('ResultDesc');
            $table->double('Amount');
            $table->string('MpesaReceiptNumber')->unique();
            $table->date('TransactionDate');
            $table->bigInteger('PhoneNumber');
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
        Schema::dropIfExists('mpesa_payments');
    }
}
