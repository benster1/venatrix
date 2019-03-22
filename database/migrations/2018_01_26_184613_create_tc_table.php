<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTcTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('tcs', function (Blueprint $table) {
           $table->increments('id');
            $table->string('tc_name')->nullable();
            $table->string('tc_url')->nullable();
            $table->string('node_id')->nullable();
            $table->string('tc_type')->nullable();
            $table->string('tc_comments')->nullable();
            $table->string('tc_description')->nullable();
            $table->string('created_by')->nullable();
            $table->dateTime('creation_date')->nullable();
            $table->string('updated_by')->nullable();
            $table->dateTime('updated_date')->nullable();
            $table->string('exec_by')->nullable();
            $table->dateTime('exec_date')->nullable();

            $table->integer('project_id')->unsigned();
            $table->foreign('project_id')->references('id')->on('projects');

            $table->integer('tcstatuss_id')->unsigned();
            $table->foreign('tcstatuss_id')->references('id')->on('tcstatuss');

            $table->integer('tcrunstatus_id')->unsigned();
            $table->foreign('tcrunstatus_id')->references('id')->on('tcrunstatuss');

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
        Schema::dropIfExists('tcs');
    }
}
