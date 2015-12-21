<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterColumnsNamesPets extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::table('pets', function($table)
        {
            $table->renameColumn('pet_name', 'name');
            $table->renameColumn('pet_sex', 'sex');
            $table->renameColumn('pet_birth_date', 'birth_date');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        Schema::table('pets', function($table)
        {
            $table->renameColumn('name', 'pet_name');
            $table->renameColumn('sex', 'pet_sex');
            $table->renameColumn('birth_date', 'pet_birth_date');
        });
    }
}
