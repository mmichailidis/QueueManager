<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVerificationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('verifications', function (Blueprint $table) {
            $table->increments('Id');
            $table->integer('CompanyId')->unsigned();
            $table->foreign('CompanyId')->references('Id')->on('companies')->onDelete('cascade');
            $table->integer('MemberId')->unsigned();
            $table->foreign('MemberId')->references('Id')->on("members")->onDelete('cascade');
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
        Schema::drop('verifications');
    }
}
