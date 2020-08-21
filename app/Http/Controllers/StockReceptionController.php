<?php

namespace App\Http\Controllers;

use App\Models\StockReception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class StockReceptionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return JsonResponse
     */
    public function getAll()
    {
        $stockReception = StockReception::with(['supplier', 'products'])->get();
        return response()->json($stockReception);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function create(Request $request)
    {
        $products = $request->json()->all()["products"];
        $stockReception = new StockReception($request->json()->all());
        if (!$stockReception->save()) {
            return response()->json("New Stock_Reception not saved!", 500);
        }
        $stockReception->saveProductsStockReception($stockReception->id,$products);
        $stockReception->products;
        $stockReception->supplier;
        return response()->json($stockReception, 200);
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return JsonResponse
     */
    public function get(int $id)
    {
        $stockReception = StockReception::find($id);
        $stockReception->supplier;
        $stockReception->products;
        if ($stockReception) {
            return response()->json($stockReception,200);
        }
        return response()->json(["result" => null, "message" => "No result"], 404);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param int $id
     * @return JsonResponse
     */
    public function update(Request $request, int $id)
    {
        $stockReception = StockReception::find($id);
        $stockReception->reception_number = $request->reception_number;
        $stockReception->reception_date = $request->reception_date;
        $stockReception->supplier_id = $request->supplier_id;
        if ($stockReception->save()) {
            return response()->json($stockReception, 200);
        }
        return response()->json("Stock_Reception not updated", 500);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return JsonResponse
     */
    public function destroy(int $id)
    {
        $stockReception = StockReception::find($id);
        if ($stockReception->delete()) {
            return response()->json("Stock_Reception id " . $id . " removed", 204);
        }
        return response()->json("Stock_Reception id " . $id . " not removed. An error occurred", 500);
    }
}
