<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePaymentReleasedsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_payment_released', function (Blueprint $table) {
            $table->integer('payment_id',11)->autoIncrement();
            $table->integer('b_company_id');
            $table->boolean('is_gst');
            $table->enum('gst_type',['state', 'interstate'])->nullable();
            $table->tinyInteger('tax_percentage')->nullable();
            $table->decimal('tax_amount',18,2)->nullable();
            $table->decimal('payment_amount',18,2);
            $table->enum('payment_mode',['cheque', 'dd', 'cash']);
            $table->string('instrument_no', 50)->nullable();
            $table->dateTime('instrument_date');
            $table->timestamps();

            $table->foreign('b_company_id')->references('b_company_id')->on('tbl_broker_company_mast');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbl_payment_released');
    }
}
