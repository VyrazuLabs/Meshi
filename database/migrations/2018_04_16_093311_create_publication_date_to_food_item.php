<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePublicationDateToFoodItem extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('food_item', function (Blueprint $table) {
            $table->date('start_publication_date')->after('date_of_availability')->nullable();
            $table->time('start_publication_time')->after('start_publication_date')->nullable();
            $table->date('end_publication_date')->after('start_publication_time')->nullable();
            $table->time('end_publication_time')->after('end_publication_date')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('food_item', function (Blueprint $table) {
            //
        });
    }
}
