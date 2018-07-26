<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMotherSubCompanyrelationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_mother_sub_company_relation', function (Blueprint $table) {
            $table->integer('company_relation_id');
            $table->integer('m_company_id')->nullable();
            $table->integer('s_company_id')->nullable();
            $table->unsignedTinyInteger('deal_percentage');
            $table->dateTime('percent_created_at');
            $table->dateTime('percent_updated_at')->nullable();
            $table->timestamps();

            $table->primary(['m_company_id', 's_company_id', 'percent_created_at'],'COMPOSITEKEY');

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
        Schema::dropIfExists('tbl_mother_sub_company_relation');
    }
}
