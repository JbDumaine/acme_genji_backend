<?php


namespace App\Repositories;


use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;

class UserRepository
{

    /**
     * Count number of User.
     *
     * @return JsonResponse
     */
    public static function count()
    {
        $users = DB::table('users')->count();
        if (!$users) {
            return response()->json("No user in DataBase", 204);
        }
        return response()->json($users, 200);
    }

    /**
     * Display number of user.
     *
     * @param int $nb
     * @return JsonResponse
     */
    public function getNb(int $nb)
    {
        $users = DB::table('users')
            ->orderBy('created_at', 'desc')
            ->limit($nb)
            ->get();
        if (!$users) {
            return response()->json("No category in DataBase", 204);
        }
        return response()->json($users, 200);
    }
}
