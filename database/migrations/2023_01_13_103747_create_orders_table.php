<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('user_id')->unsigned();
            $table->string('order_code', 10);
            $table->string('fullname', 60);
            $table->string('email', 150)->nullable();
            $table->string('phone_number', 20)->nullable();
            $table->string('address', 200);
            $table->string('note')->nullable();
            $table->tinyInteger('status')->length(4);
            $table->bigInteger('coupon_id')->unsigned();
            $table->softDeletes();
            $table->timestamps();

            // $table->foreign('user_id')->references('id')->on('users');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
}
