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
            $table->bigIncrements('id')->unsigned();
            $table->string('first_name', 128);
            $table->string('last_name', 128);
            $table->string('email', 128)->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password', 128);
            $table->foreignId('store_id')->nullable()->constrained();
            $table->foreignId('role_id');
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
