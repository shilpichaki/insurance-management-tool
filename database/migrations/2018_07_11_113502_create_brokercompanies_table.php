<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBrokercompaniesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_broker_company_mast', function (Blueprint $table) {
            $table->integer('b_company_id',11)->autoIncrement();
            $table->string('b_company_name',100)->unique(); 
            $table->unsignedTinyInteger('b_avg_feedback_day')->nullable(); 
            $table->string('b_company_email',100)->unique()->nullable(); 
            $table->string('b_company_address',150)->unique();
            $table->string('b_company_pin',50);
            $table->string('b_company_city',50);
            $table->integer('b_company_state');
            $table->integer('b_company_country');
            $table->string('b_company_GSTIN',50)->nullable();
            $table->timestamps();

            $table->foreign('b_company_country')->references('country_id')->on('countries');
            $table->foreign('b_company_state')->references('state_id')->on('states');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbl_Broker_Company_Mast');
    }
}
