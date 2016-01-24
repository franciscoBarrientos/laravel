<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;

class AddFontAwesomeIdToAlertsTypeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('alerts_type', function (Blueprint $table) {
            $table->integer('font_awesome_id')->unsigned();
            $table->foreign('font_awesome_id')->references('id')->on('font_awesome');
            $table->dropColumn('icon');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('alerts_type', function (Blueprint $table) {
            $table->dropForeign('alerts_type_font_awesome_id_foreign');
            $table->dropColumn('font_awesome_id');
            $table->string('icon');
        });
    }
}
