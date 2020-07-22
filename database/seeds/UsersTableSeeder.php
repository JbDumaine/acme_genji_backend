<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roleUser = DB::table('roles')->where('name', 'ROLE_USER')->first();
        $roleAdmin = DB::table('roles')->where('name', 'ROLE_ADMIN')->first();
        factory('App\Models\User', 5)->create([
            "role_id" => $roleUser->id,
        ]);
        factory('App\Models\User', 3)->create([
            "role_id" => $roleAdmin->id,
        ]);
    }
}
