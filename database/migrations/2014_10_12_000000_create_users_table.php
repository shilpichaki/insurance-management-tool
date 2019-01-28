<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('empid',50)->unique();
            $table->string('userid',100)->unique();
            $table->string('email',100)->unique();
            $table->string('password',255);
            $table->rememberToken();
            $table->timestamps();

            // $table->foreign('empid')->references('emp_id')->on('tbl_Employee_Mast');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
