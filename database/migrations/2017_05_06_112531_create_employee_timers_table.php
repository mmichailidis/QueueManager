<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmployeeTimersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employee_timers', function (Blueprint $table) {
            $table->increments('Id');
            $table->integer('EmployeeId')->unsigned();
            $table->foreign('EmployeeId')->references('Id')->on('employees')->onDelete('cascade');
            $table->integer('MemberId')->unsigned();
            $table->foreign('MemberId')->references('Id')->on('members')->onDelete('cascade');
            $table->bigInteger('Timer');
            $table->boolean('IsFinalized')->default(false);
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
        Schema::drop('employee_timers');
    }
}
