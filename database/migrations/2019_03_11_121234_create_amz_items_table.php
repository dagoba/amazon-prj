<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAmzItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('amz_items', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->nullable();
            $table->string('brand');
            $table->string('price');
            $table->string('min_price')->nullable();
            $table->string('net')->nullable();
            $table->string('fba_fees')->nullable();
            $table->string('lqs');
            $table->string('category');
            $table->string('sellers');
            $table->string('rank');
            $table->string('est_sales')->nullable();
            $table->string('est_revenue')->nullable();
            $table->string('reviews_count');
            $table->string('available_from');
            $table->string('rating');
            $table->string('seller');
            $table->string('weight')->nullable();
            $table->string('shipping_weight')->nullable();
            $table->string('size')->nullable();
            $table->string('colors');
            $table->string('oversize')->nullable();
            $table->string('sizes')->nullable();
            $table->string('asin');
            $table->string('url');
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
        Schema::dropIfExists('amz_items');
    }
}
