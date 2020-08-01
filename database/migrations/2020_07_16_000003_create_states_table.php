<?php

use Database\Migrations\Tools\MigrationsTools;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('states', function (Blueprint $table) {
            $table->bigIncrements('id')->unsigned();
            $table->string('name',128)->nullable(false);
            $table->timestamps();
            $table->softDeletes();
        });
        $dataArray = [
            [
                "name" => "En Attente",
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                "name" => "Envoyé",
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ]
        ];
        foreach ($dataArray as $data) {
            MigrationsTools::insertDataIntoDb('states', $data);
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('states');
    }
}
