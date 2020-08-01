<?php

namespace Database\Migrations\Tools;

use Illuminate\Support\Facades\DB;

class MigrationsTools
{
    public static function insertDataIntoDb(String $dbName, array $data)
    {
        DB::table($dbName)->insert($data);
    }
}
