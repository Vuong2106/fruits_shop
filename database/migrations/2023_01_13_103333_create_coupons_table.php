<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCouponsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('coupons', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('percent')->length(10);
            $table->string('code', 10);
            $table->integer('user_type_id')->unsigned();
            $table->dateTime('expiration_date');
            $table->timestamps();
            $table->softDeletes();

            // $table->foreign('user_type_id')->references('id')->on('user_types');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('coupons');
    }
}
