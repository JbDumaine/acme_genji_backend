<?php

namespace App\Http\Controllers;

use App\Models\ProductCommand;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ProductCommandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return JsonResponse
     */
    public function getAll()
    {
        $productCommands = ProductCommand::all();
        return response()->json($productCommands, 200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function create(Request $request)
    {
        $productCommand = new ProductCommand($request->json()->all());
        if (!$productCommand->save()) {
            return response()->json("New Product_Command not saved!", 500);
        }
        return response()->json($productCommand, 200);
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return JsonResponse
     */
    public function get(int $id)
    {
        $productCommand = ProductCommand::find($id);
        if ($productCommand) {
            return response()->json($productCommand, 200);
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
        $productCommand = ProductCommand::find($id);
        $productCommand->product_quantity = $request->product_quantity;
        $productCommand->command_id = $request->command_id;
        $productCommand->product_id = $request->product_id;

        if ($productCommand->save()) {
            return response()->json($productCommand, 200);
        }
        return response()->json("Product_Command not updated", 500);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return JsonResponse
     */
    public function destroy(int $id)
    {
        $productCommand = ProductCommand::find($id);
        if ($productCommand->delete()) {
            return response()->json("Product_Command id " . $id . " removed", 204);
        }
        return response()->json("Product_Command id " . $id . " not removed. An error occurred", 500);
    }
}
