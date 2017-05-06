<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateThreadsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('threads', function (Blueprint $table) {
            $table->increments('Id');
            $table->integer('MemberId')->unsigned();
            $table->foreign('MemberId')->references('Id')->on('members')->onDelete('cascade');
            $table->integer('EmployeeId')->unsigned();
            $table->foreign('EmployeeId')->references('Id')->on('employees')->onDelete('cascade');
            $table->integer('MessageCount')->default(0);
            $table->boolean('IsActive')->default(true);
            $table->boolean('RequestForEnd')->default(false);
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
        Schema::drop('threads');
    }
}
