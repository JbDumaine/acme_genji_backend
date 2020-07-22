<?php

use Illuminate\Database\Seeder;

class ProductCommandsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory('App\Models\ProductCommand', 150)->create();
    }
}
