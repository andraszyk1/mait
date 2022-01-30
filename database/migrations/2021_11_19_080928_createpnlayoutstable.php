<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Createpnlayoutstable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pn_layouts',function(Blueprint $table){
			$table->increments('id');
			$table->unsignedInteger('parts_number_id');
			$table->unsignedInteger('label_layout_id');
			$table->foreign('parts_number_id')->references('id')->on('parts_numbers')->onDelete('cascade');
			$table->foreign('label_layout_id')->references('id')->on('label_layouts')->onDelete('cascade');
		});
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pn_layouts');
    }
}
