<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return JsonResponse
     */
    public function getAll()
    {
        $products = Product::all();
        return response()->json($products);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function create(Request $request)
    {
        $product = new Product($request->json()->all());
        if (!$product->save()) {
            return response()->json("New Product not saved!", 500);
        }
        return response()->json($product, 200);
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return JsonResponse
     */
    public function get(int $id)
    {
        $product = Product::find($id);
        if ($product) {
            return response()->json($product, 200);
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
        $product = Product::find($id);
        $product->name = $request->name;

        if ($product->save()) {
            return response()->json($product, 200);
        }
        return response()->json("Supplier not updated", 500);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return JsonResponse
     */
    public function destroy(int $id)
    {
        $product = Product::find($id);
        if ($product->delete()) {
            return response()->json("Product id " . $id . " removed", 204);
        }
        return response()->json("Product id " . $id . " not removed. An error occurred", 500);
    }
}
