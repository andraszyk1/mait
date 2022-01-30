<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeyOwnerToUser extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('label_layouts', function (Blueprint $table) {
            $table->integer('owner')->unsigned()->change();
            $table->foreign('owner','label_layouts_user_id_foreign')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('label_layouts', function (Blueprint $table) {
            $table->dropForeign('label_layouts_user_id_foreign');
        });
    }
}
