<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmployeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_employee_mast', function (Blueprint $table) {
            $table->string('emp_id',50)->unique();
            $table->string('emp_first_name',50);
            $table->string('emp_middle_name',50)->nullable();
            $table->string('emp_last_name',50)->nullable();
            $table->dateTime('emp_dob');
            $table->string('emp_email',50)->unique()->nullable();
            $table->string('emp_phno',20)->unique()->nullable();
            $table->integer('emp_desg_id');
            $table->string('emp_reports_to',50)->default('0');
            $table->boolean('emp_status')->default(1);
            $table->timestamps();

            $table->primary('emp_id');

            $table->foreign('emp_desg_id')->references('designation_id')->on('tbl_designation_mast');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbl_Employee_Mast');
    }
}
