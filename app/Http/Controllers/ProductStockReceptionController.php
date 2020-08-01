<?php

namespace App\Http\Controllers;

use App\Models\ProductStockReception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ProductStockReceptionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return JsonResponse
     */
    public function getAll()
    {
        $productStockReceptions = ProductStockReception::all();
        return response()->json($productStockReceptions, 200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function create(Request $request)
    {
        $productStockReception = new ProductStockReception($request->json()->all());
        if (!$productStockReception->save()) {
            return response()->json("New Product_Stock_Reception not saved!", 500);
        }
        return response()->json($productStockReception, 200);
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return JsonResponse
     */
    public function get(int $id)
    {
        $productStockReception = ProductStockReception::find($id);
        if ($productStockReception) {
            return response()->json($productStockReception, 200);
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
        $productStockReceptionStockReception = ProductStockReception::find($id);
        $productStockReceptionStockReception->product_quantity = $request->product_quantity;
        $productStockReceptionStockReception->stock_reception_id = $request->stock_reception_id;
        $productStockReceptionStockReception->product_id = $request->product_id;

        if ($productStockReceptionStockReception->save()) {
            return response()->json($productStockReceptionStockReception, 200);
        }
        return response()->json("Product_Stock_Reception not updated", 500);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return JsonResponse
     */
    public function destroy(int $id)
    {
        $productStockReception = ProductStockReception::find($id);
        if ($productStockReception->delete()) {
            return response()->json("Product_Stock_Reception id " . $id . " removed", 204);
        }
        return response()->json("Product_Stock_Reception id " . $id . " not removed. An error occurred", 500);
    }
}
