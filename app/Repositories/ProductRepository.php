<?php


namespace App\Repositories;


use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;

class ProductRepository
{
    /**
     * Count number of products.
     *
     * @return JsonResponse
     */
    public function count()
    {
        $products = DB::table('products')->count();
        if (!$products) {
            return response()->json("No product in DataBase", 204);
        }
        return response()->json($products, 200);
    }

    /**
     * Display number of products.
     *
     * @param int $nb
     * @return JsonResponse
     */
    public function getNb(int $nb)
    {
        $products = DB::table('products')
            ->orderBy('created_at', 'desc')
            ->limit($nb)
            ->get();
        if (!$products) {
            return response()->json("No product in DataBase", 204);
        }
        return response()->json($products, 200);
    }
}
