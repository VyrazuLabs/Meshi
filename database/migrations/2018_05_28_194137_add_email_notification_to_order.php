<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddEmailNotificationToOrder extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('order', function (Blueprint $table) {
            $table->integer('email_notification')->after('status');
            $table->integer('reviewed_by_eater')->after('email_notification');
            $table->integer('eater_review_notification')->after('reviewed_by_eater');
            $table->integer('reviewed_by_creator')->after('reviewed_by_eater');
            $table->integer('creator_review_notification')->after('reviewed_by_creator');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('order', function (Blueprint $table) {
            //
        });
    }
}
