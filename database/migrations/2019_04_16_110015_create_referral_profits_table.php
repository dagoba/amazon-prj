<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReferralProfitsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('referral_profits', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('transaction_id');
            $table->integer('user_id');
            $table->integer('referral_id');
            $table->integer('operator_id');
            $table->integer('rate_id');
            $table->decimal('cost', 8, 2);
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
        Schema::dropIfExists('referral_profits');
    }
}
