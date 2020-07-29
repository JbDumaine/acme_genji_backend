<?php

use Illuminate\Database\Seeder;

class StockReceptionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory('App\Models\StockReception', 150)->create();
    }
}
