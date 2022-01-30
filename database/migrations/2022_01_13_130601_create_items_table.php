<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('items', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->integer('monitor_id');
            $table->integer('computer_id');
            $table->integer('nr_inw');
            $table->string('name',255);
            $table->string('description',255);
            $table->string('mpk',10);
            $table->string('owner',100);
            $table->string('location_id');
            $table->dateTime('dateFrom',$precision=0)->nullable();
            $table->dateTime('dateTo',$precision=0)->nullable();
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
        Schema::dropIfExists('items');
    }
}
