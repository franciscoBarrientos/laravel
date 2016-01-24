<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;

class AddColumnsToAtentionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('atentions', function (Blueprint $table) {
            $table->integer('atentions_type_id')->unsigned();
            $table->foreign('atentions_type_id')->references('id')->on('atentions_type');
            $table->text('procedure');
            $table->text('treatment');
            $table->text('diagnosis');
            $table->text('prescription');
            $table->dropColumn('description');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('atentions', function ($table) {
            $table->dropForeign('atentions_atentions_type_id_foreign');
            $table->dropColumn('atentions_type_id');
            $table->dropColumn('procedure');
            $table->dropColumn('treatment');
            $table->dropColumn('diagnosis');
            $table->dropColumn('prescription');
            $table->string('description');
        });
    }
}
