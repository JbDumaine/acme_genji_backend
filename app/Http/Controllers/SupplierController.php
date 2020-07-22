<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Supplier;

class SupplierController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getAll()
    {
        
        $suppliers = Supplier::all();
        return response()->json($suppliers);
    }

    /**
     * Create a new supplier.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $supplier = new Supplier($request->json()->all());
        if (!$supplier->save()) {
            return response()->json("New supplier not saved!", 500);
        }
        return response()->json("New Supplier Saved!", 200);
    }



    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function get($id)
    {
        $supplier = Supplier::find($id);
        return response()->json($supplier);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $supplier = Supplier::find($id);
        $supplier->name = $request->name;

        if ($supplier->save()) {
            return response()->json($supplier, 200);
        }
        return response()->json("Supplier not updated", 500);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $supplier = Supplier::find($id);
        if($supplier->delete()){
            return response()->json("Supplier id ".$id." removed", 200);
        }
        return response()->json("Supplier id ".$id." not removed. An error occurred", 500);
    }
}
