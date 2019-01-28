<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePoliciesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_policy_mast', function (Blueprint $table) {
            $table->integer('policy_id',11)->autoIncrement();
            $table->string('user_id',50);
            $table->string('policy_no',50)->unique(); 
            $table->string('policy_name',50); 
            $table->integer('m_company_id'); 
            $table->string('plan_mode',50);
            $table->unsignedTinyInteger('premium_time');
            $table->unsignedTinyInteger('maturity_time');
            $table->decimal('amount',18,2);
            $table->timestamps();

            $table->foreign('m_company_id')->references('m_company_id')->on('tbl_mother_company_mast');
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
        Schema::dropIfExists('tbl_policy_mast');
    }
}
