<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('product_name')->nullable(false);
            $table->string('description')->nullable();
            $table->string('image')->nullable();
            $table->integer('price')->nullable(false);
            $table->timestamp('creation_date')->nullable();
            $table->string('include_VAT');
            $table->integer('quantity')->nullable(false);
            $table->integer('category_id')->nullable(false);
//            $table->foreign('category_id')->references('id')->on('categories');
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
        Schema::dropIfExists('products');
    }
}
