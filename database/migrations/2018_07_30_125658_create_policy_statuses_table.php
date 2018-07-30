<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePolicyStatusesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_policy_status', function (Blueprint $table) {
            $table->integer('policy_status_id',11)->autoIncrement();
            $table->string('policy_status_name',50)->unique(); 
            $table->string('policy_status_des',255)->nullable(); 

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbl_policy_status');
    }
}
