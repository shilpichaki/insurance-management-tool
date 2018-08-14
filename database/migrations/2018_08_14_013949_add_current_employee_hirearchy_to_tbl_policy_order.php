<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddCurrentEmployeeHirearchyToTblPolicyOrder extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tbl_policy_order', function (Blueprint $table) {
            $table->longText('current_employee_hirearchy')->after('d_case_taker_id')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('tbl_policy_order', function (Blueprint $table) {
            $table->dropColumn('current_employee_hirearchy');
        });
    }
}
