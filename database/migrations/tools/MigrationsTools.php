<?php

namespace Database\Tools\Migrations;

use Illuminate\Support\Facades\DB;

class MigrationsTools
{
    public static function insertDataIntoDb(String $dbName, array $data)
    {
        DB::table($dbName)->insert($data);
    }
}
