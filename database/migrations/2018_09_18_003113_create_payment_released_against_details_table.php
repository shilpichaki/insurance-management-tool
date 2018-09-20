<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePaymentReleasedAgainstDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_payment_released_against_details', function (Blueprint $table) {
            $table->integer('details_id',11)->autoIncrement();
            $table->integer('payment_id');
            $table->integer('order_id');
            $table->integer('policy_id');
            $table->decimal('order_amount',18,2);
            $table->timestamps();

            $table->foreign('payment_id')->references('payment_id')->on('tbl_payment_recived');
            $table->foreign('order_id')->references('order_id')->on('tbl_policy_order');
            $table->foreign('policy_id')->references('policy_id')->on('tbl_policy_mast');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbl_payment_released_against_details');
    }
}
