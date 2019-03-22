<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNodeNodeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('node_node', function (Blueprint $table) {
        $table->increments('id');

        $table->integer('node_id')->unsigned()->index();
        $table->integer('nodeparent_id')->unsigned()->nullable();

        $table->foreign('node_id')->references('id')->on('nodes')->onDelete('cascade');
        $table->foreign('nodeparent_id')->references('id')->on('nodes')->onDelete('cascade');
            $table->unique(['nodeparent_id', 'node_id']);
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
        Schema::dropIfExists('node_node');
    }
}
