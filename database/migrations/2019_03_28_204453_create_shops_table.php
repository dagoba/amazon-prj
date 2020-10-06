<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateShopsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shops', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title', 250);
            $table->string('category', 250);
            $table->string('seller', 250);
            $table->decimal('rating', 20,2);
            $table->decimal('price', 20,2);
            $table->decimal('selling_price', 20,2);
            $table->decimal('percent', 20,2);
            $table->integer('period_percent');
            $table->decimal('referral_percentage', 20,2);
            $table->integer('period_referral_percentage');
            $table->integer('quantity_in_stock');
            $table->integer('quantity_sold');
            $table->decimal('minimum_balance', 20,2);
            $table->decimal('minimum_bet', 20,2);
            $table->integer('quantity_per_day');
            $table->integer('quantity_per_week');
            $table->integer('quantity_per_month');
            $table->decimal('profit_per_day', 20,2);
            $table->decimal('profit_per_week', 20,2);
            $table->decimal('profit_per_month', 20,2);
            $table->boolean('state')->default(TRUE);
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
        Schema::dropIfExists('shops');
    }
}
