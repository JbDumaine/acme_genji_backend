<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Http;
use Database\Tools\Migrations\MigrationsTools;

class CreateCitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cities', function (Blueprint $table) {
            $table->bigIncrements('id')->unsigned();
            $table->string('name', 128)->nullable(false);
            $table->string('postal_code', 32)->nullable(false);
            $table->timestamps();
            $table->softDeletes();
        });

        $response = Http::get('https://raw.githubusercontent.com/high54/Communes-France-JSON/master/france.json');
        $cities = $response->json();

        foreach ($cities as $city) {
            MigrationsTools::insertDataIntoDb(
                'cities',
                array(
                    'name' => $city["Nom_commune"],
                    'postal_code' => $city["Code_postal"],
                    'created_at'=> date('Y-m-d H:i:s'),
                    'updated_at'=> date('Y-m-d H:i:s'),
                )
            );
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cities');
    }
}
