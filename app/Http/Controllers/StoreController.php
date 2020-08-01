<?php

namespace App\Http\Controllers;

use App\Models\Store;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class StoreController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return JsonResponse
     */
    public function getAll()
    {
        $stores = Store::all();
        return response()->json($stores);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function create(Request $request)
    {
        $store = new Store($request->json()->all());
        if (!$store->save()) {
            return response()->json("New store not saved!", 500);
        }
        return response()->json($store, 200);
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return JsonResponse
     */
    public function get(int $id)
    {
        $store = Store::find($id);
        if ($store) {
            return response()->json($store, 200);
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
        $store = Store::find($id);
        $store->name = $request->name;
        $store->address = $request->address;
        $store->city_id = $request->city_id;

        if ($store->save()) {
            return response()->json($store, 200);
        }
        return response()->json("Store not updated", 500);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return JsonResponse
     */
    public function destroy(int $id)
    {
        $store = Store::find($id);
        if ($store->delete()) {
            return response()->json(204);
        }
        return response()->json("Store id " . $id . " not removed. An error occurred", 500);
    }
}
