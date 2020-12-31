<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderProductTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_product', function (Blueprint $table) {
            $table->id();
            $table->integer('order_id')->nullable(false);
//            $table->foreign('order_id')->references('id')->on('orders');
            $table->integer('product_id')->nullable(false);
//            $table->foreign('product_id')->references('id')->on('products');
//            $table->integer('quantity')->default(0);
//            $table->integer('sub_total')->default(0);
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
        Schema::dropIfExists('order_product');
    }
}
