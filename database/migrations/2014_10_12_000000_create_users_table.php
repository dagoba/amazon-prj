<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 100);
            $table->decimal('balance', 8, 2)->default(0.00);
            $table->string('avatar',250)->nullable();
            $table->decimal('rating', 8, 2)->default(0.00);
            $table->string('firstname',150)->nullable();
            $table->string('lastname',150)->nullable();
            $table->string('address',255)->nullable();
            $table->string('city',150)->nullable();
            $table->string('country',150)->nullable();
            $table->integer('postcode')->nullable();
            $table->text('aboutme')->nullable();
            $table->string('email', 150)->unique();
            $table->string('password');
            $table->integer('group')->default('2'); 
            $table->boolean('verified')->default(false);
            $table->string('token')->nullable();
            $table->string('referred_by', 10)->nullable();
            $table->string('affiliate_id', 10)->unique();
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
