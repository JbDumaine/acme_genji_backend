<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

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
            return response()->json("New supplier not saved!", 500);
        }
        return response()->json("New Supplier Saved!", 200);
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return JsonResponse
     */
    public function get(int $id)
    {
        $product= Product::find($id);
        return response()->json($product);
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
        $supplier = Product::find($id);
        if($supplier->delete()){
            return response()->json("Supplier id ".$id." removed", 200);
        }
        return response()->json("Supplier id ".$id." not removed. An error occurred", 500);
    }
}
