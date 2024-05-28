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
        Schema::create('stocks', function (Blueprint $table) {
            $table->id();
            $table->integer('item_code');
            $table->string('item_name');
            $table->integer('cost_price');
            $table->integer('quantity');
            $table->string('unites');
            $table->integer('selling_price');
            $table->unsignedInteger('stock_in');
            $table->integer('reciept');
            $table->string('expire_date');
            $table->string('item_category');
            $table->foreignId('supplier_id');
            $table->timestamps();

            $table->foreign('supplier_id')->references('id')->on('suppliers');


            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('stocks');
    }
};
