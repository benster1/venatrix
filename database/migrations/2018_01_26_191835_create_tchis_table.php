<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTchisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tchits', function (Blueprint $table) {
            
            $table->integer('tc_id')->unsigned()->index();
            $table->boolean('actual_rslt');//->unsigned()->index();
            $table->binary('actual_rslt_file');//->unsigned()->index();

            $table->integer('tcdetail_id')->unsigned()->index();

            $table->primary(['tc_id', 'tcdetail_id']);

            $table->foreign('tc_id')->references('id')->on('tcs');
            $table->foreign('tcdetail_id')->references('id')->on('tcdetails');


            $table->integer('tcrun_id')->unsigned();
            $table->foreign('tcrun_id')->references('id')->on('tcruns');

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
        Schema::dropIfExists('tchits');
    }
}
