<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFoodItemCosting extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('food_item_costing', function (Blueprint $table) {
            $table->increments('id');
            $table->string('food_item_id');
            $table->string('tax_id');
            $table->string('tax_name');
            $table->string('tax_amount');
            $table->string('tax_percentage');
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
        Schema::dropIfExists('food_item_costing');
    }
}
