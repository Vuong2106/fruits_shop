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
            $table->bigIncrements('id');
            $table->integer('category_id')->unsigned();
            $table->string('title',255);
            $table->integer('price')->length(100);
            $table->integer('discount')->length(100);
            $table->integer('weight')->nullable();
            $table->string('weight_unit',10)->nullable();
            $table->string('thumbnail');
            $table->longText('description')->nullable();
            $table->timestamps();
            $table->softDeletes();

            // $table->foreign('category_id')->references('id')->on('categories');
            // $table->foreign('coupon_id')->references('id')->on('coupons');
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
