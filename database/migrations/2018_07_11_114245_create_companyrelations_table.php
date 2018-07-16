<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCompanyrelationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_company_relation', function (Blueprint $table) {
            $table->integer('company_relation_id');
            // $table->dropPrimary('PRIMARY');
            $table->integer('m_company_id')->nullable();
            $table->integer('s_company_id')->nullable();
            $table->integer('b_company_id')->nullable();
            $table->unsignedTinyInteger('deal_percentage'); 
            $table->timestamps();

            $table->primary(['m_company_id', 's_company_id', 'b_company_id'],'COMPOSITEKEY');

            $table->foreign('m_company_id')->references('m_company_id')->on('tbl_mother_company_mast');
            $table->foreign('s_company_id')->references('s_company_id')->on('tbl_sub_company_mast');
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
        Schema::dropIfExists('tbl_Company_Relation');
    }
}
