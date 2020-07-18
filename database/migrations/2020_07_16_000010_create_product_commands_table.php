<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductCommandsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_commands', function (Blueprint $table) {
            $table->primary('id');
            $table->integer('product_quantity');
            $table->foreign('product_id')->references('id')->on('products')->onUpdate('NO ACTION')->onDelete('NO ACTION');
            $table->foreign('command_id')->references('id')->on('commands')->onUpdate('NO ACTION')->onDelete('NO ACTION');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('product_commands', function (Blueprint $table) {
            $table->dropForeign('product_commands_product_id_foreign');
            $table->dropForeign('product_commands_command_id_foreign'); 
        });
        
        Schema::dropIfExists('product_commands');
    }
}