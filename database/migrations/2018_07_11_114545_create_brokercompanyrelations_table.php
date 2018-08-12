<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBrokerCompanyrelationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_broker_company_relation', function (Blueprint $table) {
            $table->integer('company_relation_id');
            $table->integer('b_company_id');
            $table->unsignedTinyInteger('deal_percentage');
            $table->dateTime('percent_created_at');
            $table->dateTime('percent_updated_at')->nullable();
            $table->timestamps();

            $table->primary(['b_company_id', 'percent_created_at'],'COMPOSITEKEY');

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
        Schema::dropIfExists('tbl_broker_company_relation');
    }
}
