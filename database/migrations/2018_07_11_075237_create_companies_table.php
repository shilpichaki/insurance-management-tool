<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCompaniesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('companies', function (Blueprint $table) {
            $table->integer('company_id',11)->autoIncrement();
            $table->string('company_name',100)->unique();
            $table->string('company_address',100)->unique();
            $table->string('company_city',50)->nullable();
            $table->string('company_pin',50)->nullable();
            $table->integer('company_state');
            $table->integer('company_country');
            $table->string('company_contact_no',50)->nullable();
            $table->string('company_contact_person',50)->nullable();
            $table->string('company_GSTIN',50);
            $table->string('company_CIN',50)->nullable();
            $table->string('company_PAN',50)->nullable();
            $table->timestamps();

            $table->foreign('company_country')->references('country_id')->on('countries');
            $table->foreign('company_state')->references('state_id')->on('states');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('companies');
    }
}
