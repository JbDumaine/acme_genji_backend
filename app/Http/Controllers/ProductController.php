<?php

namespace App\Http\Controllers;

use App\Models\Command;
use App\Models\Product;
use App\Models\Category;
use App\Models\Supplier;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return JsonResponse
     */
    public function getAll()
    {
        $products = Product::with(['category', 'supplier'])->get();
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
        $product->category;
        $product->supplier;
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
        $product->description = $request->description;
        $product->unit_price = $request->unit_price;
        $product->unit_weight = $request->unit_weight;
        $product->category_id = $request->category_id;
        $product->supplier_id = $request->supplier_id;
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


    /**
     * Display products group by categorie or supplier.
     *
     * @param string $groupBy
     * @return JsonResponse
     */
    public function getProductsGroupByCategoryOrSupplier(string $groupBy)
    {
        if ($groupBy === "category") {
            $categories = Category::all();
            $result = [];
            foreach ($categories as $category) {
                $category->products;
                array_push($result, $category);
            }
        } elseif ($groupBy === "supplier") {
            $suppliers = Supplier::all();
            $result = [];
            foreach ($suppliers as $supplier) {
                $supplier->products;
                array_push($result, $supplier);
            }
        } else {
            return response()->json([
                "message" => "Bad Request For this route. " . $groupBy . " unknow."
            ], 400);
        }


        return response()->json($result, 200);
        //return response()->json(["result" => null, "message" => "No result"], 404);
    }

    /**
     * Display the specified resources by name.
     *
     * @param string $term
     * @return JsonResponse
     */
    public function getByTerms(string $term)
    {
        $products = DB::table('products')
            ->where('name', 'like', $term . "%")
            ->orderBy('name', 'asc')
            ->get();
        if ($products) {
            return response()->json($products, 200);
        }
        return response()->json(["result" => null, "message" => "No result"], 404);
    }
}
