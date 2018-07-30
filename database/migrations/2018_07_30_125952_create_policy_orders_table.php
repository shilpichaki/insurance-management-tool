<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePolicyOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_policy_order', function (Blueprint $table) {
            $table->integer('order_id',11)->autoIncrement();
            $table->dateTime('order_date');
            $table->string('application_no',50)->unique();
            $table->integer('customer_id');
            $table->enum('case_taker_type',['direct', 'indirect']);
            $table->string('d_case_taker_id', 50)->nullable();
            $table->integer('i_case_taker_id')->nullable();
            $table->integer('policy_id');
            $table->decimal('amount',18,2);
            $table->enum('payment_mode',['cheque', 'dd', 'cash']);
            $table->string('instrument_no',50)->nullable();
            $table->dateTime('instrument_date');
            $table->string('nominee_name',100);
            $table->dateTime('nominee_dob');
            $table->integer('nominee_relation_id');
            $table->enum('handover_to_company_type', ['mother', 'sub']);
            $table->integer('handover_to_mother_company_id');
            $table->integer('handover_to_sub_company_id');
            $table->dateTime('handover_date')->nullable();
            $table->boolean('plvc');
            $table->integer('policy_status_id');
            $table->boolean('recovered');
            $table->dateTime('issuence_date')->nullable();
            $table->timestamps();

            $table->foreign('customer_id')->references('customer_id')->on('tbl_customer_mast');
            $table->foreign('nominee_relation_id')->references('relation_code')->on('tbl_family_relation_mast');
            $table->foreign('d_case_taker_id')->references('emp_id')->on('tbl_employee_mast');
            $table->foreign('i_case_taker_id')->references('b_company_id')->on('tbl_broker_company_mast');
            $table->foreign('policy_id')->references('policy_id')->on('tbl_policy_mast');
            $table->foreign('handover_to_mother_company_id')->references('m_company_id')->on('tbl_mother_company_mast');
            $table->foreign('handover_to_sub_company_id')->references('s_company_id')->on('tbl_sub_company_mast');
            $table->foreign('policy_status_id')->references('policy_status_id')->on('tbl_policy_status');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbl_policy_order');
    }
}
