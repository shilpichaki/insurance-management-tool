<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddCustomerPannoToTblCustomerMast extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tbl_customer_mast', function (Blueprint $table) {
            $table->string('customer_panno',50)->after('customer_phno')->unique();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('tbl_customer_mast', function (Blueprint $table) {
            $table->dropColumn('customer_panno');
        });
    }
}
