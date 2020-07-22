<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStockReceptionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stock_receptions', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->string('reception_number', 128);
            $table->dateTime('reception_date');
            $table->integer('supplier_id')->unsigned();
            $table->integer('store_id')->unsigned();
            $table->foreign('supplier_id')->references('id')->on('suppliers')->onUpdate('NO ACTION')->onDelete('NO ACTION');
            $table->foreign('store_id')->references('id')->on('stores')->onUpdate('NO ACTION')->onDelete('NO ACTION');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('stock_receptions', function (Blueprint $table) {
            $table->dropForeign('stock_receptions_supplier_id_foreign');
            $table->dropForeign('stock_receptions_store_id_foreign');
        });
        
        Schema::dropIfExists('stock_receptions');
    }
}