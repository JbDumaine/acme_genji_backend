<?php

use Illuminate\Database\Seeder;

class ProductStockReceptionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory('App\Models\ProductStockReception', 150)->create();
    }
}
