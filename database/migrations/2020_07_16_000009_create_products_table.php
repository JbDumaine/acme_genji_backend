<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->bigIncrements('id')->unsigned();
            $table->string('name',128);
            $table->text('description');
            $table->float('unit_price', 8, 2)->nullable();
            // unity : kg (max = 10t -1, min = 10g)
            $table->float('unit_weight', 6, 2);
            $table->integer('stock_quantity');
            $table->foreignId('category_id')->constrained();
            $table->foreignId('supplier_id')->constrained();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('products', function (Blueprint $table) {
            $table->dropForeign('products_category_id_foreign');
            $table->dropForeign('products_supplier_id_foreign');
        });

        Schema::dropIfExists('products');
    }
}
