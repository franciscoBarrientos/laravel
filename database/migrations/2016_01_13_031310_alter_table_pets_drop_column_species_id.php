<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterTablePetsDropColumnSpeciesId extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::table('pets', function ($table) {
        $table->dropForeign('pets_species_id_foreign');
        $table->dropColumn('species_id');
    });

        Schema::table('pets', function ($table) {
            $table->integer('breed_id')->unsigned();
            $table->foreign('breed_id')->references('id')->on('breeds');
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
            $table->dropForeign('pets_breed_id_foreign');
            $table->dropColumn('breed_id');
        });

        Schema::table('pets', function ($table) {
            $table->integer('species_id')->unsigned();
            $table->foreign('species_id')->references('id')->on('species');
        });
    }
}
