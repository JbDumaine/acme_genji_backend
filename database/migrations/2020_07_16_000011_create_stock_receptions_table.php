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
            $table->bigIncrements('id')->unsigned();
            $table->string('reception_number', 128);
            $table->dateTime('reception_date');
            $table->foreignId('supplier_id')->constrained();
            $table->foreignId('store_id')->constrained();
            $table->timestamps();
            $table->softDeletes();
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
        });

        Schema::dropIfExists('stock_receptions');
    }
}
