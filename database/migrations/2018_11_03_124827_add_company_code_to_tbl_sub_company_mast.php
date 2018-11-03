<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddCompanyCodeToTblSubCompanyMast extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tbl_sub_company_mast', function (Blueprint $table) {
            //As there is data in the tbl_sub_company_mast we have added nullable() or else this field should be not nullable
            $table->string('s_company_code',150)->after('s_company_email')->nullable()->comment = 'Contact Person of Sub Company';
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('tbl_sub_company_mast', function (Blueprint $table) {
            $table->dropColumn('s_company_code');
        });
    }
}
