<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePaymentWithdrawalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payment_withdrawals', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('transaction_id')->nullable();
            $table->integer('user_id');
            $table->integer('operator_id')->nullable();
            $table->decimal('amount', 8, 2);
            $table->text('description');
            $table->string('user_comment')->nullable();
            $table->string('operator_comment')->nullable();
            $table->string('requisites', 255);
            $table->integer('payment_id');
            $table->integer('status');
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
        Schema::dropIfExists('payment_withdrawals');
    }
}
