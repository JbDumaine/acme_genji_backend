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
            $table->primary('id');
            $table->string('name',128)->nullable(false);
            $table->text('description');
            $table->float('unit_price', 8, 2)->nullable(true);
            // unity : kg (max = 10t -1, min = 10g)
            $table->float('unit_weight', 6, 2);
            $table->integer('stock_quantity');
            $table->foreign('category_id')->references('id')->on('categories')->onUpdate('NO ACTION')->onDelete('NO ACTION');
            $table->foreign('supplier_id')->references('id')->on('suppliers')->onUpdate('NO ACTION')->onDelete('NO ACTION');

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