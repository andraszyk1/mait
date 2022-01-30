<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnToPrintersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('printers', function (Blueprint $table) {
            $table->string('label_type');
            $table->string('ribbon_type');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('printers', function (Blueprint $table) {
            $table->dropColumn('label_type');
            $table->dropColumn('ribbon_type');
        });
    }
}
