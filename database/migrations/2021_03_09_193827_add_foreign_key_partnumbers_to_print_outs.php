<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeyPartnumbersToPrintOuts extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('print_outs', function (Blueprint $table) {
            $table->integer('parts_numbers_id')->unsigned()->change();
            $table->foreign('parts_numbers_id','print_outs_parts_number_id_foreign')->references('id')->on('parts_numbers');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('print_outs', function (Blueprint $table) {
            $table->dropForeign('print_outs_parts_number_id_foreign');
        });
    }
}
