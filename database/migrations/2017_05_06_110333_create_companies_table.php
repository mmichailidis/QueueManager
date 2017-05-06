<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCompaniesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('companies', function (Blueprint $table) {
            $table->increments('Id');
            $table->integer('CompanyId')->unsigned();
            $table->foreign('CompanyId')->references('Id')->on('companies')->onDelete('cascade');
            $table->boolean('AutoProceedActivated')->default(true);
            $table->integer('AutoProceedTime');
            $table->boolean('VerificationRequired')->default(true);
            $table->string('ImageLocation');
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
        Schema::drop('companies');
    }
}
