<?php

use Database\Migrations\Tools\MigrationsTools;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;


class CreateRolesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * Creation of role table for the permissions.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('roles', function (Blueprint $table) {
            $table->bigIncrements('id')->unsigned();
            $table->string('name')->nullable(false);
            $table->timestamps();
            $table->softDeletes();
        });
        $dataArray = [
            [
                "name" => "ROLE_USER",
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                "name" => "ROLE_ADMIN",
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ]
        ];
        foreach ($dataArray as $data) {
            MigrationsTools::insertDataIntoDb('roles', $data);
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('roles');
    }
}
