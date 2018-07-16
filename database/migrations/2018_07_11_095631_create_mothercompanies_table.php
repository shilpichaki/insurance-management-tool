<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMothercompaniesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_mother_company_mast', function (Blueprint $table) {
            $table->integer('m_company_id',11)->autoIncrement();
            $table->string('m_company_name',100)->unique(); 
            $table->unsignedTinyInteger('m_avg_feedback_day')->nullable(); 
            $table->string('m_company_email',100)->unique()->nullable(); 
            $table->string('m_company_address',150)->unique();
            $table->string('m_company_pin',50);
            $table->string('m_company_city',50);
            $table->integer('m_company_state');
            $table->integer('m_company_country');
            $table->string('m_company_GSTIN',50)->nullable();
            $table->timestamps();

            $table->foreign('m_company_country')->references('country_id')->on('countries');
            $table->foreign('m_company_state')->references('state_id')->on('states');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbl_Mother_Company_Mast');
    }
}
