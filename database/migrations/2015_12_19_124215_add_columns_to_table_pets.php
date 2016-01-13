<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnsToTablePets extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('pets', function ($table) {
            $table->integer('pet_sex');
            $table->datetime('pet_birth_date');
            $table->integer('species_id')->unsigned();;
            $table->foreign('species_id')->references('id')->on('species');
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
        Schema::table('pets', function ($table) {
            $table->dropColumn(['pet_sex', 'pet_birth_date', 'species_id']);
        });
    }
}

