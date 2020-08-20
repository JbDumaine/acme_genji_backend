<?php


namespace App\Repositories;


use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;

class StockReceptionRepository
{
    /**
     * Count number of stock reception.
     *
     * @return JsonResponse
     */
    public static function count()
    {
        $stockReceptions = DB::table('stock_receptions')->count();
        if (!$stockReceptions) {
            return response()->json("No stock receptions in DataBase", 204);
        }
        return response()->json($stockReceptions, 200);
    }

    /**
     * Display number of stock receptions.
     *
     * @param int $nb
     * @return JsonResponse
     */
    public function getNb(int $nb)
    {
        $stockReceptions = DB::table('stock_receptions')
            ->orderBy('created_at', 'desc')
            ->limit($nb)
            ->get();
        if (!$stockReceptions) {
            return response()->json("No stock receptions in DataBase", 204);
        }
        return response()->json($stockReceptions, 200);
    }
}
