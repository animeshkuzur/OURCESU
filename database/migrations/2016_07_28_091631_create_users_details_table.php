<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users_details', function (Blueprint $table) {
            $table->increments('id');
            $table->string('DivCode');
            $table->string('DIVISION');
            $table->string('CONTRACT_ACC');
            $table->string('CONSUMER_ACC');
            $table->string('METER_NO');
            $table->string('METER_TYPE');
            $table->string('ADD1');
            $table->string('ADD2');
            $table->string('ADD3');
            $table->string('ADD4');
            $table->string('VILL_CODE');
            $table->string('users_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('users_details');
    }
}
