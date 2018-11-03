<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddOrderPaymentStatusIdToTblPolicyOrder extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tbl_policy_order', function (Blueprint $table) {
            $table->integer('order_payment_status_id')->after('policy_status_id')->nullable();

            $table->foreign('order_payment_status_id')->references('order_payment_status_id')->on('tbl_order_payment_status');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('tbl_policy_order', function (Blueprint $table) {
            $table->dropColumn('order_payment_status_id');
        });
    }
}
