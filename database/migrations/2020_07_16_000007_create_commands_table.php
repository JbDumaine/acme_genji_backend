<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCommandsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('commands', function (Blueprint $table) {
            $table->primary('id');
            $table->string('command_number', 128)->nullable(false);
            $table->timestamp('created_date')->useCurrent();
            $table->dateTime('delivery_date');
            $table->foreign('state_id')->references('id')->on('states')->onUpdate('NO ACTION')->onDelete('NO ACTION');
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
        Schema::table('commands', function (Blueprint $table) {
            $table->dropForeign('commands_state_id_foreign');
            $table->dropForeign('commands_store_id_foreign');
        });
        
        Schema::dropIfExists('commands');
    }
}