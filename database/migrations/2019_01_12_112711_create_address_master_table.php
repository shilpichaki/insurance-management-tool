<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAddressMasterTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('address_master', function (Blueprint $table) {
            $table->increments('id');
            $table->string('user_id',50);
            $table->string('permanent_street','100');
            $table->string('permanent_town', '100');
            $table->string('permanent_pin', '100');
            $table->integer('permanent_state_id');
            $table->string('present_street','100');
            $table->string('present_town', '100');
            $table->string('present_pin', '100');
            $table->integer('present_state_id');
            $table->timestamps();

            $table->foreign('user_id')->references('empid')->on('users');
            $table->foreign('permanent_state_id')->references('state_id')->on('states');
            $table->foreign('present_state_id')->references('state_id')->on('states');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('address_master');
    }
}
