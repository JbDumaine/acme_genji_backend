<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    /**
     * Count number of User.
     *
     * @return JsonResponse
     */
    public function count()
    {
        $users = DB::table('users')->count();
        if (!$users) {
            return response()->json("No user in DataBase", 204);
        }
        return response()->json($users, 200);
    }
}
