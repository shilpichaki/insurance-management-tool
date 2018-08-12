<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCustomersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_customer_mast', function (Blueprint $table) {
            $table->integer('customer_id',11)->autoIncrement();
            $table->string('customer_name',50); 
            $table->dateTime('customer_dob'); 
            $table->string('customer_phno',20)->unique(); 
            $table->string('customer_address',100)->unique();
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
        Schema::dropIfExists('tbl_customer_mast');
    }
}
