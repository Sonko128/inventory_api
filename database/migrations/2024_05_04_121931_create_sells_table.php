<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sells', function (Blueprint $table) {
            $table->id();
            $table->foreignId('product_id');
            $table->integer('product_code');
            $table->string('product_name');
            $table->integer('selling_price');
            $table->string('unites');
            $table->integer('reciept_no')->unique();
            $table->integer('quantity');
            $table->string('category_name');
            $table->foreignId('user_id');
            $table->integer('stock_in');
            $table->string('expire_date');
            $table->timestamps();

            $table->foreign('product_id')->references('id')->on('stocks');
            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sells');
    }
};
