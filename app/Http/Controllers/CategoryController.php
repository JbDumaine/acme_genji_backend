<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return JsonResponse
     */
    public function getAll()
    {
        $categories = Category::all();
        return response()->json($categories);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function create(Request $request)
    {
        $category = new Category($request->json()->all());
        if (!$category->save()) {
            return response()->json("New category not saved!", 500);
        }
        return response()->json($category, 200);
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return JsonResponse
     */
    public function get(int $id)
    {
        $category = Category::find($id);
        if ($category) {
            return response()->json($category, 200);
        }
        return response()->json(["result"=> null,"message"=> "No result"], 404);
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
        $category = Category::find($id);
        $category->name = $request->name;
        $category->description = $request->description;

        if ($category->save()) {
            return response()->json($category, 200);
        }
        return response()->json("Category not updated", 500);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return JsonResponse
     */
    public function destroy(int $id)
    {
        $category = Category::find($id);
        if ($category->delete()) {
            return response()->json("Category id " . $id . " removed", 204);
        }
        return response()->json("Category id " . $id . " not removed. An error occurred", 500);
    }
}
