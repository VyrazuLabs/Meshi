<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProfileInformation extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profile_information', function (Blueprint $table) {
            $table->increments('id');
            $table->string('user_id');
            $table->string('phone_number');
            $table->longText('address');
            $table->string('lat');
            $table->string('long');
            $table->longText('description');
            $table->string('image');
            $table->string('video_link')->nullable();
            $table->integer('age');
            $table->string('created_by')->nullable();
            $table->integer('total_dishes')->nullable();
            $table->string('zipcode');
            $table->string('prefectures');
            $table->string('municipality');
            $table->string('gender');
            $table->string('profession');
            $table->longText('reason_for_registration')->nullable();
            $table->string('job');
            $table->longText('user_introduction');
            $table->longText('profile_message');
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
        Schema::dropIfExists('profile_information');
    }
}
