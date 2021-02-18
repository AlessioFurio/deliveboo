<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDishesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dishes', function (Blueprint $table) {
          $table->id();
          $table->unsignedBigInteger('restaurant_id');
          $table->foreign('restaurant_id')->references('id')->on('restaurants');
          $table->unsignedBigInteger('course_id');
          $table->foreign('course_id')->references('id')->on('courses');
          $table->string('name');
          $table->text('ingredients');
          $table->double('price', 4, 2);
          $table->boolean('visibility');
          $table->timestamps();
          $table->string('cover')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('dishes');
    }
}
