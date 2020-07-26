<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard(); // Disable mass assignment
        $this->call(UsersTableSeeder::class);
        $this->call(CategoriesTableSeeder::class);
        $this->call(SuppliersTableSeeder::class);
        $this->call(StoresTableSeeder::class);
        $this->call(ProductsTableSeeder::class);
        $this->call(StockReceptionsTableSeeder::class);
        $this->call(CommandsTableSeeder::class);
        $this->call(ProductCommandsTableSeeder::class);
        $this->call(ProductStockReceptionsTableSeeder::class);
        Model::reguard(); // Enable mass assignment
    }
}
