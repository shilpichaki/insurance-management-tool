<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrderPaymentStatusesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_order_payment_status', function (Blueprint $table) {
            $table->integer('order_payment_status_id',11)->autoIncrement();
            $table->string('order_payment_status_name',50)->unique(); 
            $table->string('order_payment_status_des',255)->nullable(); 

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
        Schema::dropIfExists('tbl_order_payment_status');
    }
}
