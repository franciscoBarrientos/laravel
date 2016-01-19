<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;

class CreateStockTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::create('record_type_stocks', function (Blueprint $table) {
            $table->increments('id');
            $table->string('description');
        });

        DB::table('record_type_stocks')->insert(
            [
                'id'    =>  '1'
                ,'description' =>  'Ingreso'
            ]
        );

        DB::table('record_type_stocks')->insert(
            [
                'id'    =>  '2'
                ,'description' =>  'Egreso'
            ]
        );

        Schema::create('stocks', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('invoice_number');
            $table->integer('quantity');
            $table->integer('product_id')->unsigned();
            $table->foreign('product_id')->references('id')->on('products');
            $table->integer('record_type_stock_id')->unsigned();
            $table->foreign('record_type_stock_id')->references('id')->on('record_type_stocks');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('stocks', function ($table) {
            $table->dropForeign('stocks_record_type_stocks_id_foreign');
            $table->dropForeign('stocks_product_id_foreign');
        });
        Schema::drop('record_type_stocks');
        Schema::drop('stocks');
    }
}
