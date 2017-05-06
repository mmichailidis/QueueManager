<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJobsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jobs', function (Blueprint $table) {
            $table->increments('Id');
            $table->integer('CompanyId')->unsigned();
            $table->foreign('CompanyId')->references('Id')->on('companies')->onDelete('cascade');
            $table->string('Name');
            $table->boolean('IsByName')->default(true);
            $table->integer('LastNumber')->default(0);
            $table->smallInteger('TypeOfJob');
            $table->float('AverageWaitingTime');
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
        Schema::drop('jobs');
    }
}
