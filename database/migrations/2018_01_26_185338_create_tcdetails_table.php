<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTcdetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tcdetails', function (Blueprint $table) {
            $table->increments('id');
            $table->string('tc_step_name');
            $table->string('tc_step_sts_id')->default(1);
            $table->string('expected_rslts')->nullable();
            $table->string('actual_rslts')->nullable();
            $table->binary('expected_rslts_file')->nullable();
            $table->binary('actual_rslts_file')->nullable();
            $table->string('tc_desc');
            $table->string('tc_stp_comments');
            $table->boolean('tc_val_pnt');

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
        Schema::dropIfExists('tcdetails');
    }
}
