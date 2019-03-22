<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTcrunTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tcruns', function (Blueprint $table) {
            $table->increments('id');
            $table->string('tcrun_name');

            $table->integer('tcs_id')->unsigned();
            $table->foreign('tcs_id')->references('id')->on('tcs');

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
        Schema::dropIfExists('tcruns');
    }
}
