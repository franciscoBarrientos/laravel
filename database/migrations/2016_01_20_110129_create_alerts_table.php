<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;

class CreateAlertsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('alerts', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('alerts_type_id')->unsigned();
            $table->foreign('alerts_type_id')->references('id')->on('alerts_type');
            $table->integer('pets_id')->unsigned();
            $table->foreign('pets_id')->references('id')->on('pets');
            $table->string('description');
            $table->dateTime('date');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('alerts', function (Blueprint $table) {
            $table->dropForeign('alerts_alerts_type_id_foreign');
            $table->dropForeign('alerts_pets_id_foreign');
        });
        Schema::drop('alerts');
    }
}
