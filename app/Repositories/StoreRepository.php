<?php


namespace App\Repositories;


use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;

class StoreRepository
{
    /**
     * Count number of store.
     *
     * @return JsonResponse
     */
    public static function count()
    {
        $store = DB::table('stores')->count();
        if (!$store) {
            return response()->json("No store in DataBase", 204);
        }
        return response()->json($store, 200);
    }

    /**
     * Display number of store.
     *
     * @param int $nb
     * @return JsonResponse
     */
    public function getNb(int $nb)
    {
        $store = DB::table('stores')
            ->orderBy('created_at', 'desc')
            ->limit($nb)
            ->get();
        if (!$store) {
            return response()->json("No category in DataBase", 204);
        }
        return response()->json($store, 200);
    }
}
