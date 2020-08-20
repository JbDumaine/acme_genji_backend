<?php


namespace App\Repositories;


use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;

class CommandRepository
{
    /**
     * Count number of commands.
     *
     * @return JsonResponse
     */
    public static function count()
    {
        $commands = DB::table('commands')->count();
        if (!$commands) {
            return response()->json("No command in DataBase", 204);
        }
        return response()->json($commands, 200);
    }

    /**
     * Display number of commands.
     *
     * @param int $nb
     * @return JsonResponse
     */
    public function getNb(int $nb)
    {
        $commands = DB::table('commands')
            ->orderBy('created_at', 'desc')
            ->limit($nb)
            ->get();
        if (!$commands) {
            return response()->json("No command in DataBase", 204);
        }
        return response()->json($commands, 200);
    }
}
