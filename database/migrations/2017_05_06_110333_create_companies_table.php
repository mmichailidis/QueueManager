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
            $table->integer('CategoryId')->unsigned();
            $table->foreign('CategoryId')->references('Id')->on('categories')->onDelete('cascade');
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
