<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCreatorReview extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('creator_review', function (Blueprint $table) {
            $table->increments('id');
            $table->string('review_id');
            $table->string('reviewed_by');
            $table->string('food_item_id');
            $table->string('order_id');
            $table->string('communication_ratings');
            $table->longText('communication_description');
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
        Schema::dropIfExists('creator_review');
    }
}
