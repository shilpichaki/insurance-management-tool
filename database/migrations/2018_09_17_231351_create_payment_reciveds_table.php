<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePaymentRecivedsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_payment_recived', function (Blueprint $table) {
            $table->integer('payment_id',11)->autoIncrement();
            $table->enum('company_type',['mother', 'sub']);
            $table->integer('m_company_id')->nullable();
            $table->integer('s_company_id')->nullable();
            $table->boolean('is_gst');
            $table->enum('gst_type',['state', 'interstate'])->nullable();
            $table->tinyInteger('tax_percentage')->nullable();
            $table->decimal('tax_amount',18,2)->nullable();
            $table->decimal('payment_amount',18,2);
            $table->enum('payment_mode',['cheque', 'dd', 'cash']);
            $table->string('instrument_no', 50)->nullable();
            $table->dateTime('instrument_date');
            $table->timestamps();

            $table->foreign('m_company_id')->references('m_company_id')->on('tbl_mother_company_mast');
            $table->foreign('s_company_id')->references('s_company_id')->on('tbl_sub_company_mast');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbl_payment_recived');
    }
}
