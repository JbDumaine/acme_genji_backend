<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Http;

class CitiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $response = Http::get('https://raw.githubusercontent.com/high54/Communes-France-JSON/master/france.json');
        $cities = $response->json();

        foreach($cities as $city){
            factory(App\Models\City::class)->create([
                'name' => $city["Nom_commune"],
                'postal_code' =>$city["Code_postal"],
            ]); 
        }
    }
}
