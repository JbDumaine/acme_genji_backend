<?php

use Illuminate\Database\Seeder;

class StoresTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $stores = array("Carrefour Labége", "Carrefour Colomier", "Carrefour Saint Gaundes", "Carrefour Dijon");
        factory('App\Models\Store')->create([
            "name" => $stores[0]
        ]);
        factory('App\Models\Store')->create([
            "name" => $stores[1]
        ]);
        factory('App\Models\Store')->create([
            "name" => $stores[2]
        ]);
        factory('App\Models\Store')->create([
            "name" => $stores[3]
        ]);
    }
}
