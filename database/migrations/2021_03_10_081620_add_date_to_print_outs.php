<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddDateToPrintOuts extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('print_outs', function (Blueprint $table) {
            $table->dateTime('data',$precision=0)->nullable();
      
        });
    }

    public function down()
    {
        Schema::table('print_outs', function (Blueprint $table) {
            $table->dropColumn('data');
        });
    }
}
