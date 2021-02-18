<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payments', function (Blueprint $table) {
          $table->id();

          $table->unsignedBigInteger('buyer_id');
          $table->foreign('buyer_id')->references('id')->on('buyers');

          $table->unsignedBigInteger('restaurant_id');
          $table->foreign('restaurant_id')->references('id')->on('restaurants');

          $table->unsignedBigInteger('payment_method_id');
          $table->foreign('payment_method_id')->references('id')->on('payment_methods');

          $table->double('price', 4, 2);
          $table->string('status');
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
        Schema::dropIfExists('payments');
    }
}
