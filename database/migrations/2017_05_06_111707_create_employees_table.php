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
            $table->increments('Id');
            $table->boolean('IsOnline')->default(false);
            $table->integer('JobId')->unsigned();
            $table->foreign('JobId')->references('Id')->on('jobs')->onDelete('cascade');
            $table->integer('UserId')->unsigned();
            $table->foreign('UserId')->references('id')->on('users')->onDelete('cascade');
            $table->integer('CurrentNumber');
            $table->string('NumberStatus');
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
        Schema::drop('employees');
    }
}
