<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;

class AlterTablePetsColumnBirthDateDateTimeToDate extends Migration
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
            $table->dropColumn('birth_date');
        });

        Schema::table('pets', function ($table) {
            $table->date('birth_date');
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
            $table->dropColumn('birth_date');
        });

        Schema::table('pets', function ($table) {
            $table->datetime('birth_date');
        });
    }
}
