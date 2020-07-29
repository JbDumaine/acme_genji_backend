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
            $table->bigIncrements('id')->unsigned();
            $table->string('name',128);
            $table->string('address', 128);
            $table->foreignId('city_id')->constrained('cities');
            });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        /*Schema::table('stores', function (Blueprint $table) {
            $table->dropForeign('stores_city_id_foreign');

        });*/

        Schema::dropIfExists('stores');
    }
}
