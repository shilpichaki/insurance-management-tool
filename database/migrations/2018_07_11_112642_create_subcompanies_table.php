<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSubcompaniesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_sub_company_mast', function (Blueprint $table) {
            $table->integer('s_company_id',11)->autoIncrement();
            $table->string('s_company_name',100)->unique(); 
            $table->unsignedTinyInteger('s_avg_feedback_day')->nullable(); 
            $table->string('s_company_email',100)->unique()->nullable(); 
            $table->string('s_company_address',150)->unique();
            $table->string('s_company_pin',50);
            $table->string('s_company_city',50);
            $table->integer('s_company_state');
            $table->integer('s_company_country');
            $table->string('s_company_GSTIN',50)->nullable();
            $table->timestamps();

            $table->foreign('s_company_country')->references('country_id')->on('countries');
            $table->foreign('s_company_state')->references('state_id')->on('states');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbl_Sub_Company_Mast');
    }
}
