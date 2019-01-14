<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNomineeMasterTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nominee_details', function (Blueprint $table) {
            $table->increments('id');
            $table->string('user_id',50);
            $table->string('nominee_name', '80');
            $table->string('nominee_relationship', '40');
            $table->timestamps();

            $table->foreign('user_id')->references('empid')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('nominee_master');
    }
}
