<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ChangeColumnNameToClientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('clients', function (Blueprint $table) {
            $table->dropColumn('client_name');
            $table->dropColumn('client_last_name_p');
            $table->dropColumn('client_rut');
            $table->dropColumn('client_direction');
            $table->dropColumn('client_cellphone');
            $table->dropColumn('client_phone');
            $table->string('name');
            $table->string('lastname');
            $table->string('rut');
            $table->string('address');
            $table->string('cellphone');
            $table->string('phone');
            $table->dropColumn('client_last_name_m');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('clients', function (Blueprint $table) {
            $table->dropColumn('name');
            $table->dropColumn('lastname');
            $table->dropColumn('rut');
            $table->dropColumn('address');
            $table->dropColumn('cellphone');
            $table->dropColumn('phone');
            $table->string('client_name');
            $table->string('client_last_name_p');
            $table->string('client_last_name_m');
            $table->string('client_rut');
            $table->string('client_direction');
            $table->string('client_cellphone');
            $table->string('client_phone');
        });
    }
}
