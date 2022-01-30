<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Createlayoutsprinterstable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('layout_printers',function(Blueprint $table){
			$table->increments('id');
			$table->unsignedInteger('label_layout_id');
			$table->unsignedInteger('printer_id');
			$table->foreign('label_layout_id')->references('id')->on('label_layouts')->onDelete('cascade');
			$table->foreign('printer_id')->references('id')->on('printers')->onDelete('cascade');
			
		});
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('layout_printers');
    }
}
