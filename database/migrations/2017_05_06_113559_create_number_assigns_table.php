<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNumberAssignsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('number_assigns', function (Blueprint $table) {
            $table->increments('Id');
            $table->integer('MemberId')->unsigned();
            $table->foreign('MemberId')->references('Id')->on('members')->onDelete('cascade');
            $table->integer('JobId')->unsigned();
            $table->foreign('JobId')->references('Id')->on('jobs')->onDelete('cascade');
            $table->integer('Number');
            $table->bigInteger('Time');
            $table->boolean('IsUsed')->default(false);
            $table->boolean('DiscardedByUser')->default(false);
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
        Schema::drop('number_assigns');
    }
}
