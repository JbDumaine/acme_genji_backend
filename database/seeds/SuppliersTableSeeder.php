<?php

use Illuminate\Database\Seeder;

class SuppliersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $suppliers = array("Ikea Ltd", "Bureau Vallée", "TechnicBureau and Co", "Carrefour");
        factory('App\Models\Supplier')->create([
            "name" => $suppliers[0]
        ]);
        factory('App\Models\Supplier')->create([
            "name" => $suppliers[1]
        ]);
        factory('App\Models\Supplier')->create([
            "name" => $suppliers[2]
        ]);
        factory('App\Models\Supplier')->create([
            "name" => $suppliers[3]
        ]);
    }
}
