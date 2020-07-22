<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStoresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stores', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->string('name',128)->nullable(false);
            $table->string('address', 128)->nullable(false);
            $table->integer('city_id')->unsigned();
            $table->foreign('city_id')->references('id')->on('cities')->onUpdate('NO ACTION')->onDelete('NO ACTION');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('stores', function (Blueprint $table) {
            $table->dropForeign('stores_city_id_foreign');

        });
        
        Schema::dropIfExists('stores');
    }
}