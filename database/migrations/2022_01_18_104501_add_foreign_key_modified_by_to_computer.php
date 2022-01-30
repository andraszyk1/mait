<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeyModifiedByToComputer extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('computers', function (Blueprint $table) {
          $table->integer('modified_by')->unsigned()->change();
            $table->foreign('modified_by','computers_modfiied_by_user_id_foreign')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('computers', function (Blueprint $table) {
            $table->dropForeign('computers_modfiied_by_user_id_foreign');
        });
    }
}
