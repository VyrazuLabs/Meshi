<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFoodItem extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('food_item', function (Blueprint $table) {
            $table->increments('id');
            $table->string('food_item_id');
            $table->string('item_name');
            $table->string('category_id');
            $table->longText('food_images')->nullable();
            $table->date('date_of_availability');
            $table->longText('time_of_availability');
            $table->longText('food_description');
            $table->longText('short_info')->nullable();
            $table->string('offered_by');
            $table->string('shipping_fee')->nullable();
            $table->string('price');
            $table->integer('status');
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
        Schema::dropIfExists('food_item');
    }
}
