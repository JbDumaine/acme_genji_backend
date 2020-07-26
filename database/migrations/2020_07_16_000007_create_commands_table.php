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
            $table->increments('id')->unsigned();
            $table->string('command_number', 128);
            $table->timestamp('created_at')->useCurrent();
            $table->dateTime('delivery_date');
            $table->foreignId('state_id')->constrained();
            $table->foreignId('store_id')->constrained();
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
        Schema::table('commands', function (Blueprint $table) {
            $table->dropForeign('commands_state_id_foreign');
            $table->dropForeign('commands_store_id_foreign');
        });

        Schema::dropIfExists('commands');
    }
}
