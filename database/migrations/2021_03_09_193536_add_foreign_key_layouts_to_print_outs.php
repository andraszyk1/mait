<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeyLayoutsToPrintOuts extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('print_outs', function (Blueprint $table) {
            $table->integer('labels_layouts_id')->unsigned()->change();
            $table->foreign('labels_layouts_id','print_outs_labels_layout_id_foreign')->references('id')->on('labels_layouts');
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
            $table->dropForeign('print_outs_labels_layout_id_foreign');
        });
    }
}
