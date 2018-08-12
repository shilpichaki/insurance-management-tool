<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePolicyRecoveryDatasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_policy_recovery_data', function (Blueprint $table) {
            $table->integer('recovery_id',11)->autoIncrement();
            $table->integer('order_id');
            $table->dateTime('recovery_date');
            $table->enum('payment_mode',['cash','dd','cheque']);
            $table->string('instrument_no',50)->nullable();
            $table->dateTime('instrument_date');
            $table->timestamps();

            $table->foreign('order_id')->references('order_id')->on('tbl_policy_order');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbl_policy_recovery_data');
    }
}
