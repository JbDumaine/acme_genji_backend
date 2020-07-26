<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->string('email', 128)->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password', 128);
            $table->integer('role_id')->unsigned();
            $table->foreign('store_id')->references('id')->on('stores')->onUpdate('NO ACTION')->onDelete('NO ACTION');
            $table->foreign('role_id')->references('id')->on('roles')->onUpdate('NO ACTION')->onDelete('NO ACTION');
            $table->rememberToken();
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
        Schema::table('users', function (Blueprint $table) {
            $table->dropForeign('users_store_id_foreign');
            $table->dropForeign('users_role_id_foreign');
        });

        Schema::dropIfExists('users');
    }
}
