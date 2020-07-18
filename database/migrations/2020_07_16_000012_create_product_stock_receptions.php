<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductStockReceptionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_stock_receptions', function (Blueprint $table) {
            $table->primary('id');
            $table->integer('product_quantity');
            $table->foreign('stock_reception_id')->references('id')->on('stock_receptions')->onUpdate('NO ACTION')->onDelete('NO ACTION');
            $table->foreign('product_id')->references('id')->on('products')->onUpdate('NO ACTION')->onDelete('NO ACTION');
        
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('product_stock_receptions', function (Blueprint $table) {
            $table->dropForeign('product_stock_receptions_stock_reception_id_foreign');
            $table->dropForeign('product_stock_receptions_product_id_foreign');
        });
        
        Schema::dropIfExists('product_stock_receptions');
    }
}