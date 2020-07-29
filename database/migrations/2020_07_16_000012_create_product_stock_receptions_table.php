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
            $table->bigIncrements('id')->unsigned();
            $table->integer('product_quantity');
            $table->foreignId('stock_reception_id')->constrained();
            $table->foreignId('product_id')->constrained();

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
