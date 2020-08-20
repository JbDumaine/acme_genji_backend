<?php


namespace App\Repositories;


use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;

class CategoryRepository
{
    /**
     * Count number of category.
     *
     * @return JsonResponse
     */
    public static function count()
    {
        $categories = DB::table('categories')->count();
        if (!$categories) {
            return response()->json("No category in DataBase", 204);
        }
        return response()->json($categories, 200);
    }

    /**
     * Display number of category.
     *
     * @param int $nb
     * @return JsonResponse
     */
    public function getNb(int $nb)
    {
        $categories = DB::table('categories')
            ->orderBy('created_at', 'desc')
            ->limit($nb)
            ->get();
        if (!$categories) {
            return response()->json("No category in DataBase", 204);
        }
        return response()->json($categories, 200);
    }
}
