<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEaterReview extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('eater_review', function (Blueprint $table) {
            $table->increments('id');
            $table->string('review_id');
            $table->string('reviewed_by');
            $table->string('food_item_id');
            $table->string('order_id');
            $table->string('quality_ratings');
            $table->string('delivery_ratings');
            $table->string('communication_ratings');
            $table->longText('review_description');
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
        Schema::dropIfExists('eater_review');
    }
}
