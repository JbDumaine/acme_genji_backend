<?php


namespace App\Repositories;


use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;

class SupplierRepository
{
    /**
     * Count number of supplier.
     *
     * @return JsonResponse
     */
    public static function count()
    {
        $suppliers = DB::table('suppliers')->count();
        if (!$suppliers) {
            return response()->json("No suppliers in DataBase", 204);
        }
        return response()->json($suppliers, 200);
    }

    /**
     * Display number of suppliers.
     *
     * @param int $nb
     * @return JsonResponse
     */
    public function getNb(int $nb)
    {
        $suppliers = DB::table('suppliers')
            ->orderBy('created_at', 'desc')
            ->limit($nb)
            ->get();
        if (!$suppliers) {
            return response()->json("No supplier in DataBase", 204);
        }
        return response()->json($suppliers, 200);
    }
}
