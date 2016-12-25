<?php

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
        Schema::create('employees', function (Blueprint $table) {
            $table->increments('id');
            $table->string('employee_name');
            $table->date('hire_date');
            $table->string('phone');

            $table->integer('department_id')->nullable()->unsigned();
            // $table->foreign('department_id')->references('id')->on('departments');

            $table->integer('job_id')->unsigned();
            // $table->foreign('job_id')->references('id')->on('jobs');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('employees');

       

    }
}
