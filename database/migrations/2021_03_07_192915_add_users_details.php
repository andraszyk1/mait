<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddUsersDetails extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('id_hr_sap');
            $table->string('type');
            $table->string('status');
            $table->string('firstname');
            $table->string('surname');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
            Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('id_hr_sap');
            $table->dropColumn('type');
            $table->dropColumn('status');
            $table->dropColumn('firstname');
            $table->dropColumn('surname');
        });
    }
}
