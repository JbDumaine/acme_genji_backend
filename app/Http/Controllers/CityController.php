<?php

namespace App\Http\Controllers;

use App\Models\City;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;

class CityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return JsonResponse
     */
    public function getAll()
    {
        $cities = City::all();
        return response()->json($cities);
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return JsonResponse
     */
    public function get(int $id)
    {
        $city = City::find($id);
        if ($city) {
            return response()->json($city, 200);
        }
        return response()->json(["result" => null, "message" => "No result"], 404);
    }


    /**
     * Display the specified resources by terms or postalcode.
     *
     * @param string $term
     * @return JsonResponse
     */
    public function getByTerms(string $term)
    {
        $cities = DB::table('cities')
            ->where('name', 'like', "%".$term."%")
            ->orWhere('postal_code', 'like', $term."%")
            ->get();
        if ($cities) {
            return response()->json($cities, 200);
        }
        return response()->json(["result" => null, "message" => "No result"], 404);
    }
}
